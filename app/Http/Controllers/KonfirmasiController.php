<?php

namespace App\Http\Controllers;

use App\Models\Konfirmasi;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KonfirmasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanans = Pemesanan::with('user', 'jarak')->get();
        return view('konfirmasi.index', compact('pemesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id_pemesanan = $request->input('id_pemesanan');
      
        return view('konfirmasi.create', compact('id_pemesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $today = Carbon::now();
 
        $storedData = $request->all();

        $validate = Validator::make($storedData, [
            'id_pemesanan' => 'required',
            'pembayaran' => 'required|numeric|min:0',
        ]);

        $id_pesan = $storedData['id_pemesanan'];

        $transaksi = Pemesanan::find($id_pesan);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()]);
        }

        // $request->validate([
        //     'id_pemesanan' => 'required|exists:pemesanans,id',
          
        //     'jarak' => 'required|numeric|min:0',
        //     // 'totalBiaya' => 'required|numeric|min:0',
        //     // 'ongkir' => 'required|numeric|min:0',
        // ]);

        
        $storedData['tanggal_lunas'] = $today;

        if ($storedData['pembayaran'] > $transaksi->jarak->totalBiaya) {
            $storedData['tip'] = $storedData['pembayaran'] - $transaksi->jarak->totalBiaya;
        } else {
            $storedData['tip'] = 0;
        }
        
        
        Konfirmasi::create([
            'id_pemesanan' => $request->id_pemesanan,
            'tanggal_lunas' => $storedData['tanggal_lunas'],
            'pembayaran' => $storedData['pembayaran'],
            'tip' => $storedData['tip']
        ]);

        return redirect()->route('konfirmasi.index')->with('success', 'Konfirmasi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Konfirmasi $konfirmasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konfirmasi $konfirmasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konfirmasi $konfirmasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konfirmasi $konfirmasi)
    {
        //
    }
}
