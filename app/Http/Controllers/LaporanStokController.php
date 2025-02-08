<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanStokController extends Controller
{
    public function index()
    {
        return view('laporan.stok_barang.index');
    }
}
