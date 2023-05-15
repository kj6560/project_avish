<?php

use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\SportsController;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('/sports', SportsController::class)->middleware('auth:api');
Route::apiResource('/events', EventsController::class)->middleware('auth:api');
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);