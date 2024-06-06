<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerMoController extends Controller
{
    public function laporan_penjualan(){
        

        return view('mo.laporanPemasukan');
    }
}
