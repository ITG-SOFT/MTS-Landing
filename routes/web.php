<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TokenController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Settings\FilepondController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::name('front.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::name('mail.')->prefix('/mail')->group(function () {
        Route::get('/cancel', [HomeController::class, 'cancelMail'])->name('cancel');
        Route::get('/successes-canceled', [HomeController::class, 'cancelMail'])->name('successes-canceled');
    });
});

Route::prefix('/ajax')->name('ajax.')->group(function () {
    Route::prefix('/files')->name('filepond.')->group(function () {
        Route::post('/upload', [FilepondController::class, 'uploadFile'])->name('upload');
        Route::delete('/revert', [FilepondController::class, 'revertFile'])->name('revert');
    });
});

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::middleware('guest')->controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login.show');
        Route::post('/login', 'auth')->name('login.auth');
        Route::get('/register', 'register')->name('register.show');
        Route::post('/register', 'store')->name('register.store');
    });
    Route::middleware('auth')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/logout', 'logout')->name('logout');
            Route::get('/', 'index')->name('home');
        });

        Route::resource('/categories', CategoryController::class)->except(['show']);

        Route::prefix('/categories/{category}')->name('categories.')->group(function () {
            Route::resource('/attributes', AttributeController::class)->except(['index', 'show']);
        });

        Route::resource('/companies', CompanyController::class)->except(['show']);

        Route::resource('/feedbacks', FeedbackController::class)->except(['show']);

        Route::resource('/products', ProductController::class)->except(['show']);

        Route::resource('/articles', ArticleController::class)->except(['show']);

        Route::patch('/articles/{article}/publish', [ArticleController::class, 'changePublish'])->name('articles.publish');

        Route::delete('/photos/{photo}', [PhotoController::class, 'destroyPhoto'])->name('photos.destroy');

        Route::middleware('super-admin')->group(function () {
            Route::resource('/tokens', TokenController::class);
            Route::resource('/users', UserController::class);
        });

        Route::controller(UserController::class)->group(function () {
            Route::get('/change-password', 'changePassword')->name('change-password');
            Route::post('/change-password', 'passwordStore')->name('change-password.store');

            Route::name('users.')->middleware('super-admin')->group(function () {
                Route::patch('/users/{user}/change-rights', 'changeRights')->name('change-rights');
            });
        });
    });
});
