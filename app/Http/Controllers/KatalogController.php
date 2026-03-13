<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class KatalogController extends Controller {
    public function index() {
        $produk = [
            ['id' => 1, 'nama' => 'Laptop Gaming', 'harga' => 'Rp 15.000.000'],
            ['id' => 2, 'nama' => 'Mouse Wireless', 'harga' => 'Rp 250.000'],
            ['id' => 3, 'nama' => 'Keyboard Mechanical', 'harga' => 'Rp 800.000'],
            ['id' => 4, 'nama' => 'Monitor 24 Inch', 'harga' => 'Rp 2.000.000'],
            ['id' => 5, 'nama' => 'Headset RGB', 'harga' => 'Rp 500.000'],
        ];
        return view('katalog.index', compact('produk'));
    }
    public function show($id) {
        return "Menampilkan Detail Produk dengan ID: " . $id;
    }
}
