<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
    
            // Duplikasi data barang saat keluar
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('kategori');
            $table->string('lokasi');
            $table->string('keterangan')->nullable();
    
            $table->integer('jumlah'); // jumlah keluar
            $table->string('tujuan')->nullable();
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluars');
    }
};
