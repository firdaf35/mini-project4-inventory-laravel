Bloom & Co. Florist

Inventory Management System

Aplikasi Manajemen Inventaris Bunga Berbasis Web dengan Laravel 12

---

📌 1. Deskripsi Proyek

Bloom & Co. Florist Inventory Management System adalah aplikasi berbasis web untuk mengelola inventaris bunga, mulai dari pengelolaan data produk, kategori bunga, pencatatan barang masuk dan barang keluar, hingga pemantauan riwayat transaksi stok.

Proyek ini merupakan pengembangan dari sistem inventaris pada tugas P4 yang dimigrasikan ke framework Laravel 12 sebagai bagian dari tugas P5.

Aplikasi ini dirancang untuk membantu pengelolaan persediaan menjadi lebih terstruktur, efisien, dan mudah dipantau.

---

🎯 2. Tujuan Pengembangan

- Memigrasikan aplikasi inventaris P4 ke framework Laravel.
- Menerapkan arsitektur MVC (Model-View-Controller).
- Mengimplementasikan database migration, seeder, dan Eloquent ORM.
- Menerapkan relasi antartabel menggunakan Eloquent.
- Mengimplementasikan fitur CRUD (Create, Read, Update, Delete).
- Menyediakan pencarian, filter, sorting, pagination, dan validasi input.
- Menerapkan autentikasi serta pembagian hak akses pengguna.

---

✨ 3. Fitur Aplikasi

3.1. Authentication

- Login dan logout pengguna.
- Autentikasi menggunakan Laravel.
- Pembagian role pengguna menjadi Admin dan Owner.

3.2. Dashboard

- Menampilkan jumlah produk dan kategori.
- Menampilkan total persediaan bunga.
- Menampilkan produk dengan stok menipis.
- Menampilkan transaksi stok terbaru.

3.3. Manajemen Data Bunga

- Menampilkan daftar produk bunga.
- Menambahkan, mengedit, dan menghapus data produk.
- Menampilkan detail produk.
- Mencari produk berdasarkan nama atau SKU.
- Memfilter produk berdasarkan kategori.
- Mengurutkan produk berdasarkan nama, harga, atau stok.
- Menampilkan data menggunakan pagination.

3.4. Manajemen Kategori

- Menambahkan kategori bunga.
- Menampilkan daftar kategori.
- Mengedit kategori.
- Menghapus kategori yang tidak sedang digunakan.

3.5. Manajemen Stok

- Mencatat transaksi barang masuk.
- Mencatat transaksi barang keluar.
- Memperbarui stok secara otomatis.
- Memvalidasi jumlah stok sebelum barang keluar.
- Menyimpan riwayat transaksi persediaan.

3.6. Histori Transaksi

- Menampilkan riwayat barang masuk dan barang keluar.
- Menampilkan informasi produk, jumlah, tanggal, dan petugas.
- Memfilter histori berdasarkan jenis transaksi.

---

👥 4. Pembagian Hak Akses

Fitur| Admin| Owner
Melihat dashboard| ✅| ✅
Melihat data bunga| ✅| ✅
Melihat detail bunga| ✅| ✅
Menambah produk| ✅| ❌
Mengedit dan menghapus produk| ✅| ❌
Mengelola kategori| ✅| ❌
Mencatat barang masuk| ✅| ❌
Mencatat barang keluar| ✅| ❌
Melihat histori stok| ✅| ✅

Pembatasan akses diterapkan melalui middleware Laravel dan pengaturan route berdasarkan role pengguna.

---

🛠️ 5. Teknologi yang Digunakan

Teknologi| Kegunaan
PHP| Bahasa pemrograman backend
Laravel 12| Framework aplikasi web
MySQL| Sistem manajemen basis data
HTML| Struktur halaman web
CSS| Tampilan dan desain antarmuka
Blade| Template engine Laravel
Eloquent ORM| Pengelolaan data dan relasi database
Composer| Manajemen dependensi PHP
XAMPP| Lingkungan pengembangan lokal
Visual Studio Code| Editor kode
Git & GitHub| Version control dan penyimpanan repository

---

🗃️ 6. Struktur Database

Database aplikasi Laravel menggunakan nama "inventory_db".

Nama Tabel| Fungsi
"users"| Menyimpan data pengguna dan role
"categories"| Menyimpan kategori bunga
"products"| Menyimpan data produk, harga, SKU, dan stok
"stock_transactions"| Menyimpan transaksi barang masuk dan keluar

Relasi Antartabel

- Categories — Products: satu kategori dapat memiliki banyak produk.
- Products — Stock Transactions: satu produk dapat memiliki banyak transaksi stok.
- Users — Stock Transactions: satu pengguna dapat mencatat banyak transaksi stok.

