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
        Schema::create('penjualan_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penjualan');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_satuan');
            $table->double('harga');
            $table->double('sub_total');
            $table->double('total');
            $table->timestamps();

            $table->foreign('id_penjualan')->references('id')->on('penjualan');
            $table->foreign('id_barang')->references('id')->on('barang');
            $table->foreign('id_satuan')->references('id')->on('satuan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan_barang');
    }
};
