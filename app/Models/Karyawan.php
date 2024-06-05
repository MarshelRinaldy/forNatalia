<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'nama',
        'id_karyawan',
        'email',
        'noTelp',
        'jabatan',
        'username',
        
    ];

    public function gaji()
    {
        return $this->hasMany(Gaji::class, 'karyawan_id', 'id');    
    }


}
