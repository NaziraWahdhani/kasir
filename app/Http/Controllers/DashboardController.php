<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barang::whereColumn('stok', '<=', 'minimal_stok')->get();

        // Hitung total penjualan dalam 1 minggu terakhir
        $totalPenjualan = Penjualan::where('tanggal', '>=', Carbon::now()->subWeek())->sum('total');

        // Hitung jumlah total stok barang
        $totalStok = Barang::sum('stok');

        // Hitung jumlah pelanggan
        $totalPelanggan = Pelanggan::count();

        return view('dashboard.index', compact('barang', 'totalPenjualan', 'totalStok', 'totalPelanggan'));
    }

    public function getDataPenjualan()
    {
        $penjualanPerHari = Penjualan::select(
            DB::raw('DATE(created_at) as tanggal'),
            DB::raw('SUM(total) as total_penjualan')
        )
            ->where('created_at', '>=', Carbon::now()->subDays(6))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('tanggal', 'asc')
            ->get();

        $chartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($penjualanPerHari as $penjualan) {
            $chartData['labels'][] = Carbon::parse($penjualan->tanggal)->format('d M');
            $chartData['data'][] = $penjualan->total_penjualan;
        }

        return response()->json($chartData);
    }



}
