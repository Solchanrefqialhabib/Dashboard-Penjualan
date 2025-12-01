<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan</title>
    <!-- Library CSS & JS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">

    <div class="container mx-auto px-4 py-8">
        
        <!-- HEADER & FILTER SECTION -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 bg-white p-6 rounded-lg shadow-sm">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Dashboard Penjualan</h1>
                <p class="text-gray-500">Laporan Transaksi Harian</p>
            </div>
            
            <!-- Soal No 3: Form Filter Rentang Tanggal -->
            <form action="{{ route('dashboard') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-end mt-4 md:mt-0">
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Dari Tanggal</label>
                    <input type="date" name="start_date" value="{{ $startDate }}" class="border rounded p-2 text-sm w-full">
                </div>
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Sampai Tanggal</label>
                    <input type="date" name="end_date" value="{{ $endDate }}" class="border rounded p-2 text-sm w-full">
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Filter</button>
                    <a href="{{ route('dashboard') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">Reset</a>
                </div>
            </form>
        </div>

        <!-- SUMMARY CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Soal No 3: Menampilkan Total Penjualan -->
            <div class="bg-blue-600 p-6 rounded-lg shadow text-white">
                <h3 class="text-lg opacity-90">Total Pendapatan</h3>
                <p class="text-4xl font-bold mt-2">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow border border-gray-100">
                <h3 class="text-lg text-gray-600">Total Item Terjual</h3>
                <p class="text-4xl font-bold mt-2 text-gray-800">{{ $totalItemTerjual }} <span class="text-sm font-normal">Unit</span></p>
            </div>
        </div>

        <!-- CHART SECTION -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Soal No 3: Grafik Tren Penjualan -->
            <div class="bg-white p-6 rounded-lg shadow lg:col-span-1">
                <h2 class="text-xl font-bold text-gray-700 mb-4">Grafik Tren Penjualan</h2>
                <!-- Data dikirim lewat atribut data-labels dan data-values agar bersih dari error editor -->
                <canvas id="salesChart" 
                        data-labels="{{ json_encode($chartLabels) }}" 
                        data-values="{{ json_encode($chartValues) }}">
                </canvas>
            </div>

            <!-- TABLE SECTION -->
            <div class="bg-white p-6 rounded-lg shadow lg:col-span-2 overflow-x-auto">
                <h2 class="text-xl font-bold text-gray-700 mb-4">Rincian Data</h2>
                <!-- Soal No 3: Tabel Data Penjualan -->
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Tanggal</th>
                            <th class="py-3 px-6 text-left">Produk</th>
                            <th class="py-3 px-6 text-center">Jml</th>
                            <th class="py-3 px-6 text-right">Harga</th>
                            <th class="py-3 px-6 text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse($sales as $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $item->tanggal_penjualan }}</td>
                            <td class="py-3 px-6 text-left font-medium">{{ $item->nama_produk }}</td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-blue-100 text-blue-800 py-1 px-3 rounded-full text-xs">{{ $item->jumlah }}</span>
                            </td>
                            <td class="py-3 px-6 text-right">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="py-3 px-6 text-right font-bold text-gray-800">
                                Rp {{ number_format($item->jumlah * $item->harga, 0, ',', '.') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-gray-500">Data tidak ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SCRIPT CONFIG -->
    <script>
        // Mengambil data dari atribut HTML (Solusi Clean Code)
        const chartCanvas = document.getElementById('salesChart');
        const chartLabels = JSON.parse(chartCanvas.getAttribute('data-labels'));
        const chartValues = JSON.parse(chartCanvas.getAttribute('data-values'));

        const ctx = chartCanvas.getContext('2d');
        
        // Inisialisasi Chart.js
        const salesChart = new Chart(ctx, {
            type: 'bar', // Bisa diganti 'line' jika ingin grafik garis
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: chartValues,
                    backgroundColor: 'rgba(37, 99, 235, 0.7)', // Warna biru
                    borderColor: 'rgba(37, 99, 235, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            // Format mata uang Rupiah di sumbu Y
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(context.raw);
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>