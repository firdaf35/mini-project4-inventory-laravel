Bloom & Co. Florist — Inventory Management System

Aplikasi manajemen inventaris bunga berbasis web yang dikembangkan menggunakan Laravel 12 dan MySQL. Proyek ini merupakan pengembangan dari sistem inventaris pada tugas P4 yang dimigrasikan ke framework Laravel untuk memenuhi tugas P5.

📌 Deskripsi Proyek

Bloom & Co. Florist Inventory Management System merupakan aplikasi yang digunakan untuk mengelola data bunga, kategori, persediaan barang, serta transaksi barang masuk dan barang keluar.

Aplikasi ini dikembangkan untuk membantu proses pengelolaan inventaris menjadi lebih terstruktur, memudahkan pemantauan stok, dan menyediakan pencatatan riwayat transaksi persediaan.

Proyek ini juga menerapkan autentikasi pengguna dan pembagian hak akses berdasarkan role, yaitu Admin dan Owner.

🎯 Tujuan

- Memigrasikan sistem inventaris dari proyek P4 ke Laravel.
- Menerapkan konsep MVC (Model-View-Controller).
- Mengimplementasikan database migration, seeder, dan Eloquent ORM.
- Menerapkan relasi antartabel menggunakan Eloquent.
- Menyediakan fitur CRUD, pencarian, filter, sorting, dan pagination.
- Mengimplementasikan validasi input dan pencatatan transaksi stok.
- Menerapkan autentikasi dan pembatasan hak akses pengguna.

✨ Fitur Aplikasi

1. Authentication

- Login dan logout pengguna.
- Autentikasi menggunakan Laravel.
- Pembagian hak akses Admin dan Owner.

2. Dashboard

- Menampilkan jumlah produk.
- Menampilkan jumlah kategori.
- Menampilkan total persediaan.
- Menampilkan produk dengan stok menipis.
- Menampilkan transaksi stok terbaru.

3. Manajemen Data Bunga

- Menampilkan daftar bunga.
- Menambahkan produk bunga.
- Mengedit data produk.
- Menghapus produk sesuai ketentuan sistem.
- Menampilkan detail produk.
- Mencari produk berdasarkan nama atau SKU.
- Memfilter produk berdasarkan kategori.
- Mengurutkan data berdasarkan nama, harga, atau stok.
- Pagination untuk daftar produk.

4. Manajemen Kategori

- Menambahkan kategori bunga.
- Menampilkan daftar kategori.
- Mengedit kategori.
- Menghapus kategori yang tidak sedang digunakan oleh produk.

5. Manajemen Stok

- Mencatat transaksi barang masuk.
- Mencatat transaksi barang keluar.
- Memperbarui jumlah stok secara otomatis.
- Memvalidasi ketersediaan stok sebelum barang keluar.
- Menyimpan riwayat transaksi stok.

6. Histori Transaksi

- Menampilkan riwayat barang masuk dan keluar.
- Menampilkan tanggal transaksi, produk, jumlah, dan petugas.
- Memfilter transaksi berdasarkan jenisnya.

7. Role-Based Access Control

Admin

- Mengakses dashboard.
- Melihat dan mengelola data bunga.
- Mengelola kategori.
- Mencatat barang masuk dan barang keluar.
- Melihat histori transaksi.

Owner

- Melihat dashboard.
- Melihat data dan detail bunga.
- Melihat histori transaksi stok.

🛠️ Teknologi yang Digunakan

- Backend: PHP dan Laravel 12
- Database: MySQL
- Frontend: HTML dan CSS
- Template Engine: Blade
- ORM: Eloquent ORM
- Development Tools: Visual Studio Code, Composer, dan XAMPP
- Version Control: Git dan GitHub

🗃️ Database

Database yang digunakan untuk versi Laravel ini bernama "inventory_db".

Tabel utama yang digunakan:

Tabel| Fungsi
"users"| Menyimpan data pengguna dan role
"categories"| Menyimpan kategori bunga
"products"| Menyimpan data produk dan stok
"stock_transactions"| Menyimpan transaksi barang masuk dan keluar

Relasi database meliputi:

- Kategori memiliki banyak produk (one-to-many).
- Produk memiliki banyak transaksi stok (one-to-many).
- Pengguna dapat memiliki banyak catatan transaksi stok (one-to-many).

⚙️ Instalasi dan Menjalankan Aplikasi

Prasyarat

Pastikan perangkat telah memiliki:

- PHP yang memenuhi persyaratan Laravel 12.
- Composer.
- MySQL atau XAMPP.
- Git.

1. Clone Repository

git clone https://github.com/USERNAME/REPOSITORY.git

Ganti "USERNAME/REPOSITORY" dengan alamat repository GitHub milikmu.

2. Masuk ke Folder Project

cd inventory-laravel

3. Instal Dependensi

composer install

4. Konfigurasi Environment

Salin file ".env.example" menjadi ".env", kemudian sesuaikan konfigurasi database.

Contoh konfigurasi untuk MySQL lokal:

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

Sesuaikan nama database, username, dan password dengan konfigurasi MySQL milikmu.

5. Generate Application Key

php artisan key:generate

6. Jalankan Migration dan Seeder

php artisan migrate --seed

Perintah ini membuat tabel database dan mengisi data contoh melalui seeder. Gunakan database pengembangan yang masih kosong agar tidak mengganggu data yang sudah ada.

7. Jalankan Aplikasi

php artisan serve

Buka browser dan akses:

http://127.0.0.1:8000

🔐 Akun Demo

Akun berikut dibuat melalui database seeder untuk pengujian lokal.

Role| Email| Password
Admin| "admin@bloomco.test"| "password123"
Owner| "owner@bloomco.test"| "password123"

Catatan: Akun tersebut merupakan akun demo untuk lingkungan pengembangan. Jangan gunakan kredensial contoh ini untuk aplikasi produksi.

📁 Struktur Project

inventory-laravel/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   └── Models/
├── bootstrap/
│   └── app.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── auth/
│       ├── categories/
│       ├── layouts/
│       ├── products/
│       ├── stock/
│       └── dashboard.blade.php
├── routes/
│   └── web.php
├── .env.example
├── artisan
├── composer.json
└── README.md

📚 Implementasi Laravel

Dalam proyek ini, beberapa konsep Laravel yang diterapkan meliputi:

- Migration: Mengelola struktur tabel database melalui kode.
- Seeder: Mengisi data awal dan akun demo.
- Model: Merepresentasikan data dan relasi antartabel.
- Eloquent ORM: Mempermudah operasi database.
- Controller: Mengatur logika aplikasi dan alur data.
- Blade: Menampilkan antarmuka aplikasi.
- Middleware: Melindungi halaman berdasarkan autentikasi dan role.
- Validation: Memvalidasi input pengguna.
- Pagination: Membagi data menjadi beberapa halaman.

👩‍💻 Pengembangan

Proyek ini dikembangkan sebagai bagian dari tugas mata kuliah untuk menerapkan framework Laravel pada sistem informasi inventaris.

Nama Proyek: Bloom & Co. Florist — Inventory Management System
Mata Kuliah: [Isi nama mata kuliah]
Tugas: P5 — Migrasi Sistem Inventaris ke Laravel
Nama: [Isi nama kamu]
Program Studi: Sistem Informasi
Universitas: [Isi nama universitas]

📄 Lisensi

Proyek ini dikembangkan untuk keperluan pembelajaran dan tugas akademik.