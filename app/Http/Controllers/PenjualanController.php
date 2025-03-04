<?php

    namespace App\Http\Controllers;

    use App\Models\Barang;
    use App\Models\Pelanggan;
    use App\Models\Penjualan;
    use App\Models\PenjualanBarang;
    use App\Models\Satuan;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
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

            $poin_digunakan = $request->poin_digunakan;
            $total_setelah_poin = $total_setelah_diskon - $poin_digunakan;

            $total = $total_setelah_poin * 1.12;
            $kembali = $request->bayar - $total;

            $poin_membership = ($total * 2) /100;

            $penjualan = Penjualan::create([
                'id_pelanggan' => $request->id_pelanggan,
                'tanggal' => Carbon::now(),
                'subtotal' => $subtotal,
                'diskon' => $diskon,
                'poin_digunakan' => $poin_digunakan,
                'ppn' => 1.12,
                'total' => $total,
                'bayar' => $request->bayar,
                'kembali' => $kembali ?? 0,
                'created_by' => Auth::user()->id,
            ]);

            $pelanggan = Pelanggan::find($request->id_pelanggan);
            if ($pelanggan) {
                if ($poin_digunakan > $pelanggan->poin_membership) {
                    return back()->with('error', 'Poin yang digunakan melebihi poin yang tersedia.');
                }

                $pelanggan->poin_membership -= $poin_digunakan;

                // Periksa tipe pelanggan, hanya pelanggan dengan tipe selain "biasa" yang mendapatkan poin
                if ($pelanggan->tipe_pelanggan !== 'biasa') {
                    $pelanggan->poin_membership += $poin_membership;
                }

                $pelanggan->save();
            }

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


        public function nota($id)
        {
            $data = Penjualan::where('penjualan.id', $id)
                ->join('pelanggan', 'penjualan.id_pelanggan', '=', 'pelanggan.id')
                ->join('users', 'penjualan.created_by', '=', 'users.id') // Join ke tabel users
                ->select(
                    'penjualan.id AS id_penjualan',
                    'penjualan.id_pelanggan',
                    'pelanggan.nama AS nama_pelanggan',
                    'pelanggan.tipe_pelanggan AS tipe_pelanggan',
                    'penjualan.tanggal',
                    'penjualan.total',
                    'penjualan.bayar',
                    'penjualan.created_by',
                    'users.name AS nama_user', // Ambil nama user
                    'penjualan.created_at'
                )
                ->first(); // Mengambil satu transaksi

            // Ambil detail barang terkait
            $barang = PenjualanBarang::where('id_penjualan', $id)
                ->join('barang', 'penjualan_barang.id_barang', '=', 'barang.id')
                ->select(
                    'penjualan_barang.id_barang',
                    'barang.nama_barang AS nama_barang',
                    'penjualan_barang.jumlah',
                    'penjualan_barang.harga'
                )
                ->get();

            return view('penjualan.nota', compact('data', 'barang'));
        }

    }
