@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Tambah Barang</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <!-- Kode Barang -->
        <div class="mb-4">
            <label for="kode_barang" class="block font-medium">Kode Barang</label>
            <select id="kode_barang" name="kode_barang" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Kode Barang --</option>
                @foreach($barangs as $barang)
                <option value="{{ $barang->kode_barang }}">{{ $barang->kode_barang }}</option>
                @endforeach
            </select>
        </div>

        <!-- Nama Barang -->
        <div class="mb-4">
            <label for="nama_barang" class="block font-medium">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" class="w-full border rounded px-3 py-2" readonly>
        </div>

        <!-- Kategori -->
        <div class="mb-4">
            <label for="kategori" class="block font-medium">Kategori</label>
            <input type="text" id="kategori" name="kategori" class="w-full border rounded px-3 py-2" readonly>
        </div>

        <!-- Lokasi -->
        <div class="mb-4">
            <label for="lokasi" class="block font-medium">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" class="w-full border rounded px-3 py-2" readonly>
        </div>

        <!-- Jumlah -->
        <div class="mb-4">
            <label for="jumlah" class="block font-medium">Jumlah</label>
            <input type="number" name="jumlah" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Keterangan -->
        <div class="mb-4">
            <label for="keterangan" class="block font-medium">Keterangan</label>
            <textarea name="keterangan" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <button type="submit" class="dark:bg-gray-900 text-white px-4 py-2 rounded">Simpan</button>
    </form>

    <script>
    // Deklarasikan data barang satu kali
    const barangData = @json($barangs->keyBy('kode_barang'));

    // Event ketika kode_barang dipilih
    document.getElementById('kode_barang').addEventListener('change', function () {
        const kode = this.value;
        const data = barangData[kode];

        document.getElementById('nama_barang').value = data ? data.nama_barang : '';
        document.getElementById('kategori').value = data ? data.kategori : '';
        document.getElementById('lokasi').value = data ? data.lokasi : '';
    });
</script>


</div>

@endsection