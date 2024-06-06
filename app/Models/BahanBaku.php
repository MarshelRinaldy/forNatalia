<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;

    protected $table = 'bahan_baku';

    protected $fillable = ['nama', 'stok', 'satuan', 'harga', 'totalPemakaian'];


//      public function resep()
//     {
//         return $this->hasMany(Resep::class);
//     }

//       public function products()
//     {
//         return $this->belongsToMany(BahanBaku::class, 'reseps', 'produk_id', 'bahan_baku_id',)
//             ->using(Resep::class)
//             ->withPivot('jumlah')
//             ->withTimestamps();
//     }
}
