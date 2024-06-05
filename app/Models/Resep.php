<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'namaKategori',
        'namaProduk',
        'namaBahan',
        'kuantitas',
        'deskripsi',
        'waktuMemasak',
    ];

}

