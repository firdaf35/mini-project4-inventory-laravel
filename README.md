<div align="center">

#  Bloom & Co. Florist

### Inventory Management System

**Aplikasi Manajemen Inventaris Bunga Berbasis Web menggunakan Laravel 12**

[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8%2B-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)

</div>

---

## 📌 1. Deskripsi Proyek

**Bloom & Co. Florist Inventory Management System** adalah aplikasi berbasis web untuk membantu pengelolaan inventaris bunga. Aplikasi ini mencakup pengelolaan produk dan kategori, pencatatan barang masuk dan keluar, serta pemantauan riwayat transaksi stok.

Proyek ini merupakan pengembangan dari sistem inventaris pada tugas **P4** yang dimigrasikan ke framework **Laravel 12** untuk tugas **P5**.

## 🎯 2. Tujuan

- Memigrasikan sistem inventaris P4 ke Laravel.
- Menerapkan pola arsitektur **MVC (Model–View–Controller)**.
- Menggunakan migration, seeder, model, dan Eloquent ORM.
- Menerapkan relasi antartabel.
- Mengimplementasikan CRUD, pencarian, filter, sorting, pagination, dan validasi.
- Menerapkan autentikasi dan pembatasan akses berdasarkan role.

## ✨ 3. Fitur Utama

| No. | Fitur | Deskripsi |
|:---:|---|---|
| 1 | Login & Logout | Autentikasi pengguna sebelum mengakses aplikasi. |
| 2 | Dashboard | Ringkasan produk, kategori, total stok, dan stok menipis. |
| 3 | Data Bunga | Mengelola data produk sesuai hak akses. |
| 4 | Kategori | Mengelola kategori bunga. |
| 5 | Barang Masuk | Mencatat penambahan stok produk. |
| 6 | Barang Keluar | Mencatat pengurangan stok dan memvalidasi stok yang tersedia. |
| 7 | Histori Stok | Melihat catatan transaksi barang masuk dan keluar. |
| 8 | Pencarian & Filter | Mencari produk dan menyaring data. |
| 9 | Sorting & Pagination | Mengurutkan dan membagi daftar data menjadi beberapa halaman. |
| 10 | Role Pengguna | Membedakan hak akses Admin dan Owner. |

## 👥 4. Hak Akses Pengguna

| Fitur | Admin | Owner |
|---|:---:|:---:|
| Melihat dashboard | ✅ | ✅ |
| Melihat data bunga | ✅ | ✅ |
| Melihat detail bunga | ✅ | ✅ |
| Menambah produk | ✅ | ❌ |
| Mengedit dan menghapus produk | ✅ | ❌ |
| Mengelola kategori | ✅ | ❌ |
| Mencatat barang masuk | ✅ | ❌ |
| Mencatat barang keluar | ✅ | ❌ |
| Melihat histori stok | ✅ | ✅ |

Pembatasan akses dilakukan melalui middleware dan konfigurasi route. Pastikan tabel ini sesuai dengan implementasi kode yang digunakan.

## 🛠️ 5. Teknologi

| Teknologi | Penggunaan |
|---|---|
| PHP | Bahasa pemrograman backend |
| Laravel 12 | Framework aplikasi |
| MySQL | Basis data |
| HTML & CSS | Struktur dan tampilan antarmuka |
| Blade | Template engine Laravel |
| Eloquent ORM | Interaksi dengan basis data dan relasi model |
| Composer | Manajemen dependensi PHP |
| XAMPP | Lingkungan pengembangan lokal |
| Visual Studio Code | Editor kode |
| Git & GitHub | Version control dan penyimpanan repository |

## 🗄️ 6. Struktur Database

Database pengembangan yang digunakan adalah `inventory_db`.

| Tabel | Fungsi |
|---|---|
| `users` | Menyimpan data pengguna dan role. |
| `categories` | Menyimpan kategori bunga. |
| `products` | Menyimpan nama produk, SKU, harga, kategori, dan stok. |
| `stock_transactions` | Menyimpan transaksi barang masuk dan keluar. |

### Relasi Antartabel

