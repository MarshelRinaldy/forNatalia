<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'metode_pembayaran',
        'tanggal_pemesanan',
        'jumlah_pemesanan',
        'bukti_pembayaran',
        'status_pengantaran',
        'jenis_delivery',
        'jarak_delivery',
        'alamat_pengantaran',
        'biaya_ongkir',
        'total_harga',
        'status_pemesanan',
        'status_pembayaran',
        'image_bukti_pembayaran',
        'no_pemesanan',
    ];

    public function detailPemesanans()
    {
        return $this->hasMany(DetailPemesanan::class, 'pemesanan_id', 'id');
    }

    public function incomes()
    {
        return $this->hasMany(Income::class, 'pemesanan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

