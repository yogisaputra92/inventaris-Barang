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
        $barangHariIni = \App\Models\Barang::whereDate('created_at', Carbon::today())->count();

        return view('dashboard.admin', compact('totalBarang', 'totalUser', 'barangHariIni'));

    }
    public function user()
    {
        $totalBarang = \App\Models\Barang::count();
        $totalUser = \App\Models\User::count();

        // Hitung barang yang dibuat hari ini
        $barangHariIni = \App\Models\Barang::whereDate('created_at', Carbon::today())->count();

        return view('dashboard.user', compact('totalBarang', 'totalUser', 'barangHariIni'));

    }
}
