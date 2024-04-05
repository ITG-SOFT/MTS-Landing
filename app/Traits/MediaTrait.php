<?php

namespace App\Traits;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait MediaTrait
{
    public static function uploadMedia($key, $path, Request $request, $image = null)
    {
        if ($request->hasFile($key)) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file($key)->store("{$path}/{$folder}");
        }
        return $image;
    }

    public static function uploadMediaFile($path, UploadedFile $file, $image = null)
    {
        if ($image) {
            Storage::delete($image);
        }
        $folder = date('Y-m-d');
        return $file->store("{$path}/{$folder}");
    }

    public static function uploadMaterialFilepond(string $storage_path, string $key, Request $request, string $file = null)
    {
        $path = $request->input($key);

        if ($path) {
            if ($file) {
                Storage::delete($file);
            }

            $date = date('Y-m-d');

            $temporary_file = TemporaryFile::query()->where('folder', $path)->first();
    //        storage_path('app/public/storage/docs/tmp/'.$file);

            if ($temporary_file) {
                $new_path = "{$storage_path}/{$date}/{$temporary_file->filename}";
                Storage::move("filepond/tmp/{$path}/{$temporary_file->filename}", $new_path);
                rmdir(public_path("storage/filepond/tmp/{$path}"));
                $temporary_file->delete();

                return $new_path;
            }
        }

        return $file;
    }

    public static function uploadMaterialFileFilepond(string $path, string $file, $image = null)
    {
        if ($image) {
            Storage::delete($image);
        }

        $date = date('Y-m-d');

        $temporary_file = TemporaryFile::query()->where('folder', $file)->first();
        //        storage_path('app/public/storage/docs/tmp/'.$file);

        if ($temporary_file) {
            $new_path = "{$path}/{$date}/{$temporary_file->filename}";
            Storage::move("filepond/tmp/{$file}/{$temporary_file->filename}", $new_path);
            rmdir(public_path("storage/filepond/tmp/{$file}"));
            $temporary_file->delete();

            return $new_path;
        }

        return $image;
    }

    public function getMedia($key)
    {
        if (!$this->$key) {
            return null;
        }

        if (str_contains($this->$key, 'http') || str_contains($this->$key, 'https')) {
            return asset($this->$key);
        }

        return asset("storage/{$this->$key}");
    }
}
