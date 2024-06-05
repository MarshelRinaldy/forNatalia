<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    use HasFactory;

    protected $table = 'konfirmasis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pemesanan',
        'pembayaran',
        'tip',
        'tanggal_lunas'
    ];

    public function pemesanan()
    {
        return $this->hasOne(Pemesanan::class, 'id_pemesanan');
    }
}
