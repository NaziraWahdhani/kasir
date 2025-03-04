<?php

namespace App\Http\Controllers;

use App\Library\Locale;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;

class LaporanPenjualanController extends Controller
{
    public function index() {
        $title = 'Laporan Penjualan';
        if (request()->ajax()) {
            $model = Penjualan::with('pelanggan', 'user')
                ->when(request()->filled('tanggal_awal'), function($query) {
                    $query->where('penjualan.tanggal', '>=', date('Y-m-d', strtotime(request('tanggal_awal'))));
                })
                ->when(request()->filled('tanggal_akhir'), function($query) {
                    $query->where('penjualan.tanggal', '<=', date('Y-m-d', strtotime(request('tanggal_akhir'))));
                });
            return DataTables::of($model)
                ->editColumn('created_by', function ($data) {
                    return $data->user ? $data->user->name : 'N/A';
                })
                ->editColumn('tanggal', function($data) {
                    return Locale::humanDate($data->tanggal);
                })
                ->editColumn('nama_pelanggan', function($data) {
                    return $data->pelanggan->nama;
                })
                ->editColumn('tipe_pelanggan', function($data) {
                    return $data->pelanggan->tipe_pelanggan;
                })
                ->addColumn('subtotal', function($data) {
                    return Locale::numberFormat($data->subtotal ?? null);
                })
                ->editColumn('total', function($data) {
                    return Locale::numberFormat($data->total ?? null);
                })
                ->rawColumns(['_', 'created_by', 'tanggal','nama_pelanggan', 'tipe_pelanggan', 'subtotal', 'total'])
                ->make(true);
        }
        return view('laporan.penjualan.index');
    }

    public function cetak() {
        $templatePath = public_path('laporan/penjualan/penjualan.xlsx');
        if (!file_exists($templatePath)) {
            return response()->json(['error' => 'Template Excel tidak ditemukan.'], 404);
        }

        $spreadsheet = IOFactory::load($templatePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $file_name = [];
        $cols = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $file_name[] = 'penjualan';
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

        $model = Penjualan::select(
            'penjualan.tanggal',
            'penjualan.subtotal',
            'penjualan.diskon',
            'penjualan.poin_digunakan',
            'penjualan.total',
            'pelanggan.nama as nama_pelanggan',
            'pelanggan.tipe_pelanggan'
        )
            ->leftJoin('pelanggan', 'penjualan.id_pelanggan', '=', 'pelanggan.id')
            ->when(request()->filled('tanggal_awal'), function($query) {
                $query->where('penjualan.tanggal', '>=', date('Y-m-d', strtotime(request('tanggal_awal'))));
            })
            ->when(request()->filled('tanggal_akhir'), function($query) {
                $query->where('penjualan.tanggal', '<=', date('Y-m-d', strtotime(request('tanggal_akhir'))));
            })->get();

        $tanggal_awal = request('tanggal_awal');
        $tanggal_akhir = request('tanggal_akhir');

        $row = 6;
        $no = 1;
        $worksheet->getCell('A1')->setValue('Penjualan');
        $worksheet->getCell('A3')->setValue(date('Y-m-d H:i:s'));
        $worksheet->getCell('A5')->setValue('No');
        $worksheet->getCell('B5')->setValue('Tanggal & waktu transaksi');
        $worksheet->getCell('C5')->setValue('Nama Kasir');
        $worksheet->getCell('D5')->setValue('Tipe pelanggan');
        $worksheet->getCell('E5')->setValue('Subtotal');
        $worksheet->getCell('F5')->setValue('Diskon');
        $worksheet->getCell('G5')->setValue('Poin digunakan');
        $worksheet->getCell('H5')->setValue('Total');

        $worksheet->getStyle('A5:H5')->applyFromArray([
            'font' => ['bold' => true],
            'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ]);

        foreach ($model as $value) {
            $worksheet->getCell('A' . $row)->setValue($no);
            $worksheet->getCell('B' . $row)->setValue($value->tanggal);
            $worksheet->getCell('C' . $row)->setValue($value->nama_pelanggan ?? '-');
            $worksheet->getCell('D' . $row)->setValue($value->tipe_pelanggan ?? '-');
            $worksheet->getCell('E' . $row)->setValue($value->subtotal ?? 0);
            $worksheet->getCell('F' . $row)->setValue($value->diskon ?? 0);
            $worksheet->getCell('G' . $row)->setValue($value->poin_digunakan ?? 0);
            $worksheet->getCell('H' . $row)->setValue($value->total ?? 0);
            for ($i = 0; $i < 8; $i++) {
                $spreadsheet->getActiveSheet()->getStyle($cols[$i] . $row)->applyFromArray($style);
            }
            $no++;
            $row++;
        }
        $fileName = "Smart-Kasir-Laporan-Penjualan-{$tanggal_awal}-{$tanggal_akhir}.xlsx";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save("php://output");
        exit;
    }
}
