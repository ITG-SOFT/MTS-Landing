<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TemporaryFile extends Model
{
    use HasFactory;

    protected $fillable = ['folder', 'filename'];

    public static function clearTmpFiles()
    {
        $tmp_files = self::all();

        foreach ($tmp_files as $tmp_file) {
            Storage::deleteDirectory("filepond/tmp/{$tmp_file->folder}");
            $tmp_file->delete();
        }
    }
}
