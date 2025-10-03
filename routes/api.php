<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionControllerApi;
use App\Http\Controllers\TagControllerApi;
use Illuminate\Http\Request;
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

Route::post('/login', [AuthController::class, 'login']);

Route::get('/question', [QuestionControllerApi::class, 'index']);
Route::get('/question/{id}', [QuestionControllerApi::class, 'show']);
Route::get('/questions_total', [QuestionControllerApi::class, 'total']);

Route::get('/tag/{id}', [TagControllerApi::class, 'show']);
Route::get('/tags_total', [TagControllerApi::class, 'total']);

Route::group(['middleware' => ['auth:sanctum']],  function () {
    Route::post('/question', [QuestionControllerApi::class, 'store']);
    Route::get('/tag', [TagControllerApi::class, 'index']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});