---

📂 7. Struktur Folder Proyek

inventory-laravel/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── CategoryController.php
│   │   │   ├── ProductController.php
│   │   │   └── StockTransactionController.php
│   │   │
│   │   └── Middleware/
│   │       └── RoleMiddleware.php
│   │
│   └── Models/
│       ├── User.php
│       ├── Category.php
│       ├── Product.php
│       └── StockTransaction.php
│
├── bootstrap/
│   └── app.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│       └── DatabaseSeeder.php
│
├── resources/
│   └── views/
│       ├── auth/
│       │   └── login.blade.php
│       ├── categories/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   └── edit.blade.php
│       ├── layouts/
│       │   └── app.blade.php
│       ├── products/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   ├── show.blade.php
│       │   └── _form.blade.php
│       ├── stock/
│       │   ├── index.blade.php
│       │   └── create.blade.php
│       └── dashboard.blade.php
│
├── routes/
│   └── web.php
│
├── .env.example
├── artisan
├── composer.json
├── composer.lock
└── README.md

Catatan: Struktur di atas merupakan gambaran file utama aplikasi. Folder dan file bawaan Laravel lainnya tetap dipertahankan.

---

⚙️ 8. Instalasi dan Menjalankan Aplikasi

Persyaratan

Pastikan perangkat telah memiliki:

- PHP yang kompatibel dengan Laravel 12.
- Composer.
- MySQL atau XAMPP.
- Git.

Langkah 1 — Clone Repository

git clone https://github.com/firdaf35/mini-project4-inventory-laravel.git

Langkah 2 — Masuk ke Folder Proyek

cd mini-project4-inventory-laravel

Langkah 3 — Instal Dependensi

composer install

Langkah 4 — Konfigurasi Environment

Salin ".env.example" menjadi ".env", lalu sesuaikan konfigurasi database di file ".env".

Contoh konfigurasi lokal:

APP_NAME="Bloom & Co. Florist"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_db
DB_USERNAME=root
DB_PASSWORD=

Sesuaikan nilai konfigurasi dengan lingkungan MySQL yang digunakan.

Langkah 5 — Generate Application Key

php artisan key:generate

Langkah 6 — Migrasi Database dan Seeder

Buat database "inventory_db" terlebih dahulu melalui phpMyAdmin, kemudian jalankan:

php artisan migrate --seed

Perintah ini membuat tabel sesuai migration dan memasukkan data awal melalui seeder.

Penting: Gunakan database pengembangan yang sesuai. Jangan menjalankan "migrate:fresh" pada database yang berisi data penting.

Langkah 7 — Jalankan Server

php artisan serve

Buka aplikasi melalui browser:

http://127.0.0.1:8000

---

🔐 9. Akun Demo

Akun berikut disediakan melalui database seeder untuk pengujian aplikasi di lingkungan lokal.

Role| Email| Password
Admin| "admin@bloomco.test"| "password123"
Owner| "owner@bloomco.test"| "password123"

«Catatan keamanan: Akun dan password di atas hanya untuk pengujian lokal. Jangan gunakan kredensial demo sebagai akun produksi.»

---

📚 10. Konsep Laravel yang Diterapkan

Konsep| Implementasi
Migration| Mengelola struktur tabel database
Seeder| Mengisi data awal dan akun demo
Model| Merepresentasikan entitas aplikasi
Eloquent ORM| Mengakses database dan mengatur relasi
Controller| Menangani logika aplikasi
Blade| Menampilkan halaman web
Middleware| Membatasi akses berdasarkan autentikasi dan role
Validation| Memvalidasi data dari pengguna
Pagination| Membagi daftar data ke beberapa halaman
Routing| Mengatur endpoint dan navigasi aplikasi

---

👩‍💻 11. Identitas Proyek

Informasi| Keterangan
Nama Proyek| Bloom & Co. Florist — Inventory Management System
Jenis Proyek| Aplikasi inventaris berbasis web
Tugas| P5 — Migrasi Sistem Inventaris ke Laravel
Tugas Sebelumnya| P4 — Sistem Inventaris
Program Studi| Sistem Informasi
Nama Pengembang| [Isi nama kamu]
Universitas| [Isi nama universitas]

---

📄 12. Penutup

Bloom & Co. Florist Inventory Management System dikembangkan sebagai implementasi pembelajaran pengembangan aplikasi web menggunakan Laravel. Melalui proyek ini, konsep MVC, pengelolaan database, relasi Eloquent, CRUD, validasi, autentikasi, dan middleware diterapkan dalam sistem inventaris yang terintegrasi.

---

Developed for academic purposes — Bloom & Co. Florist