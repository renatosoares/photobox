<?php

use App\Http\Controllers\API\Collective\MediaController as CollectiveMediaController;
use App\Http\Controllers\API\Collective\PublicationController as CollectivePublicationController;
use App\Http\Controllers\API\Collective\RegisteredUserController;
use App\Http\Controllers\API\Collective\UserController as CollectiveUserController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\MediaController;
use App\Http\Controllers\API\PublicationController;
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
    Route::name('collective.')->prefix('collective')->group(function () {
        // TODO
    });
});

// #############################################################################
// PUBLIC ######################################################################
// #############################################################################
Route::name('collective.')->prefix('collective')->group(function () {
    Route::get(
        '/phpinfo',
        function () {
            phpinfo();
        }
    );

    Route::post(
        '/register',
        [RegisteredUserController::class, 'store']
    )
        ->name('register.store');

    Route::name('media.')->group(function () {
        Route::get(
            'media',
            [CollectiveMediaController::class, 'index']
        )->name('index');

        Route::get(
            'media/{media}',
            [CollectiveMediaController::class, 'show']
        )->name('show');
    });

    Route::name('publication.')->group(function () {
        Route::get(
            'publication',
            [CollectivePublicationController::class, 'index']
        )->name('index');

        Route::get(
            'publication/{publication:slug}',
            [CollectivePublicationController::class, 'show']
        )->name('show');
    });

    Route::name('user.')->group(function () {
        Route::get(
            '/user',
            [CollectiveUserController::class, 'index']
        )
            ->name('index');

        Route::get(
            '/user/{user}',
            [CollectiveUserController::class, 'show']
        )
            ->name('show');

        Route::get(
            '/user/{user}/media',
            [CollectiveUserController::class, 'mediaIndex']
        )
            ->name('media.index');

        Route::get(
            '/user/{user}/publication',
            [CollectiveUserController::class, 'publicationIndex']
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

        Route::get(
            '/user',
            [UserController::class, 'show']
        )->name('show');
    });
});
