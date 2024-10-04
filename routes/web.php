<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProfileController;
use Illuminate\Support\Facades\Route;



// route group
Route::group([], function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/rentals', [FrontendController::class, 'rental'])->name('frontend.rentals');
    Route::get('/car/{id}', [FrontendController::class, 'show'])->name('car.show');
    Route::post('/car/book', [RentalController::class, 'store'])->name('car.book');
});




Route::get('/dashboard', function () {
    return view('admin.partials.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('cars', CarController::class);
    Route::resource('rentals', RentalController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
