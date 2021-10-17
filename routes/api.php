<?php

use App\Http\Controllers\Api\RegisteredCustomerController;
use App\Http\Controllers\Api\Admin\RegisteredUserController;
use App\Http\Controllers\Api\CustomerController;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
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

Route::name('customer.media.')->group(function () {
    Route::post('customer/media/store', function (Request $request) {
        $customer = Customer::find($request->input('customer_id'));
        $media = $customer->addMedia($request->media_file)
            ->withCustomProperties(json_decode($request->custom_properties, true))
            ->toMediaCollection('images');

        return response()->json([
            $media,
        ]);
    })->name('store');

    Route::get('customer/media', function (Request $request) {
        /** @var \App\Models\Customer $customer */
        $customer = Customer::find($request->input('customer_id'));

        return response()->json([
            $customer->getMedia('images')->all(),
        ]);
    })->name('index');
});

Route::name('media.')->group(function () {

    Route::get('media', function (Request $request) {
        return response()->json([
        ]);
    })->name('index');

    Route::get('media/{media}', function (Request $request) {
        return response()->json([
        ]);
    })->name('show');
});

Route::prefix('admin')->name('admin.')->group(function () {
});

Route::name('customer.')->group(function () {
    Route::post(
        '/customer',
        [CustomerController::class, 'store']
    )
        ->name('store');
});
