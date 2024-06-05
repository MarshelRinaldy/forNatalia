<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->string('metode_pembayaran');
            $table->date('tanggal_pemesanan');
            $table->integer('jumlah_pemesanan');
            $table->string('bukti_pembayaran');
            $table->string('status_pengantaran'); 
            $table->string('jenis_delivery')->nullable(); 
            $table->float('jarak_delivery')->default(0); 
            $table->string('alamat_pengantaran')->nullable();
            $table->integer('biaya_ongkir')->default(0); 
            $table->integer('total_harga'); 
            $table->string('status_pemesanan')->nullable(); 
            $table->string('status_pembayaran')->default('belum dibayar'); 
            $table->string('image_bukti_pembayaran')->nullable();
            $table->string('no_pemesanan')->unique(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
