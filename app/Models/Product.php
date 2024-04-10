<?php

namespace App\Models;

use App\Http\Requests\ProductRequest;
use App\Traits\FormatDateTrait;
use App\Traits\MediaTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, MediaTrait, FormatDateTrait, Sluggable, Searchable;

    protected $fillable = [
        'title',
        'slug',
        'photo',
        'category_id',
        'company_id',
        'price',
        'sale_price',
    ];

    protected $casts = [
        'category_id' => 'integer',
        'company_id' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function getPrice()
    {
        return number_format($this->price, thousands_separator: ' ');
    }

    public function getSalePrice()
    {
        return number_format($this->sale_price, thousands_separator: ' ');
    }

    public function updateAttributes(array $attributes)
    {
        foreach ($attributes as $k => $value) {
            /** @var AttributeValue $attribute_value */
            $attribute_value = $this->attributeValues()->where('attribute_id', $k)->first();

            if ($value) {
                if ($attribute_value) {
                    $attribute_value->update([
                        'value' => $value,
                    ]);
                } else {
                    $this->attributeValues()->create([
                        'value' => $value,
                        'attribute_id' => $k,
                    ]);
                }
            }
        }
    }

    public static function getProducts(int $paginate = null)
    {
        $products = self::query();

        $products->with('category');
        $products->with('company');

        $products->orderBy('title');

        return $paginate ? $products->paginate($paginate) : $products->get();
    }

    public static function createProduct(ProductRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = self::uploadPhoto($request);

        /** @var Product $product */
        $product = self::query()->create($data);

        if (isset($data['attributes'])) {
            $product->updateAttributes($data['attributes']);
        }

        MailingEmail::sendNewItem($product);

//        TemporaryFile::clearTmpFiles();
        return $product;
    }

    public static function updateProduct(ProductRequest $request, self $product)
    {
        $data = $request->validated();
        $data['photo'] = self::uploadPhoto($request, $product->photo);

        if (isset($data['attributes'])) {
            $product->updateAttributes($data['attributes']);
        }

        MailingEmail::sendNewItem($product);

//        TemporaryFile::clearTmpFiles();
        return $product->update($data);
    }

    public static function deleteProduct(self $product)
    {
        Storage::delete($product->photo);

        return $product->delete();
    }

    public static function uploadPhoto(Request $request, $image = null)
    {
        return self::uploadMaterialFilepond(
            storage_path: 'products',
            key: 'photo',
            request: $request,
            file: $image,
        );
    }

    public function getPhoto()
    {
        return self::getMedia('photo');
    }

    public function __toString()
    {
        return $this->title;
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
        ];
    }
}
