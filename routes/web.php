<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BarangMasukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    return $user->role === 'admin'
        ? redirect()->route('dashboard.admin')
        : redirect()->route('dashboard.user');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'is_admin'])->get('/dashboard-admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
Route::middleware(['auth'])->get('/dashboard-user', [DashboardController::class, 'user'])->name('dashboard.user');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Barang - semua user bisa lihat, admin bisa CRUD
Route::middleware(['auth'])->group(function () {
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/cetak/pdf', [BarangController::class, 'cetakPdf'])->name('barang.cetak.pdf');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::get('/barang/{barang}', [BarangController::class, 'show'])->name('barang.show'); // optional
});

// Manajemen user (admin)
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/{id}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang_keluar.index');
    Route::get('/barang-keluar/create', [BarangKeluarController::class, 'create'])->name('barang_keluar.create');
    Route::post('/barang-keluar', [BarangKeluarController::class, 'store'])->name('barang_keluar.store');
});

Route::middleware(['auth'])->get('/produk', [ProdukController::class, 'index'])->name('produk.index');

// search & filter
Route::middleware(['auth'])->get('/produk', [ProdukController::class, 'index'])->name('produk.index');

// laporan barang masuk & keluar
use App\Http\Controllers\LaporanController;

Route::middleware(['auth'])->prefix('laporan')->group(function () {
    Route::get('/barang-masuk', [LaporanController::class, 'barangMasuk'])->name('laporan.barangMasuk');
    Route::get('/barang-masuk/pdf', [LaporanController::class, 'barangMasukPdf'])->name('laporan.barangMasuk.pdf');

    Route::get('/barang-keluar', [LaporanController::class, 'barangKeluar'])->name('laporan.barangKeluar');
    Route::get('/barang-keluar/pdf', [LaporanController::class, 'barangKeluarPdf'])->name('laporan.barangKeluar.pdf');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/barang-masuk/create', [BarangMasukController::class, 'create'])->name('barang-masuk.create');
    Route::post('/barang-masuk', [BarangMasukController::class, 'store'])->name('barang-masuk.store');
    Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang_masuk.index');
});







require __DIR__.'/auth.php';