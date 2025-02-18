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
            <h4 class="header-title">Penjualan</h4>
            <i class="header-divider"></i>
            <div class="header-wrap header-wrap-block justify-content-start">
                <!-- BEGIN Breadcrumb -->
                <div class="breadcrumb">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item">
                        <div class="breadcrumb-icon">
                            <i data-feather="home"></i>
                        </div>
                        <span class="breadcrumb-text">Dashboard</span> </a>
                    <a href="{{ route('penjualan') }}" class="breadcrumb-item">
                        <span class="breadcrumb-text">Penjualan</span> </a>
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
                            <h3 class="portlet-title">Penjualan</h3>
                            <a href="{{ route('penjualan.create') }}">
                                <button class="btn btn-primary">Tambah</button>
                            </a>
                        </div>
                        <div class="portlet-body">
                            <!-- BEGIN Datatable -->
                            <table id="datatable-1" class="table table-bordered table-striped table-hover">
                                {{--<thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($penjualan as $data)
                                    @php $rowspan = $data->penjualanBarang->count(); @endphp
                                    @foreach($data->penjualanBarang as $index => $item)
                                        <tr>
                                            @if($index == 0)
                                                <td rowspan="{{ $rowspan }}">{{ date('d-m-Y', strtotime($data->tanggal)) }}</td>
                                                <td rowspan="{{ $rowspan }}">{{ $data->pelanggan->nama }}</td>
                                            @endif
                                            @if($index == 0)
                                                <td rowspan="{{ $rowspan }}">{{ number_format($data->total, 0, ',', '.') }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>--}}
                                <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>No Penjualan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Total</th>
                                    <th width="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($penjualan as $data)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($data->tanggal)) }}</td>
                                        <td>{{ $data->no_penjualan }}</td>
                                        <td>{{ $data->pelanggan->nama }}</td>
                                        <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>
                                        <td class="d-flex">
                                            <a href="{{--{{ route('master.barang.edit', ['id' => $data->id]) }}--}}"><button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                            @method('DELETE')
                                            <button class="btn btn-danger delete-btn" data-id="{{ $data->id }}"><i class="fa fa-trash"></i></button>
                                        </td>
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
