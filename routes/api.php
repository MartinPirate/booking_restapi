<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('clients', [ClientController::class, 'index']);
Route::get('products', [ProductController::class, 'index']);
Route::get('bookings', [BookingController::class, 'index']);
Route::post('bookings', [BookingController::class, 'store']);

