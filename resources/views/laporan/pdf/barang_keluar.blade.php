<h2>Laporan Barang Keluar</h2>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Kode</th><th>Nama</th><th>Kategori</th><th>Jumlah</th><th>Tujuan</th><th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangKeluars as $keluar)
        <tr>
            <td>{{ $keluar->kode_barang }}</td>
            <td>{{ $keluar->nama_barang }}</td>
            <td>{{ $keluar->kategori }}</td>
            <td>{{ $keluar->jumlah }}</td>
            <td>{{ $keluar->tujuan }}</td>
            <td>{{ $keluar->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
