<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penjualan;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Perintah: php artisan db:seed --class=PenjualanSeeder
     */
    public function run(): void
    {
        // Soal No 2: Import data penjualan spesifik sesuai tabel di soal
        $data = [
            // No 1: Produk A
            ['nama_produk' => 'Produk A', 'tanggal_penjualan' => '2025-01-01', 'jumlah' => 2, 'harga' => 50000],
            // No 2: Produk B
            ['nama_produk' => 'Produk B', 'tanggal_penjualan' => '2025-01-02', 'jumlah' => 1, 'harga' => 75000],
            // No 3: Produk C
            ['nama_produk' => 'Produk C', 'tanggal_penjualan' => '2025-01-03', 'jumlah' => 2, 'harga' => 60000],
            // No 4: Produk D (Tanggal sama dengan B, penting untuk tes grouping chart)
            ['nama_produk' => 'Produk D', 'tanggal_penjualan' => '2025-01-02', 'jumlah' => 2, 'harga' => 61000],
            // No 5: Produk E
            ['nama_produk' => 'Produk E', 'tanggal_penjualan' => '2025-01-04', 'jumlah' => 1, 'harga' => 25000],
        ];

        foreach ($data as $item) {
            Penjualan::create($item);
        }
    }
}