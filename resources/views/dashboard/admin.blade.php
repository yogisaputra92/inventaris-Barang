@extends('layouts.app')

@section('content')



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class='m-auto'>
    <div class="bg-white shadow max-w-full py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="font-semibold text-xl dark:text-gray-900 leading-tight">Dashboard</h1>
    </div>
    <div class="max-w-7xl mx-auto pt-4 mt-8">
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
                <p class="text-3xl font-bold text-green-500">{{ $barangHariIni }}</p>
            </div>
            <!-- Total Barang Keluar -->
            <div class="bg-white shadow p-6 rounded-lg text-center">
                <p class="text-gray-600">Total Barang Keluar</p>
                <p class="text-3xl font-bold text-red-500">{{ $totalBarangKeluar }}</p>
            </div>

            {{-- Tambahkan statistik lain jika ada --}}
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
                        <th class="py-2 px-4 text-left">Update</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentUpdates as $barang)
                    <tr>
                        <td class="py-2 px-4">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4">{{ $barang->kode_barang }}</td>
                        <td class="py-2 px-4">{{ $barang->nama_barang }}</td>
                        <td class="py-2 px-4">{{ $barang->kategori }}</td>
                        <td class="py-2 px-4">{{ $barang->jumlah }}</td>
                        <td class="py-2 px-4">{{ $barang->lokasi }}</td>
                        <td class="py-2 px-4">{{ $barang->keterangan }}</td>
                        <td>
                            <span class="text-sm text-gray-500">(update:
                                {{ $barang->updated_at->diffForHumans() }})</span>
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
    </div>
</body>

<script>
const ctx = document.getElementById('barangChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($grafikBarang['labels']),
        datasets: [{
            label: 'Barang Masuk',
            data: @json($grafikBarang['data']),
            backgroundColor: 'rgba(59, 130, 246, 0.7)'
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>

</html>
@endsection