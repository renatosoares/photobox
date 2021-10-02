<?php

use App\Http\Controllers\Api\RegisteredCustomerController;
use App\Http\Controllers\Api\Admin\RegisteredUserController;
use App\Http\Controllers\Api\CustomerController;
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

Route::prefix('public')->group(function () {
    Route::post(
        '/register',
        [RegisteredCustomerController::class, 'store']
    )
        ->name('register.store');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('public')->name('public.')->group(function () {
        Route::post(
            '/register',
            [RegisteredUserController::class, 'store']
        )
            ->name('register.store');
    });
});

Route::name('customer.')->group(function () {
    Route::post(
        '/customer',
        [CustomerController::class, 'store']
    )
        ->name('store');
});
