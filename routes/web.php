<?php

use App\Http\Controllers\RideController;
use App\Http\Controllers\UserController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/register', function() {
    $roles = Role::all();
    return view('auth', ['roles' => $roles]);
});

Route::get('/login', function() {
    $roles = Role::all();
    return view('auth', ['roles' => $roles]);
})->name('login');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get( '/logout', [UserController::class, 'logout']);

Route::group(['middleware' => 'auth'], function() {
    Route::resource('rides', RideController::class)->except([
        'show', 'update', 'edit'
    ]);;
});