<?php

use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/flights', [FlightController::class, 'index']);

Route::get('/flights/{id}', [FlightController::class, 'get']);

Route::post('/flights', [FlightController::class, 'create'])->withoutMiddleware('web');

Route::patch('/flights/{id}', [FlightController::class, 'update'])->withoutMiddleware('web');

Route::delete('/flights/{id}', [FlightController::class, 'delete'])->withoutMiddleware('web');
