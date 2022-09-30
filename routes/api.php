<?php

use App\Http\Controllers\Api\RegisteredUserController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\PublicationController;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Passport::routes();

// #############################################################################
// ADMIN #######################################################################
// #############################################################################
Route::middleware(['auth:api'])->group(function () {
    Route::name('admin.')->prefix('admin')->group(function () {
        // TODO
    });
});

// #############################################################################
// ADMIN PUBLIC ################################################################
// #############################################################################
Route::name('admin.')->prefix('admin')->group(function () {
    Route::name('public.')->prefix('public')->group(function () {
        // TODO
    });
});

// #############################################################################
// PUBLIC ######################################################################
// #############################################################################
Route::name('public.')->prefix('public')->group(function () {
    Route::post(
        '/register',
        [RegisteredUserController::class, 'store']
    )
        ->name('register.store');

    Route::name('media.')->group(function () {
        Route::get(
            'media',
            [MediaController::class, 'index']
        )->name('index');

        Route::get(
            'media/{media}',
            [MediaController::class, 'show']
        )->name('show');
    });

    Route::name('publication.')->group(function () {
        Route::get(
            'publication',
            [PublicationController::class, 'index']
        )->name('index');

        Route::get(
            'publication/{publication:slug}',
            [PublicationController::class, 'show']
        )->name('show');
    });

    Route::name('user.')->group(function () {
        Route::get(
            '/user',
            [UserController::class, 'index']
        )
            ->name('index');

        Route::get(
            '/user/{user}',
            [UserController::class, 'show']
        )
            ->name('show');

        Route::get(
            '/user/{user}/media',
            [UserController::class, 'mediaIndex']
        )
            ->name('media.index');

        Route::get(
            '/user/{user}/publication',
            [UserController::class, 'publicationIndex']
        )
            ->name('publication.index');
    });
});

// #############################################################################
// AUTH ########################################################################
// #############################################################################
Route::middleware(['auth:api'])->group(function () {
    Route::name('media.')->group(function () {
        Route::post(
            'media',
            [MediaController::class, 'store']
        )->name('store');


        Route::get(
            'media',
            [MediaController::class, 'index']
        )->name('index');
    });

    Route::name('publication.')->group(function () {
        Route::post(
            'publication',
            [PublicationController::class, 'store']
        )->name('store');
    });

    Route::name('user.')->group(function () {
        Route::post(
            '/user/{user}',
            [UserController::class, 'update']
        )
            ->name('update');
    });
});
