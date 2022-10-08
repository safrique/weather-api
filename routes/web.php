<?php

use App\Http\Controllers\Cities\CitiesController;
use App\Http\Controllers\Forecasts\Forecast5DayController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function () { return view('welcome'); });
Route::prefix('cities')->group(function () {
    Route::get('', [CitiesController::class, 'get']);
    Route::get('add', [CitiesController::class, 'search']);
    Route::get('find', function () { return view('find_city'); });
    Route::post('delete', [CitiesController::class, 'delete']);
    Route::post('search', [CitiesController::class, 'search']);
    Route::post('store', [CitiesController::class, 'store']);
});
Route::get('forecast/{city?}', [Forecast5DayController::class, 'get5DayForecast']);
Route::get('test', function () { return view('test'); });
