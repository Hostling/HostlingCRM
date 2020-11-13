<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HostingController;

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
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function() {
    Route::get('check', [AuthController::class, 'check']);
    Route::get('getTable', [HostingController::class, 'getTable']);
    Route::post('editTable', [HostingController::class, 'editTable']);
    Route::delete('delete/{id}', [HostingController::class, 'delete']);
    Route::post('addDomen', [HostingController::class, 'addDomen']);
});

Route::post('botwh', 'TelegramController@botwh');




