<?php

use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/login', [SiteController::class, 'login'])->name('login');
Route::post('/loginAuthentication', [SiteController::class, 'loginAuthentication'])->name('loginAuthentication');
Route::get('/register', [SiteController::class, 'register'])->name('register');
Route::post('/subscribe', [SiteController::class, 'subscribe'])->name('subscribe');
Route::post('/createUser', [SiteController::class, 'createUser'])->name('createUser');
Route::get('/logout', [SiteController::class, 'logout'])->name('logout');
Route::get('/forgotPassword', [SiteController::class, 'forgot'])->name('forgot');
Route::get('/reset', [SiteController::class, 'resetPassword'])->name('resetPassword');
Route::post('/forgotPasswordUser', [SiteController::class, 'forgotPasswordUser'])->name('forgotPasswordUser');
Route::post('/resetPasswordUser', [SiteController::class, 'resetPasswordUser'])->name('resetPasswordUser');