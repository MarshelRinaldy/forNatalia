<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;

     protected $table = 'detail_pemesanan';

    protected $fillable = [
        'pemesanan_id',
        'produk_id',
        'jumlah_produk',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
