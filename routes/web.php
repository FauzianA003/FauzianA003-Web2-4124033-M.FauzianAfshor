<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard dengan statistik
Route::get('/dashboard', function () {
    $totalBarang = \App\Models\Barang::count();
    $totalAnggota = \App\Models\Anggota::count();
    // Gunakan nama variabel $totalPinjam agar sesuai dengan file blade
    $totalPinjam = \App\Models\Peminjaman::where('status', 'Dipinjam')->count();

    return view('dashboard', compact('totalBarang', 'totalAnggota', 'totalPinjam'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Master Data
    Route::resource('barang', BarangController::class);
    Route::resource('anggota', AnggotaController::class);

    // Transaksi Peminjaman & Pengembalian
    Route::resource('peminjaman', PeminjamanController::class);
    Route::post('/peminjaman/{id}/kembali', [PeminjamanController::class, 'kembali'])->name('peminjaman.kembali');

    // Riwayat & Laporan
    Route::resource('pengembalian', PengembalianController::class);
    Route::resource('laporan', LaporanController::class);
});

require __DIR__.'/auth.php';
