<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World']);
});
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/question', [QuestionController::class, 'index']);
Route::get('/question/{id}', [QuestionController::class, 'show']);
Route::get('/tag', [TagController::class, 'index']);
Route::get('/tag/{id}', [TagController::class, 'show']);
