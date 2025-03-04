<?php

namespace App\Http\Controllers;

use App\Library\Locale;
use App\Models\Barang;
use App\Models\PenjualanBarang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\Facades\DataTables;

class LaporanStokController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tanggalAwal = request('tanggal_awal') ? Carbon::createFromFormat('d-m-Y', request('tanggal_awal'))->format('Y-m-d') : null;
            $tanggalAkhir = request('tanggal_akhir') ? Carbon::createFromFormat('d-m-Y', request('tanggal_akhir'))->format('Y-m-d') : null;

            $model = Barang::when($tanggalAwal, function ($query) use ($tanggalAwal) {
                $query->whereDate('created_at', '>=', $tanggalAwal);
            })
                ->when($tanggalAkhir, function ($query) use ($tanggalAkhir) {
                    $query->whereDate('created_at', '<=', $tanggalAkhir);
                });

            return DataTables::of($model)
                ->editColumn('created_at', function ($data) {
                    return Carbon::parse($data->created_at)->format('d-m-Y'); // Output dalam format yang diinginkan
                })
                ->addColumn('nama_barang', function ($data) {
                    return $data->nama_barang;
                })
                ->editColumn('tanggal_pembelian', function ($data) {
                    return $data->tanggal_pembelian ? Carbon::parse($data->tanggal_pembelian)->format('d-m-Y') : '-';
                })
                ->editColumn('tanggal_kedaluarsa', function ($data) {
                    return $data->tanggal_kedaluarsa ? Carbon::parse($data->tanggal_kedaluarsa)->format('d-m-Y') : '-';
                })
                ->rawColumns(['nama_barang', 'tanggal_pembelian', 'tanggal_kedaluarsa'])
                ->make(true);
        }

        return view('laporan.stok_barang.index');
    }

    public function cetak() {
        $templatePath = public_path('laporan/stok_barang/stok-barang.xlsx');
        if (!file_exists($templatePath)) {
            return response()->json(['error' => 'Template Excel tidak ditemukan.'], 404);
        }

        $spreadsheet = IOFactory::load($templatePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $file_name = [];
        $cols = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $file_name[] = 'stok-barang';
        $style = array(
            'borders' => array(
                'bottom' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ),
                'left' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ),
                'right' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ),
            ),
        );

        $model = Barang::select(
            'barang.nama_barang',
            'barang.stok',
            'barang.tanggal_pembelian',
            'barang.tanggal_kedaluarsa',
        )
            ->when(request()->filled('tanggal_awal'), function($query) {
                $query->where('barang.created_at', '>=', date('Y-m-d', strtotime(request('tanggal_awal'))));
            })
            ->when(request()->filled('tanggal_akhir'), function($query) {
                $query->where('barang.created_at', '<=', date('Y-m-d', strtotime(request('tanggal_akhir'))));
            })->get();

        $tanggal_awal = request('tanggal_awal');
        $tanggal_akhir = request('tanggal_akhir');

        $row = 6;
        $no = 1;
        $worksheet->getCell('A1')->setValue('Stok Barang');
        $worksheet->getCell('A3')->setValue(date('Y-m-d H:i:s'));
        $worksheet->getCell('A5')->setValue('No');
        $worksheet->getCell('B5')->setValue('Barang');
        $worksheet->getCell('C5')->setValue('Stok');
        $worksheet->getCell('D5')->setValue('Tanggal Pembelian');
        $worksheet->getCell('E5')->setValue('Tanggal Kedaluarsa');

        $worksheet->getStyle('A5:E5')->applyFromArray([
            'font' => ['bold' => true],
            'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ]);

        foreach ($model as $value) {
            $worksheet->getCell('A' . $row)->setValue($no);
            $worksheet->getCell('B' . $row)->setValue($value->nama_barang);
            $worksheet->getCell('C' . $row)->setValue($value->stok);
            $worksheet->getCell('D' . $row)->setValue($value->tanggal_pembelian ? Carbon::parse($value->tanggal_pembelian)->format('d-m-Y') : '-');
            $worksheet->getCell('E' . $row)->setValue($value->tanggal_kedaluarsa ? Carbon::parse($value->tanggal_kedaluarsa)->format('d-m-Y') : '-');
            for ($i = 0; $i < 5; $i++) {
                $spreadsheet->getActiveSheet()->getStyle($cols[$i] . $row)->applyFromArray($style);
            }
            $no++;
            $row++;
        }
        $fileName = "Smart-Kasir-Laporan-Stok-Barang-{$tanggal_awal}-{$tanggal_akhir}.xlsx";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save("php://output");
        exit;
    }
}
