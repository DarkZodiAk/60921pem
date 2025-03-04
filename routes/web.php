<?php

use App\Http\Controllers\LoginController;
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
Route::get('/question/create', [QuestionController::class, 'create'])->middleware('auth');
Route::get('/question/{id}', [QuestionController::class, 'show']);
Route::post('/question', [QuestionController::class, 'store'])->middleware('auth');
Route::get('/question/edit/{id}', [QuestionController::class, 'edit'])->middleware('auth');
Route::post('/question/update/{id}', [QuestionController::class, 'update'])->middleware('auth');
Route::get('/question/destroy/{id}', [QuestionController::class, 'destroy'])->middleware('auth');

Route::get('/tag', [TagController::class, 'index']);
Route::get('/tag/{id}', [TagController::class, 'show']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/auth', [LoginController::class, 'authenticate'])->name('auth');

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});

