<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    public function index()
    {
        $laporanPenjualan = Penjualan::with('pelanggan')->get();
        return view('laporan.penjualan.index', compact('laporanPenjualan'));
    }
}
