<?php

    namespace App\Http\Controllers;

    use App\Models\Barang;
    use App\Models\Pelanggan;
    use App\Models\Penjualan;
    use App\Models\PenjualanBarang;
    use App\Models\Satuan;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use function Laravel\Prompts\alert;

    class PenjualanController extends Controller
    {
        public function index()
        {
            $penjualan = Penjualan::with('pelanggan', 'penjualanBarang.barang')->get();
            return view('penjualan.index', compact('penjualan'));
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
                'diskon' => 'nullable',
                'poin_digunakan' => 'nullable',
                'ppn' => 'nullable|numeric|min:0|max:10',
                'bayar' => 'required',
                'kembali' => 'nullable',
                'created_by' => 'nullable',
                'updated_by' => 'nullable',
                'penjualan_barang' => 'required|array|min:1'
            ]);

            $subtotal = 0;

            foreach ($request->penjualan_barang as $penjualan_barang) {
                $subtotal += $penjualan_barang['jumlah'] * $penjualan_barang['harga'];
            }

            $diskon = $request->diskon ? ($subtotal * $request->diskon) / 100 : 0;

            $total_setelah_diskon = $subtotal - $diskon;
            $total = $total_setelah_diskon * 1.12;
            $kembali = $request->bayar - $total;

            $penjualan = Penjualan::create([
                'id_pelanggan' => $request->id_pelanggan,
                'no_penjualan' => $request->no_penjualan,
                'tanggal' => Carbon::now(),
                'subtotal' => $subtotal,
                'diskon' => $diskon,
                'poin_digunakan' => $request->poin_digunakan ?? 0,
                'ppn' => 1.12,
                'total' => $total,
                'bayar' => $request->bayar,
                'kembali' => $kembali ?? 0,
            ]);

            $record_penjualan_barang = [];
            foreach ($request->penjualan_barang as $penjualan_barang) {
                $barang = Barang::find($penjualan_barang['id_barang']);

                if ($barang) {
                    $barang->stok -= $penjualan_barang['jumlah'];
                    $barang->save();
                }

                $record_penjualan_barang[] = [
                    'id_penjualan' => $penjualan->id,
                    'id_barang' => $penjualan_barang['id_barang'],
                    'id_satuan' => $penjualan_barang['id_satuan'],
                    'jumlah' => $penjualan_barang['jumlah'],
                    'harga' => $penjualan_barang['harga'],
                    'sub_total' => $penjualan_barang['jumlah'] * $penjualan_barang['harga'],
                    'total' => $penjualan_barang['total'],
                ];
            }

            PenjualanBarang::insert($record_penjualan_barang);

            return redirect()->route('penjualan')->with('success', 'Penjualan Berhasil Ditambahkan');
        }
    }
