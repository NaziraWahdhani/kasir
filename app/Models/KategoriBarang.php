<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriBarang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kategori_barang';

    protected $primaryKey = 'id';
    protected $fillable = ['kode_kategori', 'nama_kategori'];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_kategori_barang');
    }
}
