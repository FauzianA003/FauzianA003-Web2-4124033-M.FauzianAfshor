<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/perkenalan', function () {

    return '<h1>Halo! Nama saya M. Fauzian Afshor</h1>

            <p>NIM: 4124033 | Prodi: Sistem Informasi</p>

            <p>Saya siap belajar Laravel! 🚀</p>';

});

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KatalogController;

// Route Utama (Redirect ke profil)
Route::get('/', function () { return redirect()->route('profil.index'); });

// 3 Route Statis
Route::get('/about', function () { return "<h1>Tentang Kami</h1><p>Halaman Statis About</p>"; })->name('statis.about');
Route::get('/kontak', function () { return "<h1>Kontak</h1><p>Halaman Statis Kontak</p>"; })->name('statis.kontak');
Route::get('/layanan', function () { return "<h1>Layanan</h1><p>Halaman Statis Layanan</p>"; })->name('statis.layanan');

// 2 Route Dinamis (Controller)
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
Route::get('/profil/{nim}', [ProfilController::class, 'show'])->name('profil.show');

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');
Route::get('/katalog/{id}', [KatalogController::class, 'show'])->name('katalog.show');
