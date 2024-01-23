<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\TranslationController;

use Illuminate\Support\Facades\Route;






Route::group([
    'middleware' => 'api', 'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
Route::middleware(['jwt.verify'])->group(function () {
    Route::get('/posts',[PostController::class,'index']);
    Route::get('/post/{id}',[PostController::class,'show']);
    Route::post('/posts',[PostController::class,'store']);
    Route::post('/post/{id}',[PostController::class,'update']);
    Route::delete('/posts/{id}',[PostController::class,'destroy']);
});



Route::get('/translations/{locale}', [TranslationController::class, 'translate']);
