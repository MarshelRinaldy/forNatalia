<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Pemesanan;
// use App\Models\Jarak;

// class JarakController extends Controller
// {
//     public function index()
//     {
//         // Ambil semua data pemesanan beserta relasi jarak dan user
//         $pemesanans = Pemesanan::with('user', 'jarak')->get();

//         // Kirim data pemesanans ke view 'jarak.index'
//         return view('jarak.index', compact('pemesanans'));
//     }

//     public function create(Request $request)
//     {
//         // Ambil id_pemesanan dan id_user dari request
//         $id_pemesanan = $request->input('id_pemesanan');
//         $id_user = $request->input('id_user');

//         // Kirim id_pemesanan dan id_user ke view 'jarak.create'
//         return view('jarak.create', compact('id_pemesanan', 'id_user'));
//     }

//     public function store(Request $request)
//     {
//         // Validasi data
//         $request->validate([
//             'id_pemesanan' => 'required|exists:pemesanans,id', 
//             'id_user' => 'required|exists:users,id', 
//             'jarak' => 'required|numeric|min:0',
//             'totalBiaya' => 'required|numeric|min:0',
//             'ongkir' => 'required|numeric|min:0',
//         ]);

//         // Simpan data ke dalam tabel jarak
//         $jarak = Jarak::create([
//             'id_pemesanan' => $request->id_pemesanan,
//             'id_user' => $request->id_user,
//             'jarak' => $request->jarak,
//             'totalBiaya' => $request->totalBiaya,
//             'ongkir' => $request->ongkir,
//         ]);

//         // Redirect ke halaman index dengan pesan sukses
//         return redirect()->route('jarak.index')->with('success', 'Jarak berhasil disimpan.');
//     }
// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Jarak;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JarakController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with('user', 'jarak')->get();
        return view('jarak.index', compact('pemesanans'));
    }

    public function create(Request $request)
    {
        $id_pemesanan = $request->input('id_pemesanan');
      
        return view('jarak.create', compact('id_pemesanan'));
    }

    public function store(Request $request)
    {
        // $jarak = $request->all();
        // dd($jarak);
        $user = Auth::user();

        
 
        $storedData = $request->all();

        $validate = Validator::make($storedData, [
            'id_pemesanan' => 'required',
            'jarak' => 'required|numeric|min:0',
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

        
        if ($storedData['jarak'] <= 5) {
            $storedData['ongkir'] = 10000;
        } elseif ($storedData['jarak'] > 5 && $storedData['jarak'] <= 10) {
            $storedData['ongkir'] = 15000;
        } elseif ($storedData['jarak'] > 10 && $storedData['jarak'] <= 15) {
            $storedData['ongkir'] = 20000;
        } elseif ($storedData['jarak'] > 15) {
            $storedData['ongkir'] = 25000;
        }

        $ongkir = $storedData['ongkir'];

        $storedData['totalBiaya'] = $transaksi->hargaPesanan + $ongkir;
        
        Jarak::create([
            'id_pemesanan' => $request->id_pemesanan,
            'id_user' => $user->id_user,
            'jarak' => $storedData['jarak'],
            'totalBiaya' => $storedData['totalBiaya'],
            'ongkir' => $storedData['ongkir'],
        ]);

        return redirect()->route('jarak.index')->with('success', 'Jarak berhasil disimpan.');
    }
}