- **Category → Products:** satu kategori dapat memiliki banyak produk.
- **Product → Stock Transactions:** satu produk dapat memiliki banyak transaksi stok.
- **User → Stock Transactions:** satu pengguna dapat mencatat banyak transaksi stok.

## 📂 7. Struktur Folder

```text
inventory-laravel/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── CategoryController.php
│   │   │   ├── ProductController.php
│   │   │   └── StockTransactionController.php
│   │   └── Middleware/
│   │       └── RoleMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── Category.php
│       ├── Product.php
│       └── StockTransaction.php
├── bootstrap/
│   └── app.php
├── database/
│   ├── migrations/
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── auth/
│       │   └── login.blade.php
│       ├── categories/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── products/
│       ├── stock/
│       └── dashboard.blade.php
├── routes/
│   └── web.php
├── .env.example
├── artisan
├── composer.json
├── composer.lock
└── README.md
```

> Struktur di atas menampilkan file dan folder utama aplikasi. Folder bawaan Laravel lainnya tetap dipertahankan.

## ⚙️ 8. Instalasi

### Langkah 1 — Clone Repository

```bash
git clone https://github.com/firdaf35/mini-project4-inventory-laravel.git
cd mini-project4-inventory-laravel
```

### Langkah 2 — Instal Dependensi

```bash
composer install
```

### Langkah 3 — Siapkan File Environment

Salin `.env.example` menjadi `.env`, lalu sesuaikan konfigurasi database:

```env
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
```

Buat database `inventory_db` melalui phpMyAdmin atau MySQL terlebih dahulu.

### Langkah 4 — Buat Application Key

```bash
php artisan key:generate
```

### Langkah 5 — Jalankan Migration dan Seeder

```bash
php artisan migrate --seed
```

Perintah ini membuat tabel dan mengisi data awal. Gunakan database pengembangan yang sesuai; jangan menjalankan perintah reset pada database yang menyimpan data penting.

### Langkah 6 — Jalankan Aplikasi

```bash
php artisan serve
```

Buka **http://127.0.0.1:8000** di browser.

## 🔐 9. Akun Demo

Akun demo berikut dibuat melalui seeder untuk pengujian lokal.

| Role | Email | Password |
|---|---|---|
| Admin | `admin@bloomco.test` | `password123` |
| Owner | `owner@bloomco.test` | `password123` |

> **Keamanan:** kredensial ini hanya untuk pengembangan dan demonstrasi. Jangan gunakan password demo pada aplikasi produksi.

## 📚 10. Konsep Laravel yang Diterapkan

| Konsep | Penerapan |
|---|---|
| Migration | Mendefinisikan struktur tabel database. |
| Seeder | Mengisi data awal dan akun demo. |
| Model | Merepresentasikan entitas data aplikasi. |
| Eloquent ORM | Mengelola query dan relasi antarmodel. |
| Controller | Menangani alur dan logika aplikasi. |
| Blade | Menampilkan antarmuka pengguna. |
| Middleware | Memeriksa autentikasi dan role pengguna. |
| Validation | Memastikan data input memenuhi aturan. |
| Routing | Mengatur URL dan endpoint aplikasi. |
| Pagination | Membagi daftar data ke beberapa halaman. |

## 👩‍💻 11. Informasi Akademik

| Informasi | Keterangan |
|---|---|
| Nama proyek | Bloom & Co. Florist — Inventory Management System |
| Tugas | P5 — Migrasi Sistem Inventaris ke Laravel |
| Proyek sebelumnya | P4 — Sistem Inventaris |
| Program Studi | Sistem Informasi |
| Nama pengembang | *Isi nama kamu* |
| Universitas | *Isi nama universitas* |

## 📄 12. Penutup

Proyek ini dikembangkan sebagai implementasi pembelajaran pengembangan aplikasi web menggunakan Laravel. Sistem menggabungkan pengelolaan inventaris, relasi database, autentikasi, validasi, dan pembatasan hak akses dalam satu aplikasi.

---

<div align="center">

**Bloom & Co. Florist 🌷**  
*Dikembangkan untuk keperluan akademik.*

</div>
