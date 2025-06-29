
@extends('layouts.app')

@section('content')



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="bg-white shadow max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">Dashboard</h1>
    </div>
    <div class="max-w-7xl mx-auto pt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white shadow p-6 rounded-lg text-center">
                <p class="text-gray-600">Total Barang</p>
                <p class="text-3xl font-bold text-green-500">{{ $totalBarang }}</p>
            </div>
            <div class="bg-white shadow p-6 rounded-lg text-center">
                <p class="text-gray-600">Total Pengguna</p>
                <p class="text-3xl font-bold text-green-500">{{ $totalUser }}</p>
            </div>
            <div class="bg-white shadow p-6 rounded-lg text-center">
                <p class="text-gray-600">Barang Masuk Hari Ini</p>
                <p class="text-3xl font-bold text-orange-500">{{ $barangHariIni }}</p>
            </div>
            {{-- Tambahkan statistik lain jika ada --}}
        </div>

        {{-- <div class="mt-8">
            <a href="{{ route('barang.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Lihat Daftar Barang
            </a>
        </div> --}}
    </div>
</body>

</html>
@endsection