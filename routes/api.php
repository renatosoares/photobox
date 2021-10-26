<?php

use App\Http\Controllers\Api\RegisteredCustomerController;
use App\Http\Controllers\Api\Admin\RegisteredUserController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\CustomerMediaController;
use App\Http\Controllers\Api\MediaController;
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
        Route::post(
            '/register',
            [RegisteredUserController::class, 'store']
        )
        ->name('register.store');
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
        [RegisteredCustomerController::class, 'store']
    )
        ->name('register.store');

    Route::name('media.')->group(function () {
        Route::get(
            'media/{customer?}',
            [MediaController::class, 'index']
        )->name('index');

        Route::get(
            'media/{media}',
            [MediaController::class, 'show']
        )->name('show');
    });

    Route::name('customer.')->group(function () {
        Route::get(
            '/customer',
            [CustomerController::class, 'index']
        )
            ->name('index');

        Route::get(
            '/customer/{customer}',
            [CustomerController::class, 'show']
        )
            ->name('show');
    });
});

// #############################################################################
// AUTH ########################################################################
// #############################################################################
Route::middleware(['auth:api'])->group(function () {
    Route::name('media.')->group(function () {
        Route::post(
            'media/{customer}',
            [MediaController::class, 'store']
        )->name('store');
    });

    Route::name('customer.')->group(function () {
        Route::post(
            '/customer',
            [CustomerController::class, 'update']
        )
            ->name('update');
    });
});
