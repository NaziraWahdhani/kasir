<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id';

    protected $fillable = ['id_kategori_barang', 'kode_barang', 'nama_barang', 'tanggal_kedaluarsa', 'tanggal_pembelian', 'harga_beli', 'harga_jual_1', 'harga_jual_2', 'harga_jual_3', 'stok', 'minimal_stok', 'id_satuan'];

    public function kategori()
    {
        // belongsTo(KategoriBarang::class, 'id_kategori_barang') → Menunjukkan bahwa setiap barang memiliki satu kategori yang diambil dari tabel kategori_barang
        return $this->belongsTo(KategoriBarang::class, 'id_kategori_barang');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

}
