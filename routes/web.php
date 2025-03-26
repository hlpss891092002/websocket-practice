<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SigninMiddleware;

Route::get('/', function () {
    return view('welcome');
})->middleware(SigninMiddleware::class);

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/login', function () {
    return view('login');
})->name('loginPage');

Route::get('/broadcast', function () {
    return view('broadcast');
});
// ->middleware(SigninMiddleware::class);
