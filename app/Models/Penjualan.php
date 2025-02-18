<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $primaryKey = 'id';
    protected $fillable = ['id_pelanggan', 'no_penjualan', 'tanggal', 'subtotal', 'diskon', 'poin_digunakan', 'ppn', 'total', 'bayar', 'kembali', 'created_by', 'updated_by'];

    public function penjualanBarang()
    {
        return $this->HasMany(PenjualanBarang::class, 'id_penjualan');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

}
