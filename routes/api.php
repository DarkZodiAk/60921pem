<?php

use App\Http\Controllers\QuestionControllerApi;
use App\Http\Controllers\TagControllerApi;
use App\Http\Controllers\UserControllerApi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/question', [QuestionControllerApi::class, 'index']);
Route::get('/question/{id}', [QuestionControllerApi::class, 'show']);
Route::get('/tag', [TagControllerApi::class, 'index']);
Route::get('/tag/{id}', [TagControllerApi::class, 'show']);
Route::get('user', [UserControllerApi::class, 'index']);
Route::get('user/{id}', [UserControllerApi::class, 'show']);
