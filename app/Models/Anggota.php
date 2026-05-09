<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'nomor_induk',
        'kontak',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
