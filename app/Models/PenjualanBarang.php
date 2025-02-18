<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanBarang extends Model
{
    use HasFactory;
    protected $table = 'penjualan_barang';
    protected $primaryKey = 'id';
    protected $fillable = ['id_penjualan', 'id_barang', 'id_satuan', 'jumlah', 'harga', 'sub_total', 'total'];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
