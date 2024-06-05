<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResepController extends Controller
{
    public function index()
    {
        $resep = Resep::all();
        return view('resep.index', compact('resep'));
    }

    public function create(Request $request)
    {
        return view('resep.create');
    }

    public function store(Request $request)
    {
        // Validasi Formulir
        $validator = Validator::make($request->all(), [
            'namaKategori' => 'required',
            'namaProduk' => 'required',
            'namaBahan' => 'required|array', 
            'namaBahan.*' => 'required|string', 
            'kuantitas' => 'required|array', 
            'kuantitas.*' => 'required|string', 
            'deskripsi' => 'required',
            'waktuMemasak' => 'required',
        ], [
            'namaKategori.required' => 'Nama Kategori tidak boleh kosong!',
            'namaProduk.required' => 'Nama Produk tidak boleh kosong!',
            'namaBahan.required' => 'Nama Bahan tidak boleh kosong!',
            'kuantitas.required' => 'Kuantitas tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
            'waktuMemasak.required' => 'Waktu Memasak tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $resep = new Resep();
        $resep->namaKategori = $request->namaKategori;
        $resep->namaProduk = $request->namaProduk;
        $resep->namaBahan = implode(',', $request->namaBahan); 
        $resep->kuantitas = implode(',', $request->kuantitas); 
        $resep->deskripsi = $request->deskripsi;
        $resep->waktuMemasak = $request->waktuMemasak;
        $resep->save();

        return redirect()->route('resep.index');
    }


    public function edit($id)
    {
        $resep = Resep::find($id);
        $kategoriOptions = ['Cake', 'Roti', 'Minuman', 'Titipan', 'Hampers']; 
        $produkOptions = ['Lapis Legit', 'Lapis Surabaya', 'Brownies', 'Mandarin', 'Spikoe', 'Roti Sosis', 'MilkBun', 'Roti Keju', 'Choco Creamy Latte', 'Matcha Creamy Latte', 'Keripik Kentang 250gr', 'Kopi Luwak Bubuk 250gr', 'Matcha Organik Bubuk 100gr', 'Chocolate Bar 100gr', 'Paket A', 'Paket B', 'Paket C']; // Contoh data produk
        $bahanOptions = ['Butter', 'Creamer', 'Telur', 'Gula pasir', 'Susu bubuk', 'Tepung terigu', 'Garam', 'Coklat bubuk', 'Selai strawberry', 'Coklat batang', 'Minyak goreng', 'Tepung maizena', 'Baking powder', 'Kacang kenari', 'Ragi', 'Kuning telur', 'Susu cair', 'Sosis blackpapper', 'Whipped cream', 'Susu full cream', 'Keju mozzarella', 'Matcha bubuk']; // Contoh data bahan

        return view('resep.edit', compact('resep', 'kategoriOptions', 'produkOptions', 'bahanOptions'));
    }


    public function update(Request $request, $id)
    {
        $resep = Resep::find($id);
        $validator = Validator::make($request->all(), [
            'namaKategori' => 'required',
            'namaProduk' => 'required',
            'namaBahan' => 'required|array', 
            'namaBahan.*' => 'required|string',
            'kuantitas' => 'required|array', 
            'kuantitas.*' => 'required|string',
            'deskripsi' => 'required',
            'waktuMemasak' => 'required',
        ], [
            'namaKategori.required' => 'Nama Kategori tidak boleh kosong!',
            'namaProduk.required' => 'Nama Produk tidak boleh kosong!',
            'namaBahan.required' => 'Nama Bahan tidak boleh kosong!',
            'kuantitas.required' => 'Kuantitas tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
            'waktuMemasak.required' => 'Waktu Memasak tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $namaBahan = implode(',', $request->namaBahan);

        $kuantitas = implode(',', $request->kuantitas);

        $resep->update([
            'namaKategori' => $request->namaKategori,
            'namaProduk' => $request->namaProduk,
            'namaBahan' => $namaBahan,
            'kuantitas' => $kuantitas,
            'deskripsi' => $request->deskripsi,
            'waktuMemasak' => $request->waktuMemasak
        ]);

        return redirect()->route('resep.index');
    }


    public function destroy($id)
    {
        $resep = Resep::find($id);
        $resep->delete();

        return redirect()->route('resep.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
