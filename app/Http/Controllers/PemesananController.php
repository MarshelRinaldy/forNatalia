<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

use Carbon\Carbon;

class PemesananController extends Controller
{
    // Metode untuk menampilkan daftar pemesanan
    public function index()
    {
        $pemesanans = Pemesanan::with('user')->get();

        return view('history', compact('pemesanans'));
    }

    public function tampilkan_pesanan_diproses(){
        $pemesanans = Pemesanan::where('status_pemesanan', 'diproses')->get();
        return view('admin.pesananDiproses', compact('pemesanans'));
    }

    public function confirm_pesanan_diproses($id){
        
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->status_pemesanan = 'siap dipickup';
        $pemesanan->save();

        return redirect()->route('tampilkan_pesanan_diproses')->with('success', 'Pesanan siap dipick up atau diantar');
    }

    public function tampilkan_pesanan_sudah_dipickup(){
        $pemesanans = Pemesanan::where('status_pemesanan', 'siap dipickup')->get();
        return view('admin.pesananSiapDipickup', compact('pemesanans'));
    }

    public function confirm_pesanan_sudah_dipickup($id){
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->status_pemesanan = 'sudah dipickup';
        $pemesanan->save();

        return redirect()->route('tampilkan_pesanan_sudah_dipickup')->with('success', 'Pesanan sudah dipick up atau sudah tiba diantar');
    }

    public function tampilkan_pesanan_telat_pembayaran(){

    $now = Carbon::now();
    
    $pemesanans = Pemesanan::where('status_pemesanan', 'pembayaran')
                            ->where('created_at', '<', $now->subDay())
                            ->get();


    return view('admin.pesananTelatPembayaran', compact('pemesanans'));
    }

   public function batalkan($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        // Pastikan kita mendapatkan detail pemesanan sebagai collection
        $detailPemesanans = $pemesanan->detailPemesanans;
        // dd($detailPemesanans);
        if ($detailPemesanans) {
            foreach ($detailPemesanans as $detail) {
                $produk = $detail->produk;
                $produk->stok += $detail->jumlah_produk;
                $produk->save();
            }
        }

        $pemesanan->status_pemesanan = 'batal';
        $pemesanan->save();

        return redirect()->route('tampilkan_pesanan_telat_pembayaran')->with('success', 'Pesanan Berhasil Dibatalkan');
    }

}
