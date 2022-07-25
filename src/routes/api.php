<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShippingRateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('me', [AuthController::class, 'me'])->name('me');
});
Route::get('/jc/{id}', [ShippingRateController::class, 'show'])->name('show');

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['middleware' => 'auth:api', 'prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', fn (Request $request) => $request->user());
    });
    Route::group(['middleware' => 'auth:api', 'prefix' => 'shipping', 'as' => 'shipping.'], function () {
        Route::group(['prefix' => 'rate', 'as' => 'rate.'], function () {
            Route::post('', [ShippingRateController::class, 'create'])->name('create');
            Route::post('import', [ShippingRateController::class, 'create'])->name('import');
            Route::get('{id}', [ShippingRateController::class, 'show'])->name('show');
        });
    });
});
