<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Barang;


class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuks = BarangMasuk::latest()->paginate(10);
        return view('barang-masuk.index', compact('barangMasuks'));
    }

    public function create()
    {
        $barangs = Barang::all(); // Data master
        return view('barang-masuk.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|exists:barangs,kode_barang',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $barang = Barang::where('kode_barang', $request->kode_barang)->first();

        if ($barang) {
            $barang->jumlah += $request->jumlah;
            $barang->save();
        }

        BarangMasuk::create([
            'kode_barang' => $barang->kode_barang,
            'nama_barang' => $barang->nama_barang,
            'kategori' => $barang->kategori,
            'lokasi' => $barang->lokasi,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('barang.index')->with('success', 'Stok berhasil ditambahkan.');
    }
}
