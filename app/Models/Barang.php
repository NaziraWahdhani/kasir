<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id';

    protected $fillable = ['id_kategori_barang', 'kode_barang', 'nama_barang', 'tanggal_kedaluarsa', 'tanggal_pembelian', 'harga_beli', 'harga_jual_1', 'harga_jual_2', 'harga_jual_3', 'stok', 'minimal_stok'];
}
