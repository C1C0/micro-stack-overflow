<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuestionController::class, 'index']);
Route::get('question/create', [QuestionController::class, 'create'])->middleware('auth');
Route::get('question/{question}', [QuestionController::class, 'show']);
Route::post('question', [QuestionController::class, 'store'])->middleware('auth');
Route::get('question/{question}/edit', [QuestionController::class, 'edit'])->middleware('auth');
Route::patch('question/{question}', [QuestionController::class, 'update'])->middleware('auth');

Route::post('question/{question}/answer', [AnswerController::class, 'store'])->middleware('auth');
Route::patch('question/{question}/answer/{answer}', [AnswerController::class, 'update'])->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::get('logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::post('sessions', [SessionController::class, 'store'])->middleware('guest');

Route::get('user/{user:id}', [UserController::class, 'index'])->middleware('auth');
Route::put('user/{user:id}', [UserController::class, 'update'])->middleware('auth');
Route::post('user/{user}/picture', [UserController::class, 'picture'])->middleware('auth');
Route::delete('user/{user}/picture', [UserController::class, 'remove'])->middleware('auth');

Route::post('vote/question/{question}', [VoteController::class, 'question'])->middleware('auth');
