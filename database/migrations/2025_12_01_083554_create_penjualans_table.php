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
        // Soal No 2a: Membuat struktur tabel untuk menyimpan data penjualan
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');       // Menyimpan "Produk A", dll
            $table->date('tanggal_penjualan');   // Untuk fitur filter tanggal & grafik tren
            $table->integer('jumlah');           // Jumlah item terjual
            $table->decimal('harga', 15, 2);     // Harga satuan (Decimal lebih akurat untuk uang)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};