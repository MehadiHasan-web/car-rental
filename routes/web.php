<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Models\Admin\Car;
use App\Models\Frontend\Rental;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




// route group
Route::group([], function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/rentals', [FrontendController::class, 'rental'])->name('frontend.rentals');
    Route::get('/car/{id}', [FrontendController::class, 'show'])->name('car.show');
    Route::post('/car/book', [RentalController::class, 'store'])->name('car.book');
    Route::get('/search', [FrontendController::class, 'search'])->name('search');
    // cancel rental
    Route::put('/rental/cancel/{id}', [FrontendController::class, 'cancel'])->name('rental.cancel');
});




Route::get('/dashboard', function () {
    if (Auth::user()->role !== '1') {
        return redirect()->route('home');
    }

    $totalCars = Car::get()->count();
    $totalRentals = Rental::get()->count();
    $totalUsers = User::get()->count();

    return view('admin.partials.dashboard', compact('totalCars', 'totalRentals', 'totalUsers'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('cars', CarController::class);
    Route::resource('rentals', RentalController::class);

    Route::get('users', function () {
        $users = User::all();
        return view('admin.partials.users.index', compact('users'));
    })->name('users');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
