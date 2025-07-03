<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::query();

        if ($request->filled('search')) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $barangs = $query->get()->map(function ($barang) {
            $jumlah_keluar = $barang->barangKeluars()->sum('jumlah');
            $stok_tersedia = $barang->jumlah - $jumlah_keluar;

            return [
                'kode_barang' => $barang->kode_barang,
                'nama_barang' => $barang->nama_barang,
                'kategori' => $barang->kategori,
                'jumlah_masuk' => $barang->jumlah,
                'jumlah_keluar' => $jumlah_keluar,
                'stok_tersedia' => max($stok_tersedia, 0),
            ];
        });

        // Kategori unik untuk dropdown
        $kategoriList = Barang::select('kategori')->distinct()->pluck('kategori');

        return view('produk.index', compact('barangs', 'kategoriList'));
    }
}

