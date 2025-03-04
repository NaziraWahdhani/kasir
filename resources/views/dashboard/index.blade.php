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

    <!-- BEGIN Header Holder -->
    <div class="header-holder header-holder-desktop">
        <div class="header-container container-fluid">
            <h4 class="header-title">Dashboard</h4>
            <i class="header-divider"></i>
            <div class="header-wrap header-wrap-block justify-content-start">
                <!-- BEGIN Breadcrumb -->
                <div class="breadcrumb">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item">
                        <div class="breadcrumb-icon">
                            <i data-feather="home"></i>
                        </div>
                        <span class="breadcrumb-text">Dashboard</span> </a>
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
    <!-- BEGIN Page Content -->
    <div class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- BEGIN Portlet -->
                    <div class="portlet">
                        <!-- BEGIN Widget -->
                        <div class="widget10 widget10-vertical-md">
                            <div class="widget10-item">
                                <div class="widget10-content">
                                    <h2 class="widget10-title">Rp. {{ number_format($totalPenjualan, 0, ',', '.') }}</h2>
                                    <span class="widget10-subtitle">Total Penjualan Minggu ini</span>
                                </div>
                                <div class="widget10-addon">
                                    <!-- BEGIN Avatar -->
                                    <div class="avatar avatar-label-primary avatar-circle widget8-avatar m-0">
                                        <div class="avatar-display">
                                            <i class="fa fa-boxes"></i>
                                        </div>
                                    </div>
                                    <!-- END Avatar -->
                                </div>
                            </div>
                            <div class="widget10-item">
                                <div class="widget10-content">
                                    <h2 class="widget10-title">{{ number_format($totalStok, 0, ',', '.') }}</h2>
                                    <span class="widget10-subtitle">Total Stok Barang yang ada</span>
                                </div>
                                <div class="widget10-addon">
                                    <!-- BEGIN Avatar -->
                                    <div class="avatar avatar-label-success avatar-circle widget8-avatar m-0">
                                        <div class="avatar-display">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                    <!-- END Avatar -->
                                </div>
                            </div>
                            <div class="widget10-item">
                                <div class="widget10-content">
                                    <h2 class="widget10-title">{{ number_format($totalPelanggan, 0, ',', '.') }}</h2>
                                    <span class="widget10-subtitle">Total Pelanggan</span>
                                </div>
                                <div class="widget10-addon">
                                    <!-- BEGIN Avatar -->
                                    <div class="avatar avatar-label-danger avatar-circle widget8-avatar m-0">
                                        <div class="avatar-display">
                                            <i class="fa fa-link"></i>
                                        </div>
                                    </div>
                                    <!-- END Avatar -->
                                </div>
                            </div>
                        </div>
                        <!-- END Widget -->
                    </div>
                    <!-- END Portlet -->
                </div>
            </div>
                <div class="row">
                    <div class="col-8">
                        <!-- BEGIN Portlet -->
                        <div class="portlet">
                            <div class="portlet-header portlet-header-bordered">
                                <h3 class="portlet-title">Grafik Penjualan</h3>
                            </div>
                            <div class="portlet-body" style="height: 550px">
                                <canvas id="chartLine"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="portlet">
                            <div class="portlet-header portlet-header-bordered">
                                <h3 class="portlet-title">Daftar barang yang hampir habis</h3>
                            </div>
                            <div class="portlet-body">
                                <div style="max-height: 525px; overflow-y: auto;">
                                <table class="table table-striped table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Minimal stok</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($barang as $data)
                                    <tr>
                                        <th>{{ $data->kode_barang }}</th>
                                        <td>{{ $data->nama_barang }}</td>
                                        <td>{{ $data->stok }}</td>
                                        <td>{{ $data->minimal_stok }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END Page Content -->
            <!-- END Sidemenu -->
            <!-- BEGIN Float Button -->
            <div class="float-btn float-btn-right">
                <button class="btn btn-flat-primary btn-icon mb-2" id="theme-toggle" data-toggle="tooltip" data-placement="right" title="Change theme">
                    <i class="fa fa-moon"></i>
                </button>
                <a href="../rtl/index.html" class="btn btn-flat-primary btn-icon" data-toggle="tooltip" data-placement="right" title="Switch to RTL">
                    <i class="fa fa-sync"></i> </a>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $.ajax({
                url: "{{ url('/data-penjualan') }}",
                method: "GET",
                success: function (response) {
                    var labels = response.labels;
                    var dataValues = response.data;

                    var ctx = document.getElementById("chartLine").getContext("2d");
                    new Chart(ctx, {
                        type: "line",
                        data: {
                            labels: labels,
                            datasets: [{
                                label: "Total Penjualan (Rp)",
                                data: dataValues,
                                borderColor: "rgba(75, 192, 192, 1)",
                                backgroundColor: "rgba(75, 192, 192, 0.2)",
                                borderWidth: 2,
                                tension: 0.4,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                },
                error: function () {
                    console.log("Gagal mengambil data!");
                }
            });
        });
    </script>
@endpush
