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

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/question', [QuestionController::class, 'index']);
Route::get('/question/create', [QuestionController::class, 'create']);
Route::get('/question/{id}', [QuestionController::class, 'show']);
Route::post('/question', [QuestionController::class, 'store']);
Route::get('/question/edit/{id}', [QuestionController::class, 'edit']);
Route::post('/question/update/{id}', [QuestionController::class, 'update']);
Route::get('/question/destroy/{id}', [QuestionController::class, 'destroy']);

Route::get('/tag', [TagController::class, 'index']);
Route::get('/tag/{id}', [TagController::class, 'show']);

