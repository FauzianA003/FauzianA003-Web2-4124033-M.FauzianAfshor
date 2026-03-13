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

// --- 1. TIGA ROUTE STATIS (Closure dengan HTML yang lebih lengkap) ---

Route::get('/about', function () {
    return "
        <div style='font-family: sans-serif; padding: 20px;'>
            <h1>Tentang Kami</h1>
            <p>Ini adalah project tugas Laravel Minggu 2 yang dikembangkan oleh <strong>M. Fauzian Afshor</strong>.</p>
            <p>Project ini bertujuan untuk mempelajari dasar-dasar routing, controller, dan templating Blade di Laravel.</p>
            <hr>
            <a href='/profil'>Kembali ke Profil</a>
        </div>
    ";
})->name('statis.about');

Route::get('/kontak', function () {
    return "
        <div style='font-family: sans-serif; padding: 20px;'>
            <h1>Kontak Kami</h1>
            <p>Jika ada pertanyaan, silakan hubungi saya melalui:</p>
            <ul>
                <li>Email: 4124033@student.university.ac.id</li>
                <li>GitHub: <a href='https://github.com'>FauzianA003</a></li>
                <li>Instagram: @fauzian_afshor</li>
            </ul>
            <hr>
            <a href='/profil'>Kembali ke Profil</a>
        </div>
    ";
})->name('statis.kontak');

Route::get('/layanan', function () {
    return "
        <div style='font-family: sans-serif; padding: 20px;'>
            <h1>Layanan Project</h1>
            <p>Project Laravel ini menyediakan beberapa fitur utama:</p>
            <ol>
                <li>Manajemen Profil Mahasiswa</li>
                <li>Katalog Produk Dinamis</li>
                <li>Sistem Routing yang Terorganisir</li>
                <li>Integrasi dengan Blade Templating</li>
            </ol>
            <hr>
            <a href='/profil'>Kembali ke Profil</a>
        </div>
    ";
})->name('statis.layanan');


// 2 Route Dinamis (Controller)
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
Route::get('/profil/{nim}', [ProfilController::class, 'show'])->name('profil.show');

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');
Route::get('/katalog/{id}', [KatalogController::class, 'show'])->name('katalog.show');
