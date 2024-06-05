<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jarak extends Model
{
    protected $table = 'jaraks'; //tambahkan ini
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pemesanan',
        'id_user',
        'jarak',
        'totalBiaya',
        'ongkir',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

        
}
