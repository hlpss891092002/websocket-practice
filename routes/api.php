<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\SigninMiddleWare;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'auth'
],function () {
    Route::post('login', [AuthController::class,'login']);
    Route::get('logout', [AuthController::class, 'logout'])->middleware(SigninMiddleWare::class);
    Route::get('refresh', [AuthController::class, 'refresh'])->middleware(SigninMiddleWare::class);
    Route::get('me', [AuthController::class, 'me']);

});

Route::middleware(SigninMiddleWare::class)->get('/users', [UserController::class, 'getUsers']);
Route::middleware(SigninMiddleWare::class)->prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'register']);          
    Route::get('/{userData}', [UserController::class, 'getUser']);
    Route::patch('/{userData}', [UserController::class, 'updateUser']);
});