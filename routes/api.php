<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CarController;
use \App\Http\Controllers\BikeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('/vehicles',VehicleController::class);
Route::group(['prefix' => 'cars'], function () {
    Route::get('/', [CarController::class, 'index']);
    Route::get('/{id}', [CarController::class, 'find']);
    Route::post('/', [CarController::class, 'create']);
    Route::put('/{id}', [CarController::class, 'update']);
    Route::delete('/{id}', [CarController::class, 'destroy']);

    Route::get('/stock', [CarController::class, 'getStock']);
    Route::post('/{id}/sales', [CarController::class, 'addSale']);
    Route::get('/{id}/sales', [CarController::class, 'getDetailSales']);
//    Route::get('/sales/recap', [CarController::class, 'getSalesRecap']);
});

Route::group(['prefix' => 'bikes'], function () {
    Route::get('/', [BikeController::class, 'index']);
    Route::get('/{id}', [BikeController::class, 'find']);
    Route::post('/', [BikeController::class, 'create']);
    Route::put('/{id}', [BikeController::class, 'update']);
    Route::delete('/{id}', [BikeController::class, 'destroy']);

    Route::get('/stock', [BikeController::class, 'getStock']);
    Route::post('/{id}/sales', [BikeController::class, 'addSale']);
    Route::get('/{id}/sales', [BikeController::class, 'getDetailSales']);
//    Route::get('/sales/recap', [BikeController::class, 'getSalesRecap']);
});
