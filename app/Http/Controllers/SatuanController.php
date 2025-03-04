<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $data = Satuan::all();
        return view('master.satuan.index', compact('data'));
    }

    public function create()
    {
        return view('master.satuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'satuan' => 'required',
        ]);

        Satuan::create($request->all());

        return redirect()->route('master.satuan')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('master.satuan.edit', compact('satuan'));
    }

    public function update(Request $request, $id)
    {
        $satuan = Satuan::findOrFail($id);

        $satuan->update($request->all());
        return redirect()->route('master.satuan')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $satuan = Satuan::find($id);
        if (!$satuan) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori Barang tidak ditemukan'
            ]);
        }

        try {
            $satuan->delete();
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
