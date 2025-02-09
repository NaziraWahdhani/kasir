<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $data = KategoriBarang::all();
        return view('master.kategori_barang.index', compact('data'));
    }

    public function create()
    {
        return view('master.kategori_barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);

        KategoriBarang::create([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('master.kategori-barang')->with('success', 'Berhasil Menambah Kategori Barang');
    }

    public function delete($id)
    {
        $data = KategoriBarang::find($id);
        if ($data) {
            if ($data->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Kategori Produk berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Kategori Produk gagal dihapus'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kategori Produk tidak ditemukan'
            ]);
        }
    }
}
