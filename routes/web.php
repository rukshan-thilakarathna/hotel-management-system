<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Pages\aboutController;
use App\Http\Controllers\Web\Pages\contactController;
use App\Http\Controllers\Web\Pages\diningController;
use App\Http\Controllers\Web\Pages\indexController;
use App\Http\Controllers\Web\Pages\roomsController;
use App\Http\Controllers\Web\User\dashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|--------------------------------------------------------------------------
*/

// Public Route
Route::get('/', [indexController::class, 'index'])->name('index');
Route::get('/rooms', [roomsController::class, 'index'])->name('rooms');
Route::get('/about', [aboutController::class, 'index'])->name('about');
Route::get('/dining', [diningController::class, 'index'])->name('dining');
Route::get('/contact', [contactController::class, 'index'])->name('contact');

// Routes requiring authentication and email verification
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
});

// Routes requiring authentication only
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes (login, register, etc.)
require __DIR__.'/auth.php';
