<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk mengakses informasi user yang sedang login
use App\Models\User; // Menggunakan model User untuk operasi database

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profil.edit', compact('user'));
    }

    public function edit()
    {   
        $user = Auth::user();
        return view('profil.edit', compact('user'));
    }

    public function update(Request $request)
{
    // Mendapatkan data user yang sedang login
    $user = Auth::user();
    $user->email_verified_at = now();
    $user->update($request->all());

    // Validasi data yang diterima dari form
    $request->validate([
        'username' => 'required|string|max:255',
        'noTelp' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        // Tambahkan validasi untuk data lainnya jika diperlukan
    ]);

    // Mengupdate data user
    $user->update([
        'username' => $request->username,
        'noTelp' => $request->noTelp,
        'alamat' => $request->alamat,
        // Tambahkan kolom lain yang ingin diupdate
    ]);

    // Redirect kembali dengan pesan sukses
    return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
}

public function store(Request $request)
{
    // Validasi data yang diterima dari form
    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'noTelp' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        // Tambahkan validasi untuk data lainnya jika diperlukan
    ]);

    // Mendapatkan data user yang sedang login
    $user = Auth::user();

    // Jika user belum memiliki profil, tambahkan data baru
    if (!$user->profil) {
        $user->profil()->create([
            'username' => $request->username,
            'email' => $request->email,
            'noTelp' => $request->noTelp,
            'alamat' => $request->alamat,
            // Tambahkan kolom lain yang ingin disimpan
        ]);
    } else {
        // Jika user sudah memiliki profil, lakukan pembaruan
        $user->profil->update([
            'username' => $request->username,
            'email' => $request->email, // Perbaiki 'email' di sini
            'noTelp' => $request->noTelp,
            'alamat' => $request->alamat,
            // Tambahkan kolom lain yang ingin diperbarui
        ]);
    }

    // Redirect kembali dengan pesan sukses
    return redirect()->route('profil.index')->with('success', 'Profil berhasil disimpan.');
}


    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }
        return view('profil.show', compact('user'));
    }
}
