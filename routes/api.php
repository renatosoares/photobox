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
Route::name('admin.')->prefix('admin')->group(function () {
    Route::post(
        '/register',
        [RegisteredUserController::class, 'store']
    )
        ->name('register.store');
});

// #############################################################################
// ADMIN PUBLIC ################################################################
// #############################################################################
Route::name('admin.')->prefix('admin')->group(function () {
    Route::prefix('public')->name('public.')->group(function () {
        // TODO
    });
});

// #############################################################################
// PUBLIC ######################################################################
// #############################################################################
Route::prefix('public')->group(function () {
    Route::post(
        '/register',
        [RegisteredCustomerController::class, 'store']
    )
        ->name('register.store');
});

// #############################################################################
// AUTH ########################################################################
// #############################################################################
Route::name('customer.media.')->group(function () {
    Route::post(
        'customer/{customer}/media',
        [CustomerMediaController::class, 'store']
    )->name('store');

    Route::get(
        'customer/{customer}/media',
        [CustomerMediaController::class, 'index']
    )->name('index');
});

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

Route::name('customer.')->group(function () {
    Route::post(
        '/customer',
        [CustomerController::class, 'store']
    )
        ->name('store');
});
