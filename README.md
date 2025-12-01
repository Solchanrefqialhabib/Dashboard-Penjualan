📊 Laravel Sales Dashboard

Live Demo: https://dashboard-penjualan.onrender.com

Aplikasi Dashboard Penjualan sederhana berbasis Laravel. Aplikasi ini dibuat untuk memenuhi tes kandidat IT, menampilkan laporan penjualan, grafik tren, dan fitur filter tanggal.

📸 Tampilan Dashboard

Berikut adalah tangkapan layar dari aplikasi dashboard yang telah berjalan.

Ganti URL di bawah dengan path raw GitHub kamu

![Dashboard](./public/images/image.png)

📋 Fitur Utama

Dashboard Overview: Menampilkan total pendapatan dan total item terjual.
Grafik Tren Penjualan: Visualisasi pendapatan harian menggunakan Chart.js.
Tabel Data Rinci: Daftar transaksi penjualan lengkap dengan harga satuan dan total.
Filter Tanggal: Kemampuan menyaring data berdasarkan rentang tanggal tertentu.

🛠️ Teknologi yang Digunakan

Framework: Laravel 10/11
Database: SQLite (Default) / MySQL
Frontend: Blade Template, Tailwind CSS (CDN)
Charting: Chart.js (CDN)
Deployment: Docker (untuk Render.com)

🚀 Instruksi Instalasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer Anda:

Prasyarat

PHP >= 8.1
Composer
Git

Langkah Instalasi
Clone Repository

(Ganti URL di bawah ini dengan link repository GitHub Anda)

git clone https://github.com/username-anda/nama-repo.git
cd nama-repo

Install Dependencies
composer install

Setup Environment

Salin file .env.example menjadi .env:

cp .env.example .env

Generate Key & Database
php artisan key:generate
touch database/database.sqlite
php artisan migrate

Import Data Dummy (Seeding)

PENTING: Langkah ini akan memasukkan data soal (Produk A - Produk E) ke database.

php artisan db:seed --class=PenjualanSeeder

Jalankan Server
php artisan serve

Akses Aplikasi

Buka browser dan kunjungi:
http://localhost:8000

💡 Panduan Penggunaan (Penting)

Agar data penjualan muncul di Dashboard, pastikan Anda melakukan filter tanggal yang sesuai dengan data dummy yang telah diimport.

Buka Dashboard.

Pada kolom Filter Tanggal, masukkan rentang: 01/01/2025 s/d 31/01/2025.

Klik tombol Filter.

🌐 Panduan Deployment (Render.com)

Aplikasi ini di-hosting menggunakan layanan Render (Free Tier) dengan konfigurasi Docker.

Langkah 1: Persiapan File

Pastikan di dalam repository Anda sudah terdapat file Dockerfile. Proyek ini menggunakan Docker untuk menjalankan PHP 8.2 dan SQLite di lingkungan Render.

Langkah 2: Setup di Render

Buka dashboard.render.com dan login dengan GitHub.

Klik tombol "New +" lalu pilih "Web Service".

Pilih "Build and deploy from a Git repository".

Cari dan pilih repository proyek ini.

Langkah 3: Konfigurasi Web Service

Name: dashboard-penjualan (bebas)
Region: Singapore (SG)
Branch: main
Runtime: Docker
Instance Type: Free

Langkah 4: Environment Variables
Key	Value
APP_KEY	(Salin nilai APP_KEY dari .env lokal)
APP_DEBUG	true
APP_ENV	production
DB_CONNECTION	sqlite
Langkah 5: Deploy

Klik "Create Web Service". Render akan otomatis melakukan build image Docker, migrasi database, dan seeding data.

Langkah 6: Selesai

Setelah proses build selesai (status Live), aplikasi dapat diakses melalui URL:
https://dashboard-penjualan.onrender.com

Dibuat oleh Solchan Refqi Al Habib