<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Satuan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('penjualan.index');
    }

    public function create()
    {
        $satuans = Satuan::all();
        $pelanggan = Pelanggan::all();
        $barang = Barang::all();
        return view('penjualan.create', compact('pelanggan', 'barang', 'satuans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'no_penjualan' => 'required',
            'tanggal' => 'required|date',
            'id_barang' => 'required',
            'jumlah' => 'required|integer',
            'diskon' => 'required',
            'poin_digunakan' => 'nullable',
            'ppn' => 'required',
            'total' => 'required',
            'bayar' => 'required',
            'kembali' => 'nullable',
            'created_by' => 'nullable',
            'updated_by' => 'nullable'
        ]);

        $pelanggan = Pelanggan::findOrFail($request->id_pelanggan);
        $barang = Barang::findOrFail($request->id_barang);

        if ($pelanggan->tipe_pelanggan == 'VVIP') {
            $harga_jual = $barang->harga_jual_1;
        } elseif ($pelanggan->tipe_pelanggan == 'VIP') {
            $harga_jual = $barang->harga_jual_2;
        } elseif ($pelanggan->tipe_pelanggan == 'Biasa') {
            $harga_jual = $barang->harga_jual_3;
        }

        $subtotal = $harga_jual * $request->jumlah;
        $total_setelah_diskon = $subtotal - $request->diskon;
        $total = $total_setelah_diskon * 1.12;

        Penjualan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'no_penjualan' => $request->no_penjualan,
            'tanggal' => $request->tanggal,
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'subtotal' => $subtotal,
            'diskon' => $request->diskon,
            'poin_digunakan' => $request->poin_digunakan ?? 0,
            'ppn' => $request->ppn,
            'total' => $total,
            'bayar' => $request->bayar,
            'kembali' => $request->kembali ?? 0,
        ]);

    }

}
