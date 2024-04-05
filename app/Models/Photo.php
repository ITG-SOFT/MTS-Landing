<?php

namespace App\Models;

use App\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory, MediaTrait;

    protected $fillable = ['path', 'imaginable_id', 'imaginable_type'];

    protected $casts = [
        'imaginable_id' => 'integer',
    ];

    public function imaginable()
    {
        return $this->morphTo();
    }

    public static function deletePhoto(Photo $photo)
    {
        Storage::delete($photo->path);

        return $photo->delete();
    }

    public function getPath()
    {
        return self::getMedia('path');
    }
}
