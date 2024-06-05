<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\JarakController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::resource('/karyawan', KaryawanController::class);

Route::get('/jarak', [JarakController::class, 'index'])->name('jarak.index');
Route::get('/jarak/create', [JarakController::class, 'create'])->name('jarak.create');
Route::post('/jarak/store', [JarakController::class, 'store'])->name('jarak.store');

Route::get('/konfirmasi', [KonfirmasiController::class, 'index'])->name('konfirmasi.index');
Route::get('/konfirmasi/create', [KonfirmasiController::class, 'create'])->name('konfirmasi.create');
Route::post('/konfirmasi/store', [KonfirmasiController::class, 'store'])->name('konfirmasi.store');

Route::resource('gaji', GajiController::class);
Route::resource('gaji', GajiController::class)->only(['index', 'store', 'create', 'destroy', 'update', 'show']);
Route::delete('/gaji/{id}', [GajiController::class, 'destroy'])->name('gaji.destroy');

Route::resource('karyawan', KaryawanController::class)->only(['index', 'store', 'create', 'destroy', 'update', 'show']);
Route::resource('/resep', ResepController::class);
Route::resource('resep', ResepController::class)->only(['index', 'store', 'create', 'destroy', 'update', 'show']);

//Login
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::get('/index_admin', [LoginController::class,'index_admin'])->name('index_admin');
// Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

//UNTUK LOGIN TERBARU
Route::post('/check', [LoginController::class, 'check'])->name('check');
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionRegister'])->name('actionRegister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

Route::get('/change-password', [RegisterController::class, 'pass'])->name('change-password');
Route::post('/change-password', [RegisterController::class, 'changePassword'])->name('change-password');

Route::get('logout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');
Route::resource('/history', PemesananController::class)->middleware('auth');

Route::get('/profil', [ProfilController::class, 'index'])->middleware('auth');
Route::resource('profil', ProfilController::class)->only(['index', 'store', 'create', 'destroy', 'update', 'show']);

Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit')->middleware('auth');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index')->middleware('auth');
Route::put('/profil/update', [ProfilController::class, 'update'])->name('profil.update')->middleware('auth');
Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update')->middleware('auth');
Route::put('/gaji/{id}', 'GajiController@update')->name('gaji.update');

Route::get('/change-password', [RegisterController::class, 'showChangePasswordForm'])->name('change-password-view');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');

//tambahan
Route::get('/tampilan_alur_pemesanan_customer', [CustomerController::class, 'tampilan_alur_pemesanan_customer'])->name('tampilan_alur_pemesanan_customer');
Route::get('/tampilkan_pesanan_diproses', [PemesananController::class, 'tampilkan_pesanan_diproses'])->name('tampilkan_pesanan_diproses');
Route::get('/tampilkan_pesanan_sudah_dipickup', [PemesananController::class, 'tampilkan_pesanan_sudah_dipickup'])->name('tampilkan_pesanan_sudah_dipickup');
Route::get('/tampilkan_pesanan_telat_pembayaran', [PemesananController::class, 'tampilkan_pesanan_telat_pembayaran'])->name('tampilkan_pesanan_telat_pembayaran');

Route::patch('/batalkan/{id}', [PemesananController::class, 'batalkan'])->name('batalkan');
Route::patch('/confirm_pesanan_diproses/{id}', [PemesananController::class, 'confirm_pesanan_diproses'])->name('confirm_pesanan_diproses');
Route::patch('/confirm_pesanan_sudah_dipickup/{id}', [PemesananController::class, 'confirm_pesanan_sudah_dipickup'])->name('confirm_pesanan_sudah_dipickup');
Route::patch('/barang_sudah_diterima/{id}', [CustomerController::class, 'barang_sudah_diterima'])->name('barang_sudah_diterima');