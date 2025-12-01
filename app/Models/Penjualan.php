<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    // Menentukan kolom mana saja yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'nama_produk',
        'tanggal_penjualan',
        'jumlah',
        'harga'
    ];
    
    // Soal No 3: Fitur hitung total (Opsional, tapi bagus untuk rapihkan kode view)
    // Accessor ini mempermudah pemanggilan $item->total_harga di Blade
    public function getTotalHargaAttribute()
    {
        return $this->jumlah * $this->harga;
    }
}