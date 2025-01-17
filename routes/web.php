<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Pages\aboutController;
use App\Http\Controllers\Web\Pages\billController;
use App\Http\Controllers\Web\Pages\bookingConfirmationController;
use App\Http\Controllers\Web\Pages\cancallBookingController;
use App\Http\Controllers\Web\Pages\contactController;
use App\Http\Controllers\Web\Pages\diningController;
use App\Http\Controllers\Web\Pages\indexController;
use App\Http\Controllers\Web\Pages\menuController;
use App\Http\Controllers\Web\Pages\RestaurantOrderController;
use App\Http\Controllers\Web\Pages\roomsController;
use App\Http\Controllers\Web\User\dashboardController;
use App\Http\Controllers\Web\User\myBookingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|--------------------------------------------------------------------------
*/



// Public Route - Get
Route::get('/', [indexController::class, 'index'])->name('index');
Route::get('/rooms/{checkin?}/{checkout?}', [roomsController::class, 'index'])->name('rooms');
Route::get('/about', [aboutController::class, 'index'])->name('about');
Route::get('/dining', [diningController::class, 'index'])->name('dining');
Route::get('/contact', [contactController::class, 'index'])->name('contact');


// Routes requiring authentication and email verification
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('/my-bookings', [myBookingsController::class, 'index'])->name('my-bookings');
    Route::get('/menu/{booking_id}', [menuController::class, 'index'])->name('menu');
    Route::get('/bill/{booking_id}', [billController::class, 'index'])->name('bill');
    Route::post('/restaurant-order', [RestaurantOrderController::class, 'index'])->name('restaurant-order');
    Route::get('/booking-confirmation/{id}', [bookingConfirmationController::class, 'index'])->name('booking-confirmation');
    Route::post('/cancel-booking', [cancallBookingController::class, 'index'])->name('cancel-booking');
    Route::post('/booking-confirmation', [bookingConfirmationController::class, 'store'])->name('booking-confirmation-store');
});

// Routes requiring authentication only
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes (login, register, etc.)
require __DIR__.'/auth.php';
