<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{

    public function index()
    {
        $barangs = \App\Models\Barang::all();
        return view('barang_keluar.create', compact('barangs'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang_keluar.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tujuan' => 'nullable|string',
        ]);
    
        $barang = Barang::findOrFail($request->barang_id);
    
        if ($request->jumlah > $barang->jumlah) {
            return back()->withErrors(['jumlah' => 'Jumlah melebihi stok tersedia.']);
        }
    
        // Kurangi stok barang
        $barang->decrement('jumlah', $request->jumlah);
    
        // Simpan barang keluar
        BarangKeluar::create([
            'barang_id'   => $barang->id,
            'kode_barang' => $barang->kode_barang,
            'nama_barang' => $barang->nama_barang,
            'kategori'    => $barang->kategori,
            'lokasi'      => $barang->lokasi,
            'keterangan'  => $barang->keterangan,
            'jumlah'      => $request->jumlah,
            'tujuan'      => $request->tujuan,
        ]);
    
        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar berhasil dicatat.');
    }
}