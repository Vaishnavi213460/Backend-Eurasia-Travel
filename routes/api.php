<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TravelController;
use App\Http\Controllers\Api\EnquiryController;

Route::post('/auth/register',[AuthController::class,'register']);
Route::post('/auth/login',[AuthController::class,'login']);
Route::post('/auth/verify-email', [AuthController::class, 'verifyEmail']);
Route::post('/auth/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/auth/reset-password', [AuthController::class, 'resetPassword']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout',[AuthController::class,'logout']);

    Route::get('/countries',[TravelController::class,'countries']);
    Route::get('/destinations',[TravelController::class,'destinations']);
    Route::get('/tours',[TravelController::class,'tours']);
    Route::get('/hotels',[TravelController::class,'hotels']);
    Route::get('/attractions',[TravelController::class,'attractions']);

    Route::post('/enquiries', [EnquiryController::class, 'store']);
});
