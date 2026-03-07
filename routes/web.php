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
Route::get('/fauzan-hakiki', function () { return 'Halo Fauzan!'; });
