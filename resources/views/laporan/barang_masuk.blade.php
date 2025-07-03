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
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">Laporan Barang Masuk</h1>
    </div>    
    <div class="container mx-auto px-4 mt-8">
        <a href="{{ route('laporan.barangMasuk.pdf') }}" class="bg-gray-900 text-white px-4 py-2 rounded mb-4 inline-block font-semibold">Cetak PDF</a>
    
        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Kode</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Kategori</th>
                    <th class="border p-2">Jumlah</th>
                    <th class="border p-2">Lokasi</th>
                    <th class="border p-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $barang)
                <tr>
                    <td class="border p-2">{{ $barang->kode_barang }}</td>
                    <td class="border p-2">{{ $barang->nama_barang }}</td>
                    <td class="border p-2">{{ $barang->kategori }}</td>
                    <td class="border p-2">{{ $barang->jumlah }}</td>
                    <td class="border p-2">{{ $barang->lokasi }}</td>
                    <td class="border p-2">{{ $barang->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection

