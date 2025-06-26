# 📦 Aplikasi Inventaris Barang (CRUD) - Laravel 10

Proyek ini merupakan tugas praktik UAS mata kuliah *Web Programming* yang dibuat menggunakan framework Laravel 10. Aplikasi ini memungkinkan pengguna untuk mencatat, mencari, memfilter, dan mengelola data inventaris barang.

---

## ✨ Fitur Utama

- 🔐 Autentikasi (Login & Register)
- 👥 Role-based Access Control (Admin & User)
- 📦 CRUD Barang (Create, Read, Update, Delete)
- 🔍 Pencarian Barang (berdasarkan nama / kode)
- 🏷️ Filter Barang berdasarkan Kategori
- 🖨️ Cetak Laporan Barang dalam Format PDF
- 🌈 Tampilan responsive menggunakan Tailwind CSS

---

## 🧑‍💻 Role Pengguna

| Role  | Akses                                          |
|-------|------------------------------------------------|
| Admin | CRUD Barang, Cetak PDF, Lihat Data             |
| User  | Hanya bisa melihat daftar barang               |

---

## 🏗️ Teknologi yang Digunakan

- Laravel 10
- Tailwind CSS
- Laravel Breeze (Blade + Auth)
- Laravel DomPDF
- PHP 8.x
- MySQL / phpMyAdmin
- Vite

---

## 🚀 Instalasi dan Setup

### 1. Clone project & install dependency

```bash
git clone https://github.com/yogisaputra92/inventaris-Barang.git
cd inventaris-barang

composer install
npm install
cp .env.example .env
php artisan key:generate
````

### 2. Setting database

Edit file `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventaris_barang
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Jalankan migrasi

```bash
php artisan migrate
```

### 4. Jalankan server

```bash
php artisan serve
npm run dev
```

> Buka di browser: `http://localhost:8000`

---

## 📁 Struktur Folder Penting

```
├── app/Http/Controllers/BarangController.php
├── resources/views/barang/
│   ├── index.blade.php   // Tampil barang + filter
│   ├── create.blade.php  // Form tambah
│   ├── edit.blade.php    // Form edit
│   └── pdf.blade.php     // Laporan PDF
├── routes/web.php
├── database/migrations/
└── public/
```

---

## 📷 Tampilan Antarmuka

> (Tambahkan screenshot antarmuka di sini)

---

## 🧾 Lisensi

Aplikasi ini dikembangkan untuk keperluan pembelajaran dan tugas akhir UAS. Silakan gunakan, modifikasi, dan kembangkan lebih lanjut.

---

## 🙋‍♂️ Developer

**Nama**: M Yogi Saputra
**Kelas**: \[ 17.6B.25 ]
**Mata Kuliah**: Web Programming

---

```