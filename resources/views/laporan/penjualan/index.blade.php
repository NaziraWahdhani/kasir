@extends('layouts.main')
@section('content')
    <!-- BEGIN Preload -->
    <div class="preload">
        <div class="preload-dialog">
            <!-- BEGIN Spinner -->
            <div class="spinner-border text-primary preload-spinner"></div>
            <!-- END Spinner -->
        </div>
    </div>
    <!-- END Preload -->

    <div class="header-holder header-holder-desktop">
        <div class="header-container container-fluid">
            <h4 class="header-title">Laporan Penjualan</h4>
            <i class="header-divider"></i>
            <div class="header-wrap header-wrap-block justify-content-start">
                <!-- BEGIN Breadcrumb -->
                <div class="breadcrumb">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item">
                        <div class="breadcrumb-icon">
                            <i data-feather="home"></i>
                        </div>
                        <span class="breadcrumb-text">Dashboard</span>
                    </a>
                    <div class="breadcrumb-item">
                        <span class="breadcrumb-text">Laporan</span>
                    </div>
                    <a href="{{ route('laporan-penjualan') }}" class="breadcrumb-item">
                        <span class="breadcrumb-text">Laporan Penjualan</span>
                    </a>
                </div>
                <!-- END Breadcrumb -->
            </div>
            <div class="header-wrap">
                <button class="btn btn-label-info btn-icon ml-2" id="fullscreen-trigger" data-toggle="tooltip" title="Toggle fullscreen" data-placement="left">
                    <i class="fa fa-expand fullscreen-icon-expand"></i>
                    <i class="fa fa-compress fullscreen-icon-compress"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- END Header Holder -->
    <div class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- BEGIN Portlet -->
                    <div class="portlet">
                        <div class="portlet-header portlet-header-bordered">
                            <h3 class="portlet-title">Laporan Penjualan</h3>
                        </div>
                        <div class="portlet-body">
                            <!-- BEGIN Datatable -->
                            <table id="datatable-1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kasir</th>
                                    <th>Tanggal & Waktu Transaksi</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tipe Pelanggan</th>
                                    <th>Total Pembelanjaan</th>
                                    <th>Diskon</th>
                                    <th>Poin Membership yang Digunakan</th>
                                    <th>Total Akhir</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($laporanPenjualan as $laporan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>Kasir</td>
                                    <td>{{ date('d-m-Y', strtotime($laporan->tanggal)) }}</td>
                                    <td>{{ $laporan->pelanggan->nama }}</td>
                                    <td>{{ $laporan->pelanggan->tipe_pelanggan }}</td>
                                    <td>Rp. {{ number_format($laporan->subtotal, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($laporan->diskon, 0, ',', '.') }}</td>
                                    <td>{{ $laporan->poin_digunakan }}</td>
                                    <td>Rp. {{ number_format($laporan->total, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- END Datatable -->
                        </div>
                    </div>
                    <!-- END Portlet -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
