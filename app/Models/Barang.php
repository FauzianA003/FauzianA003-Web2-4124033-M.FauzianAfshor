<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Barang extends Model
{
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'stok',
        'kondisi',
        'gambar'
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
