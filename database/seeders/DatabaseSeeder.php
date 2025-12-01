<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tambahkan baris ini agar PenjualanSeeder otomatis dipanggil
        $this->call([
            PenjualanSeeder::class,
        ]);
    }
}