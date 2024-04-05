<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\CreateRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Http\Requests\FilepondRequest;
use App\Models\Article;
use App\Models\Material;
use App\Models\TemporaryFile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FilepondController extends Controller
{
    /**
     * @param FilepondRequest $request
     * @return string
     */
    public function uploadFile(FilepondRequest $request)
    {
        $key = $request->key;

        if ($request->hasFile($key)) {
            return self::uploadTmpPath(is_array($request->file($key)) ? $request->file($key)[0] : $request->file($key));
        }
        return '';
    }

    /**
     * @param FilepondRequest $request
     * @return string|null
     */
    public function revertFile(Request $request)
    {
        $path = $request->getContent();

        Storage::deleteDirectory("filepond/tmp/{$path}");
        $temporary_file = TemporaryFile::query()->where('folder', $path)->first();
        $temporary_file?->delete();

        return null;
    }

    private static function uploadTmpPath(UploadedFile $file)
    {
        $folder = uniqid().'-'.date('Y-m-d');
        $extension = $file->getClientOriginalExtension();
        $filename = uniqid().'.'.$extension;
        Storage::putFileAs("filepond/tmp/{$folder}", $file, $filename);

        TemporaryFile::query()->create([
            'folder' => $folder,
            'filename' => $filename,
        ]);

        return $folder;
    }
}
