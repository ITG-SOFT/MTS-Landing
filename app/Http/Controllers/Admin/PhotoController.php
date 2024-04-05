<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    /**
     * @param Photo $photo
     * @return RedirectResponse
     */
    public function destroyPhoto(Photo $photo)
    {
        $photo = Photo::deletePhoto($photo);

        $redirect = redirect()->back();

        if (!$photo) {
            return $redirect->with('error', __('messages.photo.error.destroy'));
        }

        return $redirect->with('success', __('messages.photo.success.destroy'));
    }
}
