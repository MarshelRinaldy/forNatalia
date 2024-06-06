<?php

namespace App\Http\Controllers;
use App\Models\User;

use Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth; 

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }



    public function index_admin(){
        return view('admin.dashboardAdmin');
    }

    public function check(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Auth::attempt($credentials)) {

        // if ($user->role === 'customer' && $user->email_verified_at === null) {
        //     return redirect()->route('login')->with('error', 'Email belum diverifikasi');
        // }
            // dd($user->role);

        session(['role' => $user->role]);

        switch ($user->role) {

            case 'customer':
                return view('dashboard');
            case 'mo':
                return redirect()->route('dashboard_mo');
            case 'admin':
                return redirect()->route('index_admin');
            case 'owner':
                return redirect()->route('dashboard_owner');
            default:
                return redirect()->route('login')->with('error', 'Peran pengguna tidak valid');
        }
    }

        // dd($user);

    return redirect()->route('login')->with('error', 'Username atau Password Salah');
}


    public function actionLogout()
    {
        //untuk menghapus session yg aktif
        //setelah logout akan diarahkan kembali ke form login

        Auth::logout();
        return redirect('login');
    }
}