@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Daftar Barang Masuk</h2>

    <table class="w-full table-auto border">
        <thead>
            <tr>
                <th class="border px-2 py-1">Kode Barang</th>
                <th class="border px-2 py-1">Nama Barang</th>
                <th class="border px-2 py-1">Kategori</th>
                <th class="border px-2 py-1">Jumlah</th>
                <th class="border px-2 py-1">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangMasuks as $masuk)
            <tr>
                <td class="border px-2 py-1">{{ $masuk->kode_barang }}</td>
                <td class="border px-2 py-1">{{ $masuk->nama_barang }}</td>
                <td class="border px-2 py-1">{{ $masuk->kategori }}</td>
                <td class="border px-2 py-1">{{ $masuk->jumlah }}</td>
                <td class="border px-2 py-1">{{ $masuk->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $barangMasuks->links() }}
    </div>
</div>
@endsection
