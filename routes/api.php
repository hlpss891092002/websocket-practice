<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\SigninMiddleware;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth'
],function () {
    Route::post('/login', [AuthController::class,'login']);
    Route::post('/register', [UserController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware(SigninMiddleware::class);
    Route::get('/refresh', [AuthController::class, 'refresh'])->middleware(SigninMiddleware::class);
    Route::get('/me', [AuthController::class, 'me'])->middleware(SigninMiddleware::class);;

});

Route::middleware(SigninMiddleware::class)->get('/users', [UserController::class, 'getUsers']);
Route::middleware(SigninMiddleware::class)->prefix('user')->group(function () {
              
    Route::get('/{userData}', [UserController::class, 'getUser']);
    Route::patch('/{userData}', [UserController::class, 'updateUser']);
});

Route::post('public/send-message', [MessageController::class, 'sendMessage']);