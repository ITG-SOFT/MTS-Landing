<?php

namespace App\Models;

use App\Http\Requests\FeedbackRequest;
use App\Traits\FormatDateTrait;
use App\Traits\MediaTrait;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Feedback extends Model
{
    use HasFactory, MediaTrait, FormatDateTrait;

    protected $fillable = [
        'name',
        'photo',
        'rate',
        'text',
        'product_id',
    ];

    protected $casts = [
        'rate' => 'integer',
        'product_id' => 'integer',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getCreatedAt($format = 'd M Y')
    {
        return $this->formatDate($this->created_at, $format);
    }

    public static function getFeedbacks(int $limit = null, int $paginate = null, int $except = null, $with = [])
    {
        $feedbacks = self::query();

        $feedbacks->when($with, function (Builder $query) use ($with) {
            $query->with($with);
        });
        $feedbacks->when($limit, function (Builder $query) use ($limit) {
            $query->limit($limit);
        });
        $feedbacks->when($except, function (Builder $query) use ($except) {
            $query->whereNot('id', $except);
        });
        $feedbacks->orderBy('name');

        return $paginate ? $feedbacks->paginate($paginate) : $feedbacks->get();
    }

    public static function createFeedback(FeedbackRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = self::uploadPhoto($request);

        /** @var Feedback $feedback */
        $feedback = self::query()->create($data);

//        TemporaryFile::clearTmpFiles();
        return $feedback;
    }

    public static function updateFeedback(FeedbackRequest $request, self $feedback)
    {
        $data = $request->validated();
        $data['photo'] = self::uploadPhoto($request, $feedback->photo);

//        TemporaryFile::clearTmpFiles();
        return $feedback->update($data);
    }

    public static function deleteFeedback(self $feedback)
    {
        Storage::delete($feedback->photo);

        return $feedback->delete();
    }

    public static function uploadPhoto(Request $request, $image = null)
    {
        return self::uploadMaterialFilepond(
            storage_path: 'feedbacks',
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
        return $this->name;
    }
}
