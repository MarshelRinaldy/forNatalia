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
                'email' => 'admin@gmail.com',
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
                'username' => 'marlina',
                'password' => Hash::make('customer123'),
                'email' => 'marlina@gmail.com',
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
                'username' => 'doni',
                'password' => Hash::make('customer123'),
                'email' => 'doni@gmail.com',
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
             [
                'username' => 'owner',
                'password' => Hash::make('owner123'),
                'email' => 'owner@gmail.com',
                'noTelp' => '0841241231',
                'alamat' => 'Owner Address 1',
                'role' => 'owner',
                'verify_key' => Str::random(32),
                'email_verified_at' => now(),
                'active' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'username' => 'mo',
                'password' => Hash::make('mo123'),
                'email' => 'mo1@gmail.com',
                'noTelp' => '084124123213121',
                'alamat' => 'Mo Address 1',
                'role' => 'mo',
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

     $pemesanan3 = DB::table('pemesanans')->insertGetId([
        'user_id' => 2, 
        'metode_pembayaran' => 'transfer',
        'tanggal_pemesanan' => now()->subDays(5), 
        'jumlah_pemesanan' => 115000, 
        'bukti_pembayaran' => 'bukti3.jpg',
        'status_pengantaran' => 'delivery',
        'jenis_delivery' => 'delivery type 3',
        'jarak_delivery' => 20, 
        'alamat_pengantaran' => 'Alamat pengantaran 2',
        'biaya_ongkir' => 15000,
        'total_harga' => 130000, 
        'status_pemesanan' => 'diproses',
        'status_pembayaran' => 'belum bayar',
        'image_bukti_pembayaran' => 'bukti2.jpg',
        'no_pemesanan' => 'TRX00003',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $pemesanan5= DB::table('pemesanans')->insertGetId([
        'user_id' => 2, 
        'metode_pembayaran' => 'transfer',
        'tanggal_pemesanan' => now()->subDays(5), 
        'jumlah_pemesanan' => 150000, 
        'bukti_pembayaran' => 'bukti5.jpg',
        'status_pengantaran' => 'delivery',
        'jenis_delivery' => 'delivery type 5',
        'jarak_delivery' => 20, 
        'alamat_pengantaran' => 'Alamat pengantaran 5',
        'biaya_ongkir' => 20000,
        'total_harga' => 170000, 
        'status_pemesanan' => 'pembayaran',
        'status_pembayaran' => 'belum bayar',
        'image_bukti_pembayaran' => 'bukti2.jpg',
        'no_pemesanan' => 'TRX00005',
        'created_at' => '2024-06-01 04:52:43',
        'updated_at' => now(),
    ]);

    $pemesanan4 = DB::table('pemesanans')->insertGetId([
        'user_id' => 3, 
        'metode_pembayaran' => 'transfer',
        'tanggal_pemesanan' => now()->subDays(5), 
        'jumlah_pemesanan' => 100000, 
        'bukti_pembayaran' => 'bukti2.jpg',
        'status_pengantaran' => 'ambil sendiri',
        'jenis_delivery' => 'delivery type 2',
        'jarak_delivery' => 20, 
        'alamat_pengantaran' => 'Alamat pengantaran 2',
        'biaya_ongkir' => 0,
        'total_harga' => 600000, 
        'status_pemesanan' => 'diproses',
        'status_pembayaran' => 'belum bayar',
        'image_bukti_pembayaran' => 'bukti2.jpg',
        'no_pemesanan' => 'TRX00004',
        'created_at' => now(),
        'updated_at' => now(),
    ]);


    $totalHarga1 =  255000; 

        DB::table('pemesanans')->where('id', $pemesanan1)->update([
            // 'jumlah_pemesanan' => 3,
            'total_harga' => $totalHarga1,
            'updated_at' => now(),
        ]);

       
        $totalHarga2 = 100000; 

        DB::table('pemesanans')->where('id', $pemesanan2)->update([
            // 'jumlah_pemesanan' => 3,
            'total_harga' => $totalHarga2,
            'updated_at' => now(),
        ]);


        $totalHarga2 = 130000; 

        DB::table('pemesanans')->where('id', $pemesanan3)->update([
            // 'jumlah_pemesanan' => 3,
            'total_harga' => $totalHarga2,
            'updated_at' => now(),
        ]);

        $totalHarga2 = 170000; 

        DB::table('pemesanans')->where('id', $pemesanan5)->update([
            // 'jumlah_pemesanan' => 3,
            'total_harga' => $totalHarga2,
            'updated_at' => now(),
        ]);


        $totalHarga2 = 600000; 

        DB::table('pemesanans')->where('id', $pemesanan4)->update([
            // 'jumlah_pemesanan' => 3,
            'total_harga' => $totalHarga2,
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

         $detailPemesanan4 = DB::table('detail_pemesanan')->insertGetId([
            'pemesanan_id' => $pemesanan3,
            'produk_id' => $produk1,
            'jumlah_produk' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         $detailPemesanan5 = DB::table('detail_pemesanan')->insertGetId([
            'pemesanan_id' => $pemesanan4,
            'produk_id' => $produk1,
            'jumlah_produk' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $detailPemesanan6 = DB::table('detail_pemesanan')->insertGetId([
            'pemesanan_id' => $pemesanan5,
            'produk_id' => $produk1,
            'jumlah_produk' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $detailPemesanan7 = DB::table('detail_pemesanan')->insertGetId([
            'pemesanan_id' => $pemesanan5,
            'produk_id' => $produk2,
            'jumlah_produk' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
     
       
        


        //BAHAN BAKU
        DB::table('bahan_baku')->insert([
            [
                'nama' => 'Gula',
                'stok' => 500,
                'satuan' => 'kg',
                'harga' => 12000,
                'totalPemakaian' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Tepung Terigu',
                'stok' => 1000,
                'satuan' => 'kg',
                'harga' => 10000,
                'totalPemakaian' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Susu Bubuk',
                'stok' => 200,
                'satuan' => 'kg',
                'harga' => 50000,
                'totalPemakaian' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kakao',
                'stok' => 150,
                'satuan' => 'kg',
                'harga' => 45000,
                'totalPemakaian' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Telur Ayam',
                'stok' => 300,
                'satuan' => 'pcs',
                'harga' => 2000,
                'totalPemakaian' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Butter',
                'stok' => 100,
                'satuan' => 'kg',
                'harga' => 80000,
                'totalPemakaian' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Keju',
                'stok' => 250,
                'satuan' => 'kg',
                'harga' => 75000,
                'totalPemakaian' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ragi',
                'stok' => 50,
                'satuan' => 'kg',
                'harga' => 25000,
                'totalPemakaian' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Vanila',
                'stok' => 75,
                'satuan' => 'kg',
                'harga' => 60000,
                'totalPemakaian' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Garam',
                'stok' => 500,
                'satuan' => 'kg',
                'harga' => 5000,
                'totalPemakaian' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
