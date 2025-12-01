📊 Laravel Sales Dashboard

Laravel Sales Dashboard adalah aplikasi dashboard sederhana untuk menampilkan laporan penjualan, grafik tren, dan tabel transaksi. Aplikasi ini dibuat sebagai bagian dari tes kandidat IT dan dapat digunakan sebagai template untuk sistem pelaporan penjualan.

📸 Screenshot

![Dashboard](https://raw.githubusercontent.com/solchanrefqi/dashboard-penjualan/main/public/images/image.png)

🔗 Live Demo:
https://dashboard-penjualan.onrender.com

✨ Fitur Utama
📌 Dashboard Overview

Total pendapatan

Total item terjual

📈 Grafik Tren Penjualan

Visualisasi pendapatan harian menggunakan Chart.js

📋 Tabel Data Penjualan

Daftar transaksi lengkap

Informasi harga satuan, kuantitas, dan total

🗓️ Filter Rentang Tanggal

Memfilter laporan berdasarkan tanggal mulai & akhir

🛠️ Teknologi yang Digunakan
Komponen	Teknologi
Backend	Laravel 10/11
Database	SQLite (default) / MySQL
Frontend	Blade Template, Tailwind CSS (CDN)
Grafik	Chart.js (CDN)
Deployment	Docker (Render.com)
🚀 Instalasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan aplikasi secara lokal.

📌 Prasyarat

Pastikan sudah terinstal:

PHP 8.1 atau lebih baru

Composer

Git

SQLite (opsional)

Node.js & NPM (opsional)

📥 Langkah Instalasi
1. Clone Repository

(Ganti URL dengan repo Anda)

git clone https://github.com/username-anda/nama-repo.git
cd nama-repo

2. Install Dependency Laravel
composer install

3. Copy File Environment
cp .env.example .env

4. Generate App Key
php artisan key:generate

5. Konfigurasi Database
📄 SQLite (default)
touch database/database.sqlite


Lalu di file .env:

DB_CONNECTION=sqlite
DB_DATABASE=./database/database.sqlite

🗄️ MySQL (opsional)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sales_dashboard
DB_USERNAME=root
DB_PASSWORD=

6. Migrasi & Seeder (untuk data dummy)
php artisan migrate --seed

7. Jalankan Server Lokal
php artisan serve


Aplikasi akan berjalan di:
👉 http://127.0.0.1:8000

🐳 Deployment dengan Docker (Render)

Proyek ini menyediakan konfigurasi Docker agar bisa dideploy mudah di Render.com.

Build lokal (opsional)
docker build -t sales-dashboard .
docker run -p 8000:80 sales-dashboard

📁 Struktur Proyek (Ringkas)
/app
/resources/views
/routes/web.php
/database/migrations
/database/seeders
/public