<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'lokasi',
        'jumlah',
        'keterangan',
        'tujuan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

}
