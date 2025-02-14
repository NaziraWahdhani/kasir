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
            'kode_kategori' => 'required|string|max:255',
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriBarang::create([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('master.kategori-barang')->with('success', 'Berhasil Menambah Kategori Barang');
    }

    public function edit($id)
    {
        $kategoriBarang = KategoriBarang::findOrFail($id);
        return view('master.kategori_barang.edit', compact( 'kategoriBarang'));
    }

    public function update(Request $request, $id)
    {
        $kategoriBarang = KategoriBarang::findOrFail($id);

        $request->validate([
            'kode_kategori' => 'required|string|max:255',
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategoriBarang->update([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('master.kategori-barang')->with('success', 'Data kategori barang berhasil diperbarui');
    }

    public function delete($id)
    {
        $data = KategoriBarang::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori Barang tidak ditemukan'
            ]);
        }

        try {
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Kategori Barang berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data'
            ]);
        }
    }
}
