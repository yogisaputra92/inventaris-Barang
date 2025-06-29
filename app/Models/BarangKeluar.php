<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{

    protected $fillable = [
        'barang_id',
        'kode_barang',
        'nama_barang',
        'kategori',
        'lokasi',
        'keterangan',
        'jumlah',
        'tujuan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

}
