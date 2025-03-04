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
                    <div class="portlet">
                        <div class="portlet-header portlet-header-bordered">
                            <h3 class="portlet-title">Laporan Penjualan</h3>
                        </div>
                        <div class="portlet-body">
                            <div class="form-inline my-3">
                                <label class="mr-3">Periode</label>
                                <div class="input-group">
                                    {!! Form::date('tanggal_awal', date('01-m-Y'), ['class' => 'form-control', 'id' => 'tanggalAwal', 'data-input-type' => 'datepicker', 'autocomplete' => 'off']) !!}
                                    <div class="input-group-append"></div>
                                </div>
                                <span class="mr-3 ml-3"> - </span>
                                <div class="input-group">
                                    {!! Form::date('tanggal_akhir', date('d-m-Y'), ['class' => 'form-control', 'id' => 'tanggalAkhir', 'data-input-type' => 'datepicker', 'autocomplete' => 'off']) !!}
                                    <div class="input-group-append"></div>
                                </div>
                                <button type="button" class="btn btn-info ml-3" id="btnFilter" onclick="filter()">Filter</button>
                                <div class="ml-auto">
                                    <button type="button" id="btnExport" class="btn btn-success">Export Excel</button>
                                    {{--{!! present()->button('cetak', 'Export Excel', 'cetak()', 'class="btn btn-success ml-2"') !!}--}}
                                </div>
                            </div>
                            @include('layouts.partials.message')
                            <table id="table" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
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
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        var dataTable;
        $(function() {
            dataTable = $('#table').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '',
                columns: [
                    {data: 'created_by', name: 'user.name'},
                    {data: 'tanggal', name: 'penjualan.tanggal'},
                    {data: 'nama_pelanggan', name: 'pelanggan.nama'},
                    {data: 'tipe_pelanggan', name: 'pelanggan.tipe_pelanggan'},
                    {data: 'subtotal', class: 'text-right'},
                    {data: 'diskon', name: 'penjualan.diskon'},
                    {data: 'poin_digunakan', name: 'penjualan.poin_digunakan'},
                    {data: 'total', name: 'penjualan.total', class: 'text-right'},
/*
                    {data: '_', searchable: false, orderable: false, class: 'text-right nowrap'}
*/
                ]
            });

            $('#btnExport').click(function () {
                document.location.href = '{{ route('laporan-penjualan.cetak') }}?tanggal_awal=' + $('#tanggalAwal').val() + '&tanggal_akhir=' + $('#tanggalAkhir').val();
            })
        });

        function filter() {
            dataTable.ajax.url('{{ route('laporan-penjualan') }}?tanggal_awal=' + $('#tanggalAwal').val() + '&tanggal_akhir=' + $('#tanggalAkhir').val()).load();
        }
    </script>
@endpush
