<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\SearchController;
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

Route::prefix('/v1') -> group(function() {
    Route::get('/test-api', [RestaurantController::class, 'testApi']);
    Route::get('/test-search-api', [SearchController::class, 'testApi']);
    Route::get('/restaurant_typology', [RestaurantController::class, 'typologiesIndex']);
    Route::get('/search_typology', [SearchController::class, 'searchByTypology']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


