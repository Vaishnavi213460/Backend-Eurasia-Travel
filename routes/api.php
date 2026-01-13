<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TravelController;

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout',[AuthController::class,'logout']);

    Route::get('/countries',[TravelController::class,'countries']);
    Route::get('/destinations',[TravelController::class,'destinations']);
    Route::get('/tours',[TravelController::class,'tours']);
    Route::get('/hotels',[TravelController::class,'hotels']);
    Route::get('/attractions',[TravelController::class,'attractions']);
});
