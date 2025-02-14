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
                    <span class="breadcrumb-text">Dashboard</span>
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
                                        <h2 class="widget10-title">87,123</h2>
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
                                        <h2 class="widget10-title">237</h2>
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
                                        <h2 class="widget10-title">5,726</h2>
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
                    <div class="col-md-4">
                        <!-- BEGIN Portlet -->
                        <div class="portlet">
                            <div class="portlet-body">
                                <!-- BEGIN Widget -->
                                <div class="widget10-item p-0">
                                    <div class="widget10-content">
                                        <h2 class="widget10-title">$27,639</h2>
                                        <span class="widget10-subtitle">Total revenue</span>
                                    </div>
                                    <div class="widget10-addon">
                                        <!-- BEGIN Avatar -->
                                        <div class="avatar avatar-label-primary avatar-circle widget8-avatar m-0">
                                            <div class="avatar-display">
                                                <i class="fa fa-dollar-sign"></i>
                                            </div>
                                        </div>
                                        <!-- END Avatar -->
                                    </div>
                                </div>
                                <!-- END Widget -->
                            </div>
                            <!-- BEGIN Chart -->
                            <div class="widget11 widget11-bottom widget-chart-7" data-chart-color="#2196f3" data-chart-label="Revenue" data-chart-currency="true" data-chart-series="6400, 4000, 7600, 6200, 9800, 6400"></div>
                            <!-- END Chart -->
                        </div>
                        <!-- END Portlet -->
                    </div>

                    <div class="col-md-4">
                        <!-- BEGIN Portlet -->
                        <div class="portlet">
                            <div class="portlet-body">
                                <!-- BEGIN Widget -->
                                <div class="widget10-item p-0">
                                    <div class="widget10-content">
                                        <h2 class="widget10-title">87,123</h2>
                                        <span class="widget10-subtitle">Order received</span>
                                    </div>
                                    <div class="widget10-addon">
                                        <!-- BEGIN Avatar -->
                                        <div class="avatar avatar-label-success avatar-circle widget8-avatar m-0">
                                            <div class="avatar-display">
                                                <i class="fa fa-boxes"></i>
                                            </div>
                                        </div>
                                        <!-- END Avatar -->
                                    </div>
                                </div>
                                <!-- END Widget -->
                            </div>
                            <!-- BEGIN Chart -->
                            <div class="widget11 widget11-bottom widget-chart-7" data-chart-color="#4caf50" data-chart-label="Order" data-chart-currency="false" data-chart-series="2000, 4000, 3600, 6200, 2800, 6400"></div>
                            <!-- END Chart -->
                        </div>
                        <!-- END Portlet -->
                    </div>

                    <div class="col-md-4">
                        <!-- BEGIN Portlet -->
                        <div class="portlet">
                            <div class="portlet-body">
                                <!-- BEGIN Widget -->
                                <div class="widget10-item p-0">
                                    <div class="widget10-content">
                                        <h2 class="widget10-title">5,726</h2>
                                        <span class="widget10-subtitle">Unique visits</span>
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
                                <!-- END Widget -->
                            </div>
                            <!-- BEGIN Chart -->
                            <div class="widget11 widget11-bottom widget-chart-7" data-chart-color="#f44336" data-chart-label="Visit" data-chart-currency="false" data-chart-series="560, 400, 480, 340, 780, 640"></div>
                            <!-- END Chart -->
                        </div>
                        <!-- END Portlet -->
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
        <i class="fa fa-sync"></i>
    </a>
</div>

@endsection
