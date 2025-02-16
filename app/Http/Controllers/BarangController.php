<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Models\Satuan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('master.barang.index', compact('barang'));
    }

    public function create()
    {
        $satuans = Satuan::all();
        $kategoriBarang = KategoriBarang::all();
        return view('master.barang.create', compact('kategoriBarang', 'satuans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'id_kategori_barang' => 'required|integer',
            'tanggal_kedaluarsa' => 'required|date',
            'tanggal_pembelian' => 'required|date',
            'harga_beli' => 'required|numeric',
            'harga_jual_1' => 'required',
            'harga_jual_2' => 'required',
            'harga_jual_3' => 'required',
            'stok' => 'required|integer',
            'minimal_stok' => 'required|integer',
            'id_satuan' => 'required|integer',
        ]);

        $harga_beli = $request->harga_beli;
        $harga_jual_1 = $harga_beli * 1.10; //+10%
        $harga_jual_2 = $harga_beli * 1.20; //+20%
        $harga_jual_3 = $harga_beli * 1.30; //+30%

        Barang::create([
            'id_kategori_barang' => $request->id_kategori_barang,
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'tanggal_kedaluarsa' => Carbon::createFromFormat('m/d/Y', $request->tanggal_kedaluarsa)->format('Y-m-d'),
            'tanggal_pembelian' => Carbon::createFromFormat('m/d/Y', $request->tanggal_pembelian)->format('Y-m-d'),
            'harga_beli' => $harga_beli,
            'harga_jual_1' => $harga_jual_1,
            'harga_jual_2' => $harga_jual_2,
            'harga_jual_3' => $harga_jual_3,
            'stok' => $request->stok,
            'minimal_stok' => $request->minimal_stok,
            'id_satuan' => $request->id_satuan
        ]);

        return redirect()->route('master.barang')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoriBarang = KategoriBarang::all();
        return view('master.barang.edit', compact('barang', 'kategoriBarang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'id_kategori_barang' => 'required|integer',
            'tanggal_kedaluarsa' => 'required|date',
            'tanggal_pembelian' => 'required|date',
            'harga_beli' => 'required|numeric',
            'harga_jual_1' => 'required',
            'harga_jual_2' => 'required',
            'harga_jual_3' => 'required',
            'stok' => 'required|integer',
            'minimal_stok' => 'required|integer',
            'id_satuan' => 'required|integer',
        ]);

        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'id_kategori_barang' => $request->id_kategori_barang,
            'tanggal_kedaluarsa' => $request->tanggal_kedaluarsa,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'harga_beli' => $request->harga_beli,
            'harga_jual_1' => $request->harga_jual_1,
            'harga_jual_2' => $request->harga_jual_2,
            'harga_jual_3' => $request->harga_jual_3,
            'stok' => $request->stok,
            'minimal_stok' => $request->minimal_stok,
            'id_satuan' => $request->id_satuan
        ]);

        return redirect()->route('master.barang')->with('success', 'Data barang berhasil diperbarui');
    }

    public function delete($id)
    {
        $data = Barang::find($id);
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

    public function harga(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'tipe_pelanggan' => 'required|in:vvip,vip,biasa',
            'jumlah' => 'nullable|integer|min:1',
        ]);

        $id_barang = $request->id_barang;
        $tipe_pelanggan = strtolower($request->tipe_pelanggan);
        $jumlah = $request->jumlah ?? 1;

        $hargaBarang = Barang::find($id_barang);

        if (!$hargaBarang) {
            return response()->json(['success' => false, 'message' => 'Barang tidak ditemukan']);
        }

        $harga_jual = match ($tipe_pelanggan) {
            'vvip' => $hargaBarang->harga_jual_1,
            'vip' => $hargaBarang->harga_jual_2,
            'biasa' => $hargaBarang->harga_jual_3,
            default => $hargaBarang->harga_jual_3,
        };

        return response()->json([
            'success' => true,
            'harga' => $harga_jual,
            'jumlah' => $jumlah,
            'satuan' => $hargaBarang->satuan->satuan,
        ]);
    }


}
