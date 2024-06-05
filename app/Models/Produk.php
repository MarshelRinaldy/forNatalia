<?php

namespace App\Models;

use App\Models\Hampers;
use App\Models\DetailPemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    protected $table = 'produk';
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'status',
        'keterangan',
        'tanggal_kadaluarsa',
        'deskripsi',
        'image',
        'kategori',
    ];


    public function detailPemesanans()
    {
        return $this->hasMany(DetailPemesanan::class);
    }
}
