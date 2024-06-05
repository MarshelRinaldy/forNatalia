<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function tampilan_alur_pemesanan_customer(){
        $user = Auth::user();
        $pemesanans = Pemesanan::where('user_id', $user->id)
            ->with('detailPemesanans.produk') 
            ->get();

        return view('customer.alurPemesananCustomer', compact('pemesanans'));
    }

    public function barang_sudah_diterima($id){
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->status_pemesanan = 'selesai';
        $pemesanan->save();

        return view('dashboard')->with('success', 'Pesanan Selesai');
    }
}
