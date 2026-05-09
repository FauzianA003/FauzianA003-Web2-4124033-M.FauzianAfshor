<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';

    protected $fillable = [
        'barang_id',
        'anggota_id',
        'tgl_pinjam',
        'tgl_kembali',
        'status',
        'catatan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
