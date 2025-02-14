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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->string('no_penjualan')->unique();
            $table->date('tanggal');
            $table->unsignedBigInteger('id_barang');
            $table->string('jumlah');
            $table->double('subtotal');
            $table->double('diskon');
            $table->double('poin_digunakan')->nullable();
            $table->double('ppn');
            $table->double('total');
            $table->double('bayar');
            $table->double('kembali')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
