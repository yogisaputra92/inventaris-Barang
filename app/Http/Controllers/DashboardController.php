<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon; // tambahkan di bagian atas

class DashboardController extends Controller
{

    public function admin()
    {
        $totalBarang = \App\Models\Barang::count();
        $totalUser = \App\Models\User::count();

        // Hitung barang yang dibuat hari ini
        // $barangHariIni = \App\Models\Barang::whereDate('created_at', Carbon::today())->count();

        $barangHariIni = Barang::whereDate('created_at', Carbon::today())->count();

        // Grafik 7 hari terakhir
        $grafikBarang = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::today()->subDays($i)->format('Y-m-d');
            $jumlah = Barang::whereDate('created_at', $tanggal)->count();
            $grafikBarang['labels'][] = Carbon::parse($tanggal)->format('d M');
            $grafikBarang['data'][] = $jumlah;
        }
    
        // Histori update 5 terakhir
        $recentUpdates = Barang::orderBy('updated_at', 'desc')->take(5)->get();

        return view('dashboard.admin', compact('totalBarang', 'totalUser', 'barangHariIni', 'grafikBarang', 'recentUpdates'));

    }
    public function user()
    {
        $totalBarang = \App\Models\Barang::count();
        $totalUser = \App\Models\User::count();

        // Hitung barang yang dibuat hari ini
        $barangHariIni = Barang::whereDate('created_at', Carbon::today())->count();

        // Grafik 7 hari terakhir
        $grafikBarang = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::today()->subDays($i)->format('Y-m-d');
            $jumlah = Barang::whereDate('created_at', $tanggal)->count();
            $grafikBarang['labels'][] = Carbon::parse($tanggal)->format('d M');
            $grafikBarang['data'][] = $jumlah;
        }
    
        // Histori update 5 terakhir
        $recentUpdates = Barang::orderBy('updated_at', 'desc')->take(5)->get();

        return view('dashboard.admin', compact('totalBarang', 'totalUser', 'barangHariIni', 'grafikBarang', 'recentUpdates'));
    }
}
