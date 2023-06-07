<?php

use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\SportsController;
use App\Http\Controllers\Api\HomeController;
use Illuminate\Support\Facades\Route;


Route::apiResource('/sports', 'App\Http\Controllers\Api\SportsController')->middleware('auth:api');
Route::apiResource('/events', 'App\Http\Controllers\Api\EventsController')->middleware('auth:api');
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);