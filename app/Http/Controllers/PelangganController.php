<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('master.pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('master.pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|string',
            'jenis_kelamin' => 'required',
            'tipe_pelanggan' => 'required',
            'poin_membership' => 'nullable',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tipe_pelanggan' => $request->tipe_pelanggan,
            'poin_membership' => $request->poin_membership,
        ]);

        return redirect()->route('master.pelanggan')->with('success', 'Data pelanggan berhasil ditambah');
    }

    public function getPelanggan($id)
    {
        $pelanggan = Pelanggan::find($id);

        if ($pelanggan) {
            return response()->json([
                'tipe_pelanggan' => $pelanggan->tipe_pelanggan,
                'poin_membership' => $pelanggan->poin_membership
            ]);
        }

        return response()->json(null, 404);
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('master.pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|string',
            'jenis_kelamin' => 'required',
            'tipe_pelanggan' => 'required',
            'poin_membership' => 'nullable',
        ]);

        $pelanggan->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tipe_pelanggan' => $request->tipe_pelanggan,
            'poin_membership' => $request->poin_membership,
        ]);

        return redirect()->route('master.pelanggan')->with('success', 'Data pelanggan berhasil diubah');
    }

    public function delete($id)
    {
        $data = Pelanggan::find($id);
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Barang tidak ditemukan'
            ]);
        }
        try {
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Barang berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data'
            ]);
        }
    }
}
