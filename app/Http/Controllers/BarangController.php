<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // 1. Tampilkan Daftar Barang
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    // 2. Simpan Barang Baru ke Database
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:100|unique:barangs',
            'stok' => 'required|numeric',
            'kondisi' => 'nullable|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['kondisi'] = $request->kondisi ?? 'Baik';

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar');
            $nama_gambar = time() . '_' . $data['gambar']->getClientOriginalName();
            $data['gambar']->storeAs('barang_images', $nama_gambar, 'public');
            $data['gambar'] = $nama_gambar;
        }

        Barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    // 3. Tampilkan Halaman Edit Barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    // 4. Simpan Perubahan Data (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:100|unique:barangs,kode_barang,'.$id,
            'stok' => 'required|numeric',
            'kondisi' => 'nullable|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang = Barang::findOrFail($id);
        $data = $request->all();
        $data['kondisi'] = $request->kondisi ?? 'Baik';

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barang_images', 'public');
        }

        $barang->update($data);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    // 5. Hapus Data Barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
