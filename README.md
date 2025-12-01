Laravel Sales Dashboard

Aplikasi Dashboard Penjualan sederhana berbasis Laravel. Aplikasi ini dibuat untuk memenuhi tes kandidat IT, menampilkan laporan penjualan, grafik tren, dan fitur filter tanggal.

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

🚀 Instruksi Instalasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer Anda:

Prasyarat

PHP >= 8.1

Composer

Langkah Instalasi

Clone Repository

git clone [https://github.com/username-anda/nama-repo.git](https://github.com/username-anda/nama-repo.git)
cd nama-repo



Install Dependencies

composer install



Setup Environment
Salin file .env.example menjadi .env:

cp .env.example .env



Secara default, aplikasi dikonfigurasi menggunakan SQLite. Jika ingin menggunakan MySQL, silakan edit bagian DB_ di file .env.

Generate Key & Database

php artisan key:generate

# Buat file database sqlite (jika menggunakan sqlite)
touch database/database.sqlite

# Jalankan migrasi
php artisan migrate



Import Data Dummy (Seeding)
PENTING: Langkah ini akan memasukkan data soal (Produk A - Produk E) ke database.

php artisan db:seed --class=PenjualanSeeder



Jalankan Server

php artisan serve



Akses Aplikasi
Buka browser dan kunjungi: http://localhost:8000

💡 Panduan Penggunaan (Penting)

Agar data penjualan muncul di Dashboard, pastikan Anda melakukan filter tanggal yang sesuai dengan data dummy yang telah diimport.

Buka Dashboard.

Pada kolom Filter Tanggal, masukkan rentang berikut:

Dari Tanggal: 01/01/2025

Sampai Tanggal: 31/01/2025

Klik tombol Filter.

Data penjualan, total pendapatan, dan grafik tren akan muncul.

🌐 Hosting

Aplikasi ini dapat di-hosting di layanan seperti Render, Railway, atau Vercel.

Catatan untuk Reviewer:
Jika menggunakan Vercel/Render versi gratis dengan database SQLite, data mungkin akan ter-reset setiap kali deploy ulang (ephemeral storage).

Dibuat oleh Solchan Refqi Al Habib