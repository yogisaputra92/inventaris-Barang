# 📦 Aplikasi Inventaris Barang (CRUD) - Laravel 10

Proyek ini merupakan tugas praktik UAS mata kuliah *Web Programming* yang dibuat menggunakan framework Laravel 10. Aplikasi ini memungkinkan pengguna untuk mencatat, mencari, memfilter, dan mengelola data inventaris barang.

---

## ✨ Fitur Utama

- 🔐 Autentikasi & Registrasi dengan Role (Admin & User)
- 👥 Role-based Access Control (Admin & User)
- 📦 CRUD Barang (Create, Read, Update, Delete)
- 🔍 Pencarian Barang (berdasarkan nama / kode)
- 🏷️ Filter Barang berdasarkan Kategori
- 🖨️ Cetak Laporan Barang dalam Format PDF
- 🌈 Tampilan responsive menggunakan Tailwind CSS
- 📤 Barang Keluar (pengurangan stok)
- 📊 Statistik Dashboard (barang, user, barang hari ini)
- 🕒 Histori update & barang keluar
- 🧪 Dummy data via Seeder

---

## 🧑‍💻 Role Pengguna

| Role  | Akses                                          |
|-------|------------------------------------------------|
| Admin | CRUD Barang, Cetak PDF, Lihat Data             |
| User  | Hanya bisa melihat daftar barang               |

---

### 👥 Role & Hak Akses

| Fitur             | Admin | User |
| ----------------- | :---: | :--: |
| Dashboard         |   ✅   |   ✅  |
| CRUD Barang       |   ✅   |   ❌  |
| Lihat Barang      |   ✅   |   ✅  |
| Barang Keluar     |   ✅   |   ✅  |
| Manajemen User    |   ✅   |   ❌  |
| Profil & Password |   ✅   |   ✅  |

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
php artisan migrate:fresh --seed
```

### 4. Jalankan server

```bash
php artisan serve
npm run dev
```

> Buka di browser: `http://localhost:8000`

---

### 5. Akses login
```bash
Admin     : admin@gmail.com / password
User Biasa: user@gmail.com  / password
```

## 📁 Struktur Folder Penting

```
app/
├── Models/
│   ├── Barang.php
│   └── BarangKeluar.php
├── Http/
│   ├── Controllers/
│   │   ├── BarangController.php
│   │   ├── BarangKeluarController.php
│   │   ├── DashboardController.php
│   │   └── UserController.php
resources/
├── views/
│   ├── barang/
│   ├── barang_keluar/
│   ├── dashboard/
│   └── profile/
routes/
└── web.php

```

---

## 📷 Tampilan Antarmuka

![dashboard-admin](https://github.com/yogisaputra92/inventaris-Barang/blob/main/public/screenshots/Screenshot%20from%202025-06-29%2022-28-47.png)

![barang](https://github.com/yogisaputra92/inventaris-Barang/blob/main/public/screenshots/Screenshot%20from%202025-06-29%2022-28-52.png)

![profile](https://github.com/yogisaputra92/inventaris-Barang/blob/main/public/screenshots/Screenshot%20from%202025-06-29%2022-29-10.png)

![login](https://github.com/yogisaputra92/inventaris-Barang/blob/main/public/screenshots/Screenshot%20from%202025-06-29%2022-29-23.png)

![register](https://github.com/yogisaputra92/inventaris-Barang/blob/main/public/screenshots/Screenshot%20from%202025-06-29%2022-29-40.png)

---

✅ Dummy Data

Kamu bisa menambahkan dummy data untuk barang lewat seeder:
```bash
php artisan db:seed --class=BarangSeeder
```
---

## 🧾 Lisensi

Aplikasi ini dikembangkan untuk keperluan pembelajaran dan tugas akhir UAS. Silakan gunakan, modifikasi, dan kembangkan lebih lanjut.

---

## 🙋‍♂️ Developer

**Nama**: M Yogi Saputra
**Kelas**: \[ 17.6B.25 ]
**Mata Kuliah**: Web Programming ll

---
