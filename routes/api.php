<?php

use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\SportsController;
use App\Http\Controllers\Api\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/sports', [SportsController::class, 'index'])->middleware('auth');
Route::get('/events', [EventsController::class,'index'])->middleware('auth:api');
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);