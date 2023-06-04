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
    Route::get('/{id}', [CarController::class, 'show']);
    Route::post('/', [CarController::class, 'store']);
    Route::put('/{id}', [CarController::class, 'update']);
    Route::delete('/{id}', [CarController::class, 'destroy']);
});

Route::group(['prefix' => 'bikes'], function () {
    Route::get('/', [BikeController::class, 'index']);
    Route::get('/{id}', [BikeController::class, 'show']);
    Route::post('/', [BikeController::class, 'store']);
    Route::put('/{id}', [BikeController::class, 'update']);
    Route::delete('/{id}', [BikeController::class, 'destroy']);
});
