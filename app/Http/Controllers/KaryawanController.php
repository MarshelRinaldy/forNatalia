<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::latest()->paginate(5);
        return view('karyawan.index', compact('karyawan'));
    }

    public function create(Request $request)
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        // Validasi Formulir
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'id_karyawan' => 'required',
            'email' => 'required',
            'noTelp' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            
        ], [
            'nama.required' => 'x Nama Tidak boleh kosong!',
            'id_karyawan' => 'ID Tidak Boleh Kosong!',
            'email.required' => 'x Email Tidak boleh kosong!',
            'noTelp.required' => 'Phone Tidak boleh kosong!',
            'jabatan.required' => 'Quantity Tidak boleh kosong!',
            'username.required' => 'x Username Tidak Boleh kosong!',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Fungsi Simpan Data ke dalam Database
        Karyawan::create([
            'nama' => $request->nama,
            'id_karyawan' => $request->id_karyawan,
            'email' => $request->email,
            'noTelp' => $request->noTelp,
            'jabatan' => $request->jabatan,
            'username' => $request->username,
            
        ]);

        return redirect()->route('karyawan.index');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'id_karyawan' => 'required',
            'email' => 'required',
            'noTelp' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
        ], [
            'nama.required' => 'x Nama Tidak boleh kosong!',
            'id_karyawan' => 'ID Tidak Boleh Kosong!',
            'email.required' => 'x Email Tidak boleh kosong!',
            'noTelp.required' => 'Phone Tidak boleh kosong!',
            'jabatan.required' => 'Quantity Tidak boleh kosong!',
            'username.required' => 'x Username Tidak Boleh kosong!'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // Fungsi Simpan Data ke dalam Database
        $karyawan->update([
            'nama' => $request->nama,
            'id_karyawan' => $request->id_karyawan,
            'email' => $request->email,
            'noTelp' => $request->noTelp,
            'jabatan' => $request->jabatan,
            'username' => $request->username,
        ]);

        return redirect()->route('karyawan.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
