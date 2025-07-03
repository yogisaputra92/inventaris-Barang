<h2>Laporan Barang Masuk</h2>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Kode</th><th>Nama</th><th>Kategori</th><th>Jumlah</th><th>Lokasi</th><th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangs as $barang)
        <tr>
            <td>{{ $barang->kode_barang }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->kategori }}</td>
            <td>{{ $barang->jumlah }}</td>
            <td>{{ $barang->lokasi }}</td>
            <td>{{ $barang->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
