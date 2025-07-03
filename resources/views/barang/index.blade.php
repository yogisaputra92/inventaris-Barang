@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>daftar</title> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="bg-white shadow max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">Barang Masuk</h1>
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
            <a href="{{ route('barang.create') }}"
                class="bg-gray-900 hover:bg-gray-800 text-white px-4 py-2 rounded shadow font-semibold">
                + Tambah Barang
            </a>
            @endif
            @endauth
        </div>

        <div class="overflow-x-auto border border-solid">
            <table class="min-w-full bg-white shadow-md rounded">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 text-left">#</th>
                        <th class="py-2 px-4 text-left">Kode</th>
                        <th class="py-2 px-4 text-left">Nama</th>
                        <th class="py-2 px-4 text-left">Kategori</th>
                        <th class="py-2 px-4 text-left">Jumlah</th>
                        <th class="py-2 px-4 text-left">Lokasi</th>
                        <th class="py-2 px-4 text-left">Keterangan</th>
                        <th class="py-2 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $barang)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4">{{ $barang->kode_barang }}</td>
                        <td class="py-2 px-4">{{ $barang->nama_barang }}</td>
                        <td class="py-2 px-4">{{ $barang->kategori }}</td>
                        <td class="py-2 px-4">{{ $barang->jumlah }}</td>
                        <td class="py-2 px-4">{{ $barang->lokasi }}</td>
                        <td class="py-2 px-4">{{ $barang->keterangan }}</td>
                        <td class="py-2 px-4">
                            @if (Auth::user()->role === 'admin')
                            <div class="flex gap-2 font-semibold">
                                <a href="{{ route('barang.edit', $barang->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin hapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                       <p class="bg-red-700 hover:bg-red-800 text-white px-3 py-1 rounded text-sm">Hapus</p>
                                    </button>
                                </form>
                            </div>
                            @else
                            <span class="text-gray-400 text-sm">Akses terbatas</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-4 px-4 text-center text-gray-500">Data barang belum tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $barangs->appends(request()->query())->links() }}

        </div>
    </div>
</body>

</html>
@endsection