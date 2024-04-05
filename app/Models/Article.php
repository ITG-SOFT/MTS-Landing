<?php

namespace App\Models;

use App\Http\Requests\Article\CreateRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Traits\FormatDateTrait;
use App\Traits\MediaTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory, MediaTrait, Sluggable, FormatDateTrait;

    protected $fillable = [
        'title',
        'photo',
        'slug',
        'text',
        'published',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function photos()
    {
        return $this->morphMany(Photo::class, 'imaginable');
    }

    public static function getArticles(int $limit = null, int $paginate = null, int $except = null, $with = [])
    {
        $articles = self::query();

        $articles->when($with, function (Builder $query) use ($with) {
            $query->with($with);
        });
        $articles->when($limit, function (Builder $query) use ($limit) {
            $query->limit($limit);
        });
        $articles->when($except, function (Builder $query) use ($except) {
            $query->whereNot('id', $except);
        });
        $articles->where('published', true);
        $articles->orderBy('created_at', 'DESC');

        return $paginate ? $articles->paginate($paginate) : $articles->get();
    }

    public static function createArticle(CreateRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = self::uploadPhoto($request);
        $data['published'] = (bool)$request->published;

        /** @var Article $article */
        $article = self::query()->create($data);

        if (isset($data['photos'])) {
            foreach ($data['photos'] as $photo) {
                $photo = self::uploadPath($photo);
                $article->photos()->create([
                    'path' => $photo,
                ]);
            }
        }

//        TemporaryFile::clearTmpFiles();
        return $article;
    }

    public static function updateArticle(UpdateRequest $request, Article $article)
    {
        $data = $request->validated();
        $data['photo'] = self::uploadPhoto($request, $article->photo);
        $data['published'] = (bool)$request->published;

        if (isset($data['photos'])) {
            foreach ($data['photos'] as $photo) {
                $photo = self::uploadPath($photo);
                $article->photos()->create([
                    'path' => $photo,
                ]);
            }
        }

//        TemporaryFile::clearTmpFiles();
        return $article->update($data);
    }

    public static function deleteArticle(Article $article)
    {
        Storage::delete($article->photo);

        foreach ($article->photos as $photo) {
            Photo::deletePhoto($photo);
        }

        return $article->delete();
    }

//    public static function uploadPhoto(Request $request, $image = null)
//    {
//        return self::uploadMedia(
//            key: 'photo',
//            path: 'articles',
//            request: $request,
//            image: $image,
//        );
//    }

    public static function uploadPhoto(Request $request, $image = null)
    {
        return self::uploadMaterialFilepond(
            storage_path: 'articles',
            key: 'photo',
            request: $request,
            file: $image,
        );
    }

//    public static function uploadPath(UploadedFile $file, $file_old = null)
//    {
//        return self::uploadMediaFile(
//            path: 'articles/photos',
//            file: $file,
//            image: $file_old,
//        );
//    }

    public static function uploadPath(string $file, $file_old = null)
    {
        return self::uploadMaterialFileFilepond(
            path: 'articles/photos',
            file: $file,
            image: $file_old,
        );
    }

    public function getPhoto()
    {
        return self::getMedia('photo');
    }

    public function getCreatedAt($format = 'd M Y')
    {
        return $this->formatDate($this->created_at, $format);
    }

    public function getUpdatedAt($format = 'd M Y')
    {
        return $this->formatDate($this->updated_at, $format);
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
