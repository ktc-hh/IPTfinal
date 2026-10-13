
<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('clients', ClientController::class);
Route::resource('packages', PackageController::class);
Route::resource('bookings', BookingController::class);
