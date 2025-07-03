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
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight ">Stok Barang</h1>
    </div>
    <div class="container mx-auto px-4 mt-8">


        <!-- Search & Filter -->
        <form method="GET" action="{{ route('produk.index') }}" class="flex flex-wrap gap-2 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama barang..."
                class="border p-2 rounded w-64" />

            <select name="kategori" class="border p-3 rounded">
                <option value="">Semua Kategori</option>
                @foreach($kategoriList as $kategori)
                <option value="{{ $kategori }}" @if(request('kategori')==$kategori) selected @endif>
                    {{ $kategori }}
                </option>
                @endforeach
            </select>

            <button type="submit" class="text-white dark:bg-gray-900 px-4 py-2 font-semibold rounded">
                Filter
            </button>

            <div class="dark:bg-gray-900 px-4 py-2 font-semibold rounded">
                <a href="{{ route('produk.index') }}" class=" text-white underline ml-2 self-center">Reset</a>
            </div>
        </form>


        <!-- table produk -->
        <table class="min-w-full bg-white border rounded shadow">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-2 border">Kode</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Kategori</th>
                    <th class="p-2 border">Masuk</th>
                    <th class="p-2 border">Keluar</th>
                    <th class="p-2 border">Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barangs as $barang)
                <tr>
                    <td class="p-2 border">{{ $barang['kode_barang'] }}</td>
                    <td class="p-2 border">{{ $barang['nama_barang'] }}</td>
                    <td class="p-2 border">{{ $barang['kategori'] }}</td>
                    <td class="p-2 border text-blue-700 font-semibold">{{ $barang['jumlah_masuk'] }}</td>
                    <td class="p-2 border text-red-700 font-semibold">{{ $barang['jumlah_keluar'] }}</td>
                    <td class="p-2 border text-green-700 font-semibold">{{ $barang['stok_tersedia'] }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">Tidak ada data barang.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>

@endsection