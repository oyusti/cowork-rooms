<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
        return  view('dashboard');     
    })->name('dashboard');


route::resource('/rooms', RoomController::class)
->names('rooms')
->except('show');  

route::resource('/reservations', ReservationController::class)
->names('reservations');


/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */
