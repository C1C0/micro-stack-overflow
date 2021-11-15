<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuestionController::class, 'index']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::get('logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::post('sessions', [SessionController::class, 'store'])->middleware('guest');

Route::get('user/{user:username}', [UserController::class, 'index'])->middleware('auth');
