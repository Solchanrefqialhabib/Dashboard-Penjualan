<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // --- LOGIKA FILTER ---
        // Soal No 3: Fitur filter data berdasarkan rentang tanggal
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Memulai Query Builder
        $query = Penjualan::query();

        // Terapkan Filter HANYA JIKA user mengisi kedua tanggal
        if ($startDate && $endDate) {
            $query->whereBetween('tanggal_penjualan', [$startDate, $endDate]);
        }

        // --- PENGAMBILAN DATA ---
        // Soal No 3: Tabel menampilkan data (diurutkan biar rapi)
        $sales = $query->orderBy('tanggal_penjualan', 'desc')->get();

        // --- PERHITUNGAN TOTAL ---
        // Soal No 3: Total penjualan (jumlah * harga) ditampilkan diatas tabel
        $totalPendapatan = $sales->sum(function ($sale) {
            return $sale->jumlah * $sale->harga;
        });

        $totalItemTerjual = $sales->sum('jumlah');

        // --- PERSIAPAN GRAFIK ---
        // Soal No 3: Grafik visualisasi data tren penjualan
        // Kita perlu menggabungkan (Group) transaksi yang terjadi di tanggal yang sama
        $chartData = $sales->groupBy('tanggal_penjualan')
            ->map(function ($row) {
                // Menjumlahkan total uang per tanggal
                return $row->sum(function ($item) {
                    return $item->jumlah * $item->harga;
                });
            })
            ->sortKeys(); // Urutkan tanggal dari lama ke baru untuk grafik (sumbu X)

        // Kirim semua variabel ke View
        return view('dashboard', [
            'sales' => $sales,
            'totalPendapatan' => $totalPendapatan,
            'totalItemTerjual' => $totalItemTerjual,
            'chartLabels' => $chartData->keys(),   // Sumbu X: Tanggal
            'chartValues' => $chartData->values(), // Sumbu Y: Total Rupiah
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }
}