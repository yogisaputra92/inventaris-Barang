@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Edit</title> -->

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Edit Barang</h1>
    
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="mb-4">
                <label class="block font-medium mb-1">Kode Barang</label>
                <input type="text" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}"
                       class="w-full border-gray-300 rounded p-2" required>
            </div>
    
            <div class="mb-4">
                <label class="block font-medium mb-1">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}"
                       class="w-full border-gray-300 rounded p-2" required>
            </div>
    
            <div class="mb-4">
                <label class="block font-medium mb-1">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $barang->kategori) }}"
                       class="w-full border-gray-300 rounded p-2" required>
            </div>
    
            <div class="mb-4">
                <label class="block font-medium mb-1">Jumlah</label>
                <input type="number" name="jumlah" value="{{ old('jumlah', $barang->jumlah) }}"
                       class="w-full border-gray-300 rounded p-2" required>
            </div>
    
            <div class="mb-4">
                <label class="block font-medium mb-1">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $barang->lokasi) }}"
                       class="w-full border-gray-300 rounded p-2" required>
            </div>
    
            <div class="mb-4">
                <label class="block font-medium mb-1">Keterangan</label>
                <textarea name="keterangan" class="w-full border-gray-300 rounded p-2"
                          rows="3">{{ old('keterangan', $barang->keterangan) }}</textarea>
            </div>
    
            <div class="flex justify-between">
                <a href="{{ route('barang.index') }}">
                   <p class="text-gray-600 hover:underline">
                   ← Kembali
                   </p></a>
    
                <button type="submit">
                    <p class="bg-green-600  hover:bg-green-700 text-white px-4 py-2 rounded">Update</p>
                </button>
            </div>
        </form>
    </div>
</body>
</html>
@endsection
