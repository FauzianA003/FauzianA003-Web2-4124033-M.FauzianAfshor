<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // Mengambil semua data peminjaman beserta relasi barang dan anggotanya
        $laporans = Peminjaman::with(['barang', 'anggota'])->orderBy('tgl_pinjam', 'desc')->get();

        return view('laporan.index', compact('laporans'));
    }
}
