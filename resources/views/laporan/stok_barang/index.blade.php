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
            <h4 class="header-title">Laporan Stok Barang</h4>
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
                    <a href="{{ route('laporan-stok') }}" class="breadcrumb-item">
                        <span class="breadcrumb-text">Laporan Stok Barang</span>
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
                            <h3 class="portlet-title">Laporan Stok Barang</h3>
{{--                            <a href="">--}}
{{--                                <button class="btn btn-primary">Tambah</button>--}}
{{--                            </a>--}}
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
                            <table id="table" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Stok</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Tanggal Kedaluarsa</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Portlet -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
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
                    {data: 'nama_barang', name: 'nama_barang'},
                    {data: 'stok', name: 'stok'},
                    {data: 'tanggal_pembelian', name: 'tanggal_pembelian'},
                    {data: 'tanggal_kedaluarsa', name: 'tanggal_kedaluarsa'}
                    /*
                                        {data: '_', searchable: false, orderable: false, class: 'text-right nowrap'}
                    */
                ]
            });

            $('#btnExport').click(function () {
                document.location.href = '{{ route('laporan-stok.cetak') }}?tanggal_awal=' + $('#tanggalAwal').val() + '&tanggal_akhir=' + $('#tanggalAkhir').val();
            })
        });

        function filter() {
            dataTable.ajax.url('{{ route('laporan-stok') }}?tanggal_awal=' + $('#tanggalAwal').val() + '&tanggal_akhir=' + $('#tanggalAkhir').val()).load();
        }
    </script>
@endpush
