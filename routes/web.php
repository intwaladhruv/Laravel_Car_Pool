<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/register', function() {
    return view('auth');
});

Route::get('/login', function() {
    return view('auth');
})->name('login');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get( '/logout', [UserController::class, 'logout']);