<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MasterBarang;
use App\Models\BarangMasuk;



class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $filterKategori = $request->input('kategori');
    
        $barangs = Barang::when($keyword, function ($query) use ($keyword) {
            $query->where('nama_barang', 'like', "%{$keyword}%")
                  ->orWhere('kode_barang', 'like', "%{$keyword}%");
        })->when($filterKategori, function ($query) use ($filterKategori) {
            $query->where('kategori', $filterKategori);
        })->latest()->paginate(10);
    
        // Ambil semua kategori unik dari tabel barang
        $kategoriList = Barang::select('kategori')->distinct()->pluck('kategori');
       
        return view('barang.index', compact('barangs', 'keyword', 'filterKategori', 'kategoriList'));

    }

    public function cetakPdf(Request $request)
    {
        $keyword = $request->input('search');
        $filterKategori = $request->input('kategori');

        $barangs = Barang::when($keyword, function ($query) use ($keyword) {
            $query->where('nama_barang', 'like', "%{$keyword}%")
                ->orWhere('kode_barang', 'like', "%{$keyword}%");
        })->when($filterKategori, function ($query) use ($filterKategori) {
            $query->where('kategori', $filterKategori);
        })->latest()->get(); // ← semua data, tanpa paginate

        $pdf = Pdf::loadView('barang.pdf', compact('barangs'));
        return $pdf->stream('laporan-barang.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('barang.create');

        $barangs = \App\Models\Barang::all();
        return view('barang.create', compact('barangs'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'kode_barang' => 'required|unique:barangs',
        //     'nama_barang' => 'required',
        //     'kategori' => 'required',
        //     'jumlah' => 'required|integer',
        //     'lokasi' => 'required',
        //     'keterangan' => 'required',
        // ]);

        // Barang::create($request->all());
        // return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');

        $request->validate([
            'kode_barang' => 'required|exists:barangs,kode_barang',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);
    
        // Ambil barang berdasarkan kode_barang
        $barang = \App\Models\Barang::where('kode_barang', $request->kode_barang)->first();
    
        if ($barang) {
            // Tambahkan stok barang
            $barang->jumlah += $request->jumlah;
            $barang->save();
        }
    
        // Simpan log barang masuk
        \App\Models\BarangMasuk::create([
            'kode_barang' => $barang->kode_barang,
            'nama_barang' => $barang->nama_barang,
            'kategori' => $barang->kategori,
            'lokasi' => $barang->lokasi,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);
    
        return redirect()->route('barang.index')->with('success', 'Stok barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required|integer',
            'lokasi' => 'required',
        ]);

        $barang->update($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
