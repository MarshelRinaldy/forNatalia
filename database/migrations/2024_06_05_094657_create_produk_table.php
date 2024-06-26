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
        //
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga');
            $table->integer('stok')->default(0);
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
            $table->date('tanggal_kadaluarsa');
            $table->text('deskripsi');
            $table->string('image');
            $table->string('kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.  
     */
    public function down(): void
    {
        //
    }
};
