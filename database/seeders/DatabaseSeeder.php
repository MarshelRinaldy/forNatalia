<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeding users
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'email' => 'admin1@gmail.com',
                'noTelp' => '1234567890',
                'alamat' => 'Admin Address',
                'role' => 'admin',
                'verify_key' => Str::random(32),
                'email_verified_at' => now(),
                'active' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'customer1',
                'password' => Hash::make('customer123'),
                'email' => 'customer1@gmail.com',
                'noTelp' => '0987654321',
                'alamat' => 'Customer Address 1',
                'role' => 'customer',
                'verify_key' => Str::random(32),
                'email_verified_at' => now(),
                'active' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'customer2',
                'password' => Hash::make('customer123'),
                'email' => 'customer2@gmail.com',
                'noTelp' => '1122334455',
                'alamat' => 'Customer Address 2',
                'role' => 'customer',
                'verify_key' => Str::random(32),
                'email_verified_at' => now(),
                'active' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeding produk
        $produk1 = DB::table('produk')->insertGetId([
            'nama' => 'Produk 1',
            'harga' => 50000,
            'stok' => 50,
            'status' => 'available',
            'keterangan' => 'Keterangan produk 1',
            'tanggal_kadaluarsa' => now()->addMonths(6),
            'deskripsi' => 'Deskripsi produk 1',
            'image' => 'image1.jpg',
            'kategori' => 'Kategori 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $produk2 = DB::table('produk')->insertGetId([
            'nama' => 'Produk 2',
            'harga' => 75000,
            'stok' => 30,
            'status' => 'available',
            'keterangan' => 'Keterangan produk 2',
            'tanggal_kadaluarsa' => now()->addMonths(12),
            'deskripsi' => 'Deskripsi produk 2',
            'image' => 'image2.jpg',
            'kategori' => 'Kategori 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seeding pemesanan
        $pemesanan1 = DB::table('pemesanans')->insertGetId([
        'user_id' => 2, 
        'metode_pembayaran' => 'transfer',
        'tanggal_pemesanan' => now()->subDays(10), 
        'jumlah_pemesanan' => 250000,
        'bukti_pembayaran' => 'bukti1.jpg',
        'status_pengantaran' => 'delivery',
        'jenis_delivery' => 'delivery type 1',
        'jarak_delivery' => 10,
        'alamat_pengantaran' => 'Alamat pengantaran 1',
        'biaya_ongkir' => 5000,
        'total_harga' => 255000, 
        'status_pemesanan' => 'diproses',
        'status_pembayaran' => 'belum bayar',
        'image_bukti_pembayaran' => 'bukti1.jpg',
        'no_pemesanan' => 'TRX00001',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $pemesanan2 = DB::table('pemesanans')->insertGetId([
        'user_id' => 2, 
        'metode_pembayaran' => 'transfer',
        'tanggal_pemesanan' => now()->subDays(5), 
        'jumlah_pemesanan' => 100000, 
        'bukti_pembayaran' => 'bukti2.jpg',
        'status_pengantaran' => 'ambil sendiri',
        'jenis_delivery' => 'delivery type 2',
        'jarak_delivery' => 20, 
        'alamat_pengantaran' => 'Alamat pengantaran 2',
        'biaya_ongkir' => 0,
        'total_harga' => 100000, 
        'status_pemesanan' => 'diproses',
        'status_pembayaran' => 'belum bayar',
        'image_bukti_pembayaran' => 'bukti2.jpg',
        'no_pemesanan' => 'TRX00002',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
        
        $detailPemesanan1 = DB::table('detail_pemesanan')->insertGetId([
            'pemesanan_id' => $pemesanan1,
            'produk_id' => $produk1,
            'jumlah_produk' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $detailPemesanan2 = DB::table('detail_pemesanan')->insertGetId([
            'pemesanan_id' => $pemesanan1,
            'produk_id' => $produk2,
            'jumlah_produk' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $detailPemesanan3 = DB::table('detail_pemesanan')->insertGetId([
            'pemesanan_id' => $pemesanan2,
            'produk_id' => $produk2,
            'jumlah_produk' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
     
        $jumlahPemesanan1 = 2 * 50000 + 1 * 75000;
        $totalHarga1 = $jumlahPemesanan1 + 5000; 

        DB::table('pemesanans')->where('id', $pemesanan1)->update([
            'jumlah_pemesanan' => 3,
            'total_harga' => $totalHarga1,
            'updated_at' => now(),
        ]);

        $jumlahPemesanan2 = 3 * 75000; 
        $totalHarga2 = $jumlahPemesanan2 + 7000; 

        DB::table('pemesanans')->where('id', $pemesanan2)->update([
            'jumlah_pemesanan' => 3,
            'total_harga' => $totalHarga2,
            'updated_at' => now(),
        ]);
    }
}
