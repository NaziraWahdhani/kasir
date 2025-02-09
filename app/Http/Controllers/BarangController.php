<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return view('master.barang.index');
    }

    public function create()
    {
        $kategoriBarang = KategoriBarang::all();
        return view('master.barang.create', compact('kategoriBarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori_barang' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'tanggal_kedaluarsa' => 'required',
            'tanggal_pembelian' => 'required',
            'harga_beli' => 'required',
            'harga_jual_1' => 'required',
            'harga_jual_2' => 'required',
            'harga_jual_3' => 'required',
            'stok' => 'required',
            'minimal_stok' => 'required',
        ]);

        Barang::create([
            'id_kategori_barang' => $request->id_kategori_barang,
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'tanggal_kedaluarsa' => $request->tanggal_kedaluarsa,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'harga_beli' => $request->harga_beli,
            'harga_jual_1' => $request->harga_jual_1,
            'harga_jual_2' => $request->harga_jual_2,
            'harga_jual_3' => $request->harga_jual_3,
            'stok' => $request->stok,
            'minimal_stok' => $request->minimal_stok
        ]);

        return redirect()->route('master.barang')->with('success', 'Barang berhasil ditambahkan');
    }
}
