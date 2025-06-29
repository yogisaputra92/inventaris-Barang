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
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">Barang Keluar</h1>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">

        @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>

        @endif

        <div class="mb-4 flex justify-between items-center">
            @auth
            @if (Auth::user()->role === 'admin')
            <a href="{{ route('barang_keluar.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                + Tambah Barang Keluar
            </a>
            @endif
            @endauth
        </div>
    
        <div class="overflow-x-auto border border-solid">
            <table class="min-w-full bg-white shadow-md rounded">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2 border">Kode</th>
                        <th class="p-2 border">Nama</th>
                        <th class="p-2 border">Kategori</th>
                        <th class="p-2 border">Jumlah</th>
                        <th class="p-2 border">Lokasi</th>
                        <th class="p-2 border">Keterangan</th>
                        <th class="p-2 border">Tujuan</th>
                        <th class="p-2 border">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangKeluars as $bk)
                    <tr class="border-b">
                        <td class="p-2">{{ $bk->kode_barang }}</td>
                        <td class="p-2">{{ $bk->nama_barang }}</td>
                        <td class="p-2">{{ $bk->kategori }}</td>
                        <td class="p-2">{{ $bk->jumlah }}</td>
                        <td class="p-2">{{ $bk->lokasi }}</td>
                        <td class="p-2">{{ $bk->keterangan }}</td>
                        <td class="p-2">{{ $bk->tujuan }}</td>
                        <td class="p-2">{{ $bk->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>




@endsection