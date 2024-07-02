<?php

use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome')->name('dashboard');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/flights', [FlightController::class, 'index']);

Route::get('/flights/{id}', [FlightController::class, 'get']);

Route::post('/flights', [FlightController::class, 'create'])->withoutMiddleware('web');

Route::patch('/flights/{id}', [FlightController::class, 'update'])->withoutMiddleware('web');

Route::delete('/flights/{id}', [FlightController::class, 'delete'])->withoutMiddleware('web');


Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/validate-login', [UserController::class, 'validateLogin'])->name('validateLogin');

Route::get('/timeline', [UserController::class, 'timeline'])->name('timeline');
Route::get('/marketplace', [UserController::class, 'marketplace'])->name('marketplace');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');