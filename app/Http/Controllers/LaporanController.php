<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function barangMasuk()
    {
        $barangs = Barang::all();
        return view('laporan.barang_masuk', compact('barangs'));
    }

    public function barangMasukPdf()
    {
        $barangs = Barang::all();
        $pdf = Pdf::loadView('laporan.pdf.barang_masuk', compact('barangs'));
        return $pdf->download('laporan-barang-masuk.pdf');
    }

    public function barangKeluar()
    {
        $barangKeluars = BarangKeluar::all();
        return view('laporan.barang_keluar', compact('barangKeluars'));
    }

    public function barangKeluarPdf()
    {
        $barangKeluars = BarangKeluar::all();
        $pdf = Pdf::loadView('laporan.pdf.barang_keluar', compact('barangKeluars'));
        return $pdf->download('laporan-barang-keluar.pdf');
    }
}
