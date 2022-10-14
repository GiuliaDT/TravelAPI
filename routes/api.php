<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TravelController;

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

//Same controller inside a group
Route::controller(TravelController::class)->group(function () {
    Route::get('/travels', 'index');
    Route::post('/travel', 'store');
    Route::get('/travel/{id}', 'show');
    Route::put('/travel/{id}', 'update');
    Route::delete('/travel/{id}', 'destroy');
   Route::get('/travels', 'search');
});