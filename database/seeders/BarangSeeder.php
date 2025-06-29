<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Barang::create([
                'kode_barang'  => 'BRG' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama_barang'  => "Barang Dummy $i",
                'kategori'     => ['Elektronik', 'Alat Tulis', 'Kendaraan'][rand(0, 2)],
                'jumlah'       => rand(1, 50),
                'lokasi'       => ['Gudang A', 'Gudang B', 'Rak 1', 'Rak 2'][rand(0, 3)],
                'keterangan'   => "Ini adalah barang dummy ke-$i",
            ]);
        }
    }
}
