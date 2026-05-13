<?php

use App\Http\Controllers\HouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- AKSES PUBLIK (Siapa saja bisa lihat) ---
Route::get('/', [HouseController::class, 'index'])->name('houses.index');
Route::get('/houses/{id}', [HouseController::class, 'show'])->name('houses.show');


// --- AKSES USER LOGIN (Wajib Login) ---
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Bawaan Breeze
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Fitur Sewa untuk Penyewa
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my');
    Route::post('/bookings/{id}/upload', [BookingController::class, 'uploadPayment'])->name('bookings.upload');

    // --- AKSES ADMIN (Manajemen Katalog & Pesanan) ---
    // Manajemen Rumah
    Route::get('/admin/houses/create', [HouseController::class, 'create'])->name('admin.houses.create');
    Route::post('/admin/houses', [HouseController::class, 'store'])->name('admin.houses.store');
    Route::delete('/admin/houses/{id}', [HouseController::class, 'destroy'])->name('admin.houses.destroy');

    // Manajemen Pesanan
    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::patch('/admin/bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');
    Route::delete('/admin/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    // Fitur Profile User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
