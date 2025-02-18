<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'alamat', 'no_hp', 'jenis_kelamin', 'tipe_pelanggan', 'poin_membership',];

    public function penjualan()
    {
        return $this->HasMany(Penjualan::class, 'id_pelanggan');
    }
}
