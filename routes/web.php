<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Rutas para el Cliente
Route::middleware(['auth'])->group(function () {
    Route::resource('reservations', ReservationController::class);
});

// Rutas para el Administrador
Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class)->middleware(AdminMiddleware::class);
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->middleware(AdminMiddleware::class)->name('reservations.edit');
    Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->middleware(AdminMiddleware::class)->name('reservations.update');
});