<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
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
Route::get('/logout', [UserController::class, 'logout']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/user/edit', [UserController::class, 'edit']);
    Route::post('/user/update', [UserController::class, 'update']);

    Route::post('/car/store', [CarController::class, 'store']);
    Route::put('/car/update', [CarController::class, 'update']);
    Route::resource('rides', RideController::class)->except([
        'show', 'update', 'edit'
    ]);

    Route::get('search/rides', [RideController::class, 'index']);
    Route::post('search/rides', [RideController::class, 'search']);

    Route::get('/bookings/{ride}/create', [BookingController::class, 'create']);
    Route::post('bookings/{ride}/store', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('bookings', [BookingController::class, 'index']);
});