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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kategori_barang');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->date('tanggal_kedaluarsa');
            $table->date('tanggal_pembelian');
            $table->decimal('harga_beli', 10, 2);
            $table->decimal('harga_jual_1', 10, 2);
            $table->decimal('harga_jual_2', 10, 2);
            $table->decimal('harga_jual_3', 10, 2);
            $table->unsignedInteger('stok');
            $table->unsignedInteger('minimal_stok');
            $table->timestamps();

            $table->foreign('id_kategori_barang')->references('id')->on('kategori_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
