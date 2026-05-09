<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman; // Wajib import model Peminjaman
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        // Mengambil data peminjaman yang statusnya sudah 'Kembali'
        $pengembalians = Peminjaman::with(['barang', 'anggota'])
            ->where('status', 'Kembali')
            ->get();

        // Mengarahkan ke file view pengembalian/index.blade.php
        return view('pengembalian.index', compact('pengembalians'));
    }

    // Fungsi lainnya bisa dibiarkan kosong jika tidak digunakan
}
