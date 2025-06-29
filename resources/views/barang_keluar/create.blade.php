@extends('layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Barang Keluar</h1>

<form action="{{ route('barang_keluar.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block">Pilih Barang:</label>
        <select name="barang_id" class="w-full border rounded p-2">
            @foreach($barangs as $barang)
                <option value="{{ $barang->id }}">{{ $barang->nama_barang }} (stok: {{ $barang->jumlah }})</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block">Jumlah Keluar:</label>
        <input type="number" name="jumlah" class="w-full border rounded p-2">
    </div>
    

    <div>
        <label class="block">Tujuan (opsional):</label>
        <input type="text" name="tujuan" class="w-full border rounded p-2">
    </div>

    <button class="bg-red-500 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
