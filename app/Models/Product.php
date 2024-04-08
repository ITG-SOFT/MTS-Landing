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

class Product extends Model
{
    use HasFactory, MediaTrait, FormatDateTrait, Sluggable;

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

    public static function getProducts(int $limit = null, int $paginate = null, int $except = null, $with = [])
    {
        $products = self::query();

        $products->when($with, function (Builder $query) use ($with) {
            $query->with($with);
        });
        $products->when($limit, function (Builder $query) use ($limit) {
            $query->limit($limit);
        });
        $products->when($except, function (Builder $query) use ($except) {
            $query->whereNot('id', $except);
        });
        $products->orderBy('title');

        return $paginate ? $products->paginate($paginate) : $products->get();
    }

    public static function createProduct(ProductRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = self::uploadPhoto($request);

        /** @var Product $product */
        $product = self::query()->create($data);

//        TemporaryFile::clearTmpFiles();
        return $product;
    }

    public static function updateProduct(ProductRequest $request, self $product)
    {
        $data = $request->validated();
        $data['photo'] = self::uploadPhoto($request, $product->photo);

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
}
