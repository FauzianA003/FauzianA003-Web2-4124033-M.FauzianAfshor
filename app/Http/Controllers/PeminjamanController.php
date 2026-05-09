<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\Anggota;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['barang', 'anggota'])->get();
        $barangs = Barang::where('stok', '>', 0)->get();
        $anggotas = Anggota::all();

        return view('peminjaman.index', compact('peminjamans', 'barangs', 'anggotas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'anggota_id' => 'required',
            'tgl_pinjam' => 'required|date',
        ]);

        Peminjaman::create([
            'barang_id' => $request->barang_id,
            'anggota_id' => $request->anggota_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'status' => 'Dipinjam',
        ]);

        $barang = Barang::find($request->barang_id);
        $barang->decrement('stok');

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dicatat!');
    }

    public function kembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status' => 'Kembali',
            'tgl_kembali' => now()
        ]);

        $barang = Barang::find($peminjaman->barang_id);
        $barang->increment('stok');

        return redirect()->route('peminjaman.index')->with('success', 'Barang berhasil dikembalikan!');
    }

    // --- TAMBAHKAN KODE HAPUS DI SINI ---
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Jika transaksi yang dihapus masih 'Dipinjam', kembalikan stoknya dulu
        if ($peminjaman->status == 'Dipinjam') {
            $barang = Barang::find($peminjaman->barang_id);
            if ($barang) {
                $barang->increment('stok');
            }
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data transaksi berhasil dihapus!');
    }
}
