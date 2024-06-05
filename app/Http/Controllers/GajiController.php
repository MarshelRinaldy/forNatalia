<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Gaji;

class GajiController extends Controller
{
    public function index()
    {
        $gaji = Gaji::latest()->paginate(5);
        $karyawan = Karyawan::all();
        return view('gaji.index', compact('gaji', 'karyawan'));
    }    

    public function create()
    {
        $karyawan = Karyawan::all();
        return view('gaji.create', compact('karyawan'));
    }

    public function edit($id)
{
    $gaji = Gaji::find($id);

    if (!$gaji) {
        return redirect()->back()->with('error', 'Data gaji tidak ditemukan.');
    }

    // Assuming you have a 'karyawan_id' field in your 'gaji' table
    $karyawan = Karyawan::find($gaji->karyawan_id);

    if (!$karyawan) {
        return redirect()->back()->with('error', 'Data karyawan tidak ditemukan.');
    }

    return view('gaji.edit', compact('gaji', 'karyawan'));
}


        public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required', 
            'gaji' => 'required|numeric',
            'bonus' => 'nullable|numeric',
        ]);

        $karyawan = Karyawan::find($request->nama_karyawan); 
        
        if (!$karyawan) {
            return redirect()->back()->with('error', 'Karyawan tidak ditemukan.');
        }

        $gaji = new Gaji();
        $gaji->karyawan_id = $karyawan->id; // Menggunakan id karyawan dari tabel Karyawan
        $gaji->gaji = $request->gaji;
        $gaji->bonus = $request->bonus;
        $gaji->save();

        // Redirect dengan pesan sukses
        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil disimpan.');
    }


    public function update(Request $request, $id)
{
    // Validasi input jika diperlukan
    $request->validate([
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'gaji' => 'required|numeric',
        'bonus' => 'required|numeric',
    ]);

    // Temukan data gaji berdasarkan ID
    $gaji = Gaji::findOrFail($id);

    // Perbarui data gaji dengan data yang diterima dari formulir
    $gaji->update([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'gaji' => $request->gaji,
        'bonus' => $request->bonus,
    ]);

    // Redirect pengguna ke halaman yang sesuai setelah penyimpanan berhasil
    return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil diperbarui.');
}






    public function destroy($id)
{
    $gaji = Gaji::find($id);

    if (!$gaji) {
        return redirect()->back()->with('error', 'Data gaji tidak ditemukan.');
    }

    $gaji->delete();

    return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil dihapus.');
}

}
