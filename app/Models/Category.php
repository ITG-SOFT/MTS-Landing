<?php

namespace App\Models;

use App\Http\Requests\CategoryRequest;
use App\Traits\FormatDateTrait;
use App\Traits\MediaTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory, MediaTrait, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'photo',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public static function getCategories(int $limit = null, int $paginate = null, int $except = null, $with = [])
    {
        $categories = self::query();

        $categories->when($with, function (Builder $query) use ($with) {
            $query->with($with);
        });
        $categories->when($limit, function (Builder $query) use ($limit) {
            $query->limit($limit);
        });
        $categories->when($except, function (Builder $query) use ($except) {
            $query->whereNot('id', $except);
        });
        $categories->orderBy('title');

        return $paginate ? $categories->paginate($paginate) : $categories->get();
    }

    public static function createCategory(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = self::uploadPhoto($request);

        return self::query()->create($data);
    }

    public static function updateCategory(CategoryRequest $request, self $category)
    {
        $data = $request->validated();
        $data['photo'] = self::uploadPhoto($request, $category->photo);

        return $category->update($data);
    }

    public static function deleteCategory(self $category)
    {
        Storage::delete($category->photo);

        return $category->delete();
    }

    public static function uploadPhoto(Request $request, $image = null)
    {
        return self::uploadMaterialFilepond(
            storage_path: 'categories',
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
