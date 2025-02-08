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
                                        <h2 class="widget10-title">$27,639</h2>
                                        <span class="widget10-subtitle">Total revenue</span>
                                    </div>
                                    <div class="widget10-addon">
                                        <!-- BEGIN Avatar -->
                                        <div class="avatar avatar-label-info avatar-circle widget8-avatar m-0">
                                            <div class="avatar-display">
                                                <i class="fa fa-dollar-sign"></i>
                                            </div>
                                        </div>
                                        <!-- END Avatar -->
                                    </div>
                                </div>
                                <div class="widget10-item">
                                    <div class="widget10-content">
                                        <h2 class="widget10-title">87,123</h2>
                                        <span class="widget10-subtitle">Order received</span>
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
                                        <span class="widget10-subtitle">New users</span>
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
                            </div>
                            <!-- END Widget -->
                        </div>
                        <!-- END Portlet -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="row portlet-row-fill-md h-100">
                            <div class="col-md-7 col-xl-12">
                                <!-- BEGIN Portlet -->
                                <div class="portlet">
                                    <div class="portlet-header">
                                        <div class="portlet-icon">
                                            <i class="fa fa-exchange-alt"></i>
                                        </div>
                                        <h3 class="portlet-title">Revenue change</h3>
                                        <div class="portlet-addon">
                                            <!-- BEGIN Dropdown -->
                                            <div class="dropdown">
                                                <button class="btn btn-label-primary btn-icon" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                                    <a class="dropdown-item" href="#">
                                                        <div class="dropdown-icon">
                                                            <i class="fa fa-poll"></i>
                                                        </div>
                                                        <span class="dropdown-content">Report</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="dropdown-icon">
                                                            <i class="fa fa-chart-pie"></i>
                                                        </div>
                                                        <span class="dropdown-content">Charts</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="dropdown-icon">
                                                            <i class="fa fa-chart-line"></i>
                                                        </div>
                                                        <span class="dropdown-content">Statistics</span>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="dropdown-icon">
                                                            <i class="fa fa-cog"></i>
                                                        </div>
                                                        <span class="dropdown-content">Settings</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- END Dropdown -->
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN Chart -->
                                        <div id="widget-chart-1"></div>
                                        <!-- END Chart -->
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <!-- BEGIN Widget -->
                                                <div class="widget4 mb-3">
                                                    <div class="widget4-group">
                                                        <div class="widget4-display">
                                                            <h6 class="widget4-subtitle">New York</h6>
                                                        </div>
                                                        <div class="widget4-addon">
                                                            <h6 class="widget4-subtitle">60%</h6>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-warning" style="width: 60%"></div>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                                <!-- BEGIN Widget -->
                                                <div class="widget4">
                                                    <div class="widget4-group">
                                                        <div class="widget4-display">
                                                            <h6 class="widget4-subtitle">Sydney</h6>
                                                        </div>
                                                        <div class="widget4-addon">
                                                            <h6 class="widget4-subtitle">90%</h6>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" style="width: 90%"></div>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                            </div>
                                            <div class="col-6">
                                                <!-- BEGIN Widget -->
                                                <div class="widget4 mb-3">
                                                    <div class="widget4-group">
                                                        <div class="widget4-display">
                                                            <h6 class="widget4-subtitle">San Francisco</h6>
                                                        </div>
                                                        <div class="widget4-addon">
                                                            <h6 class="widget4-subtitle">75%</h6>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-primary" style="width: 75%"></div>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                                <!-- BEGIN Widget -->
                                                <div class="widget4">
                                                    <div class="widget4-group">
                                                        <div class="widget4-display">
                                                            <h6 class="widget4-subtitle">Tokyo</h6>
                                                        </div>
                                                        <div class="widget4-addon">
                                                            <h6 class="widget4-subtitle">55%</h6>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-danger" style="width: 55%"></div>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Portlet -->
                            </div>
                            <div class="col-md-5 col-xl-12">
                                <!-- BEGIN Portlet -->
                                <div class="portlet">
                                    <div class="portlet-header">
                                        <div class="portlet-icon">
                                            <i class="fa fa-funnel-dollar"></i>
                                        </div>
                                        <h3 class="portlet-title">Employee salary</h3>
                                    </div>
                                    <!-- BEGIN Carousel -->
                                    <div class="carousel carousel-center my-3" id="widget-carousel-nav">
                                        <div class="carousel-item">
                                            <!-- BEGIN Widget -->
                                            <div class="widget6">
                                                <h5 class="widget6-title">Software Engineer</h5>
                                                <span class="widget6-subtitle">San Francisco</span>
                                            </div>
                                            <!-- END Widget -->
                                        </div>
                                        <div class="carousel-item">
                                            <!-- BEGIN Widget -->
                                            <div class="widget6">
                                                <h5 class="widget6-title">Javascript Developer</h5>
                                                <span class="widget6-subtitle">Singapore</span>
                                            </div>
                                            <!-- END Widget -->
                                        </div>
                                        <div class="carousel-item">
                                            <!-- BEGIN Widget -->
                                            <div class="widget6">
                                                <h5 class="widget6-title">Marketing Designer</h5>
                                                <span class="widget6-subtitle">Edinburgh</span>
                                            </div>
                                            <!-- END Widget -->
                                        </div>
                                    </div>
                                    <!-- END Carousel -->
                                    <div class="portlet-body">
                                        <!-- BEGIN Carousel -->
                                        <div class="carousel" id="widget-carousel">
                                            <div class="carousel-item">
                                                <!-- BEGIN Rich List -->
                                                <div class="rich-list">
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Angelica Ramos</h4>
                                                            <span class="rich-list-subtitle">$162,700</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-success badge-xl">+$17</span>
                                                        </div>
                                                    </div>
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Airi Satou</h4>
                                                            <span class="rich-list-subtitle">$433,060</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-danger badge-xl">-$127</span>
                                                        </div>
                                                    </div>
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Colleen Hurst</h4>
                                                            <span class="rich-list-subtitle">$205,500</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-success badge-xl">+$56</span>
                                                        </div>
                                                    </div>
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Brielle Williamson</h4>
                                                            <span class="rich-list-subtitle">$86,000</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-success badge-xl">+$6</span>
                                                        </div>
                                                    </div>
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Garrett Winters</h4>
                                                            <span class="rich-list-subtitle">$327,900</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-danger badge-xl">-$25</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Rich List -->
                                            </div>
                                            <div class="carousel-item">
                                                <!-- BEGIN Rich List -->
                                                <div class="rich-list">
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Airi Satou</h4>
                                                            <span class="rich-list-subtitle">$433,060</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-danger badge-xl">-$127</span>
                                                        </div>
                                                    </div>
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Angelica Ramos</h4>
                                                            <span class="rich-list-subtitle">$162,700</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-success badge-xl">+$17</span>
                                                        </div>
                                                    </div>
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Garrett Winters</h4>
                                                            <span class="rich-list-subtitle">$327,900</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-danger badge-xl">-$25</span>
                                                        </div>
                                                    </div>
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Brielle Williamson</h4>
                                                            <span class="rich-list-subtitle">$86,000</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-success badge-xl">+$6</span>
                                                        </div>
                                                    </div>
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Colleen Hurst</h4>
                                                            <span class="rich-list-subtitle">$205,500</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-success badge-xl">+$56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Rich List -->
                                            </div>
                                            <div class="carousel-item">
                                                <!-- BEGIN Rich List -->
                                                <div class="rich-list">
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Airi Satou</h4>
                                                            <span class="rich-list-subtitle">$433,060</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-danger badge-xl">-$127</span>
                                                        </div>
                                                    </div>
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Colleen Hurst</h4>
                                                            <span class="rich-list-subtitle">$205,500</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-success badge-xl">+$56</span>
                                                        </div>
                                                    </div>
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Brielle Williamson</h4>
                                                            <span class="rich-list-subtitle">$86,000</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-success badge-xl">+$6</span>
                                                        </div>
                                                    </div>
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Garrett Winters</h4>
                                                            <span class="rich-list-subtitle">$327,900</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-danger badge-xl">-$25</span>
                                                        </div>
                                                    </div>
                                                    <div class="rich-list-item">
                                                        <div class="rich-list-prepend">
                                                            <!-- BEGIN Avatar -->
                                                            <div class="avatar">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <!-- END Avatar -->
                                                        </div>
                                                        <div class="rich-list-content">
                                                            <h4 class="rich-list-title">Angelica Ramos</h4>
                                                            <span class="rich-list-subtitle">$162,700</span>
                                                        </div>
                                                        <div class="rich-list-append">
                                                            <span class="badge badge-label-success badge-xl">+$17</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Rich List -->
                                            </div>
                                        </div>
                                        <!-- END Carousel -->
                                    </div>
                                </div>
                                <!-- END Portlet -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="row portlet-row-fill-md h-100">
                            <div class="col-md-4 col-xl-12">
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
                            <div class="col-md-4 col-xl-12">
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
                            <div class="col-md-4 col-xl-12">
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
                    <div class="col-xl-4">
                        <div class="row portlet-row-fill-md h-100">
                            <div class="col-md-6 col-xl-12">
                                <!-- BEGIN Portlet -->
                                <div class="portlet portlet-primary">
                                    <div class="portlet-header">
                                        <div class="portlet-icon">
                                            <i class="fa fa-chalkboard"></i>
                                        </div>
                                        <h3 class="portlet-title">Company summary</h3>
                                        <div class="portlet-addon">
                                            <!-- BEGIN Dropdown -->
                                            <div class="dropdown">
                                                <button class="btn btn-label-light dropdown-toggle" data-toggle="dropdown">June, 2020</button>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                                    <a class="dropdown-item" href="#">
                                                        <div class="dropdown-icon">
                                                            <i class="fa fa-poll"></i>
                                                        </div>
                                                        <span class="dropdown-content">Report</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="dropdown-icon">
                                                            <i class="fa fa-chart-pie"></i>
                                                        </div>
                                                        <span class="dropdown-content">Charts</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="dropdown-icon">
                                                            <i class="fa fa-chart-line"></i>
                                                        </div>
                                                        <span class="dropdown-content">Statistics</span>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="dropdown-icon">
                                                            <i class="fa fa-cog"></i>
                                                        </div>
                                                        <span class="dropdown-content">Settings</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- END Dropdown -->
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN Portlet -->
                                        <div class="portlet mb-2">
                                            <div class="portlet-body">
                                                <!-- BEGIN Widget -->
                                                <div class="widget5">
                                                    <h4 class="widget5-title">Monthly income</h4>
                                                    <div class="widget5-group">
                                                        <div class="widget5-item">
                                                            <span class="widget5-info">Total</span>
                                                            <span class="widget5-value">$65,880</span>
                                                        </div>
                                                        <div class="widget5-item">
                                                            <span class="widget5-info">Change</span>
                                                            <span class="widget5-value text-success">+15%</span>
                                                        </div>
                                                        <div class="widget5-item">
                                                            <span class="widget5-info">Sales</span>
                                                            <span class="widget5-value">554</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                            </div>
                                        </div>
                                        <!-- END Portlet -->
                                        <!-- BEGIN Portlet -->
                                        <div class="portlet mb-2">
                                            <div class="portlet-body">
                                                <!-- BEGIN Widget -->
                                                <div class="widget5">
                                                    <h4 class="widget5-title">Employee amount</h4>
                                                    <div class="widget5-group">
                                                        <div class="widget5-item">
                                                            <span class="widget5-info">Total</span>
                                                            <span class="widget5-value">1250</span>
                                                        </div>
                                                        <div class="widget5-item">
                                                            <span class="widget5-info">Change</span>
                                                            <span class="widget5-value text-danger">-2%</span>
                                                        </div>
                                                        <div class="widget5-item">
                                                            <span class="widget5-info">Active</span>
                                                            <span class="widget5-value">1120</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                            </div>
                                        </div>
                                        <!-- END Portlet -->
                                        <!-- BEGIN Portlet -->
                                        <div class="portlet mb-2">
                                            <div class="portlet-body">
                                                <!-- BEGIN Widget -->
                                                <div class="widget5">
                                                    <h4 class="widget5-title">Product sales</h4>
                                                    <div class="widget5-group">
                                                        <div class="widget5-item">
                                                            <span class="widget5-info">Total</span>
                                                            <span class="widget5-value">2350</span>
                                                        </div>
                                                        <div class="widget5-item">
                                                            <span class="widget5-info">Change</span>
                                                            <span class="widget5-value text-success">+10%</span>
                                                        </div>
                                                        <div class="widget5-item">
                                                            <span class="widget5-info">Last report</span>
                                                            <span class="widget5-value">2220</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                            </div>
                                        </div>
                                        <!-- END Portlet -->
                                        <!-- BEGIN Portlet -->
                                        <div class="portlet mb-0">
                                            <div class="portlet-body">
                                                <!-- BEGIN Widget -->
                                                <div class="widget5">
                                                    <h4 class="widget5-title">Monthly profit</h4>
                                                    <div class="widget5-group">
                                                        <div class="widget5-item">
                                                            <span class="widget5-info">Total</span>
                                                            <span class="widget5-value">$502,100</span>
                                                        </div>
                                                        <div class="widget5-item">
                                                            <span class="widget5-info">Change</span>
                                                            <span class="widget5-value text-success">+15%</span>
                                                        </div>
                                                        <div class="widget5-item">
                                                            <span class="widget5-info">Last month</span>
                                                            <span class="widget5-value">$453,000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                            </div>
                                        </div>
                                        <!-- END Portlet -->
                                    </div>
                                    <div class="portlet-footer text-right">
                                        <button class="btn btn-label-light">View all packages</button>
                                    </div>
                                </div>
                                <!-- END Portlet -->
                            </div>
                            <div class="col-md-6 col-xl-12">
                                <div class="row portlet-row-fill-sm">
                                    <div class="col-sm-6">
                                        <!-- BEGIN Portlet -->
                                        <div class="portlet">
                                            <div class="portlet-header">
                                                <h3 class="portlet-title">Features</h3>
                                                <div class="portet-addon">
                                                    <!-- BEGIN Dropdown -->
                                                    <div class="dropdown">
                                                        <button class="btn btn-text-secondary btn-icon" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-poll"></i>
                                                                </div>
                                                                <span class="dropdown-content">Report</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-chart-pie"></i>
                                                                </div>
                                                                <span class="dropdown-content">Charts</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-chart-line"></i>
                                                                </div>
                                                                <span class="dropdown-content">Statistics</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- END Dropdown -->
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <!-- BEGIN Widget -->
                                                <div class="widget8">
                                                    <div class="widget8-content">
                                                        <h4 class="widget8-highlight widget8-highlight-lg text-primary">34</h4>
                                                        <h6 class="widget8-title">Proposals</h6>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                            </div>
                                            <div class="portlet-footer">
													<span class="text-muted">Completed: <strong>8</strong>
													</span>
                                            </div>
                                        </div>
                                        <!-- END Portlet -->
                                        <!-- BEGIN Portlet -->
                                        <div class="portlet">
                                            <div class="portlet-body">
                                                <!-- BEGIN Widget -->
                                                <div class="widget8">
                                                    <div class="widget8-addon" data-toggle="tooltip" data-placement="right" title="New users for last month">
                                                        <i class="fa fa-question"></i>
                                                    </div>
                                                    <div class="widget8-content">
                                                        <!-- BEGIN Avatar -->
                                                        <div class="avatar avatar-label-primary avatar-circle widget8-avatar">
                                                            <div class="avatar-display">
                                                                <i class="fa fa-users"></i>
                                                            </div>
                                                        </div>
                                                        <!-- END Avatar -->
                                                        <h4 class="widget8-highlight">35.2K</h4>
                                                        <h6 class="widget8-title">Users</h6>
                                                        <span class="widget8-subtitle text-success">
																<i class="fa fa-caret-up"></i> 0.2% </span>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                            </div>
                                        </div>
                                        <!-- END Portlet -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- BEGIN Portlet -->
                                        <div class="portlet">
                                            <div class="portlet-header">
                                                <h3 class="portlet-title">Bug</h3>
                                                <div class="portet-addon">
                                                    <!-- BEGIN Dropdown -->
                                                    <div class="dropdown">
                                                        <button class="btn btn-text-secondary btn-icon" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-poll"></i>
                                                                </div>
                                                                <span class="dropdown-content">Report</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-chart-pie"></i>
                                                                </div>
                                                                <span class="dropdown-content">Charts</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-chart-line"></i>
                                                                </div>
                                                                <span class="dropdown-content">Statistics</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- END Dropdown -->
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <!-- BEGIN Widget -->
                                                <div class="widget8">
                                                    <div class="widget8-content">
                                                        <h4 class="widget8-highlight widget8-highlight-lg text-danger">21</h4>
                                                        <h6 class="widget8-title">Report</h6>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                            </div>
                                            <div class="portlet-footer">
													<span class="text-muted">Fixed: <strong>4</strong>
													</span>
                                            </div>
                                        </div>
                                        <!-- END Portlet -->
                                        <!-- BEGIN Portlet -->
                                        <div class="portlet">
                                            <div class="portlet-body">
                                                <!-- BEGIN Widget -->
                                                <div class="widget8">
                                                    <div class="widget8-content">
                                                        <!-- BEGIN Avatar -->
                                                        <div class="avatar avatar-label-info avatar-circle widget8-avatar">
                                                            <div class="avatar-display">
                                                                <i class="fa fa-dollar-sign"></i>
                                                            </div>
                                                        </div>
                                                        <!-- END Avatar -->
                                                        <h4 class="widget8-highlight">$23K</h4>
                                                        <h6 class="widget8-title">Profit</h6>
                                                        <span class="widget8-subtitle text-danger">
																<i class="fa fa-caret-down"></i> 1.4% </span>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                            </div>
                                        </div>
                                        <!-- END Portlet -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row portlet-row-fill-xl">
                    <div class="col-xl-4">
                        <!-- BEGIN Portlet -->
                        <div class="portlet">
                            <div class="portlet-header">
                                <div class="portlet-icon">
                                    <i class="fa fa-bullhorn"></i>
                                </div>
                                <h3 class="portlet-title">Trends</h3>
                                <div class="portlet-addon">
                                    <!-- BEGIN Dropdown -->
                                    <div class="dropdown">
                                        <button class="btn btn-label-primary dropdown-toggle" data-toggle="dropdown">Export</button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                            <a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-poll"></i>
                                                </div>
                                                <span class="dropdown-content">Report</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-chart-pie"></i>
                                                </div>
                                                <span class="dropdown-content">Charts</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-chart-line"></i>
                                                </div>
                                                <span class="dropdown-content">Statistics</span>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-cog"></i>
                                                </div>
                                                <span class="dropdown-content">Customize</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- END Dropdown -->
                                </div>
                            </div>
                            <!-- BEGIN Chart -->
                            <div class="my-3" id="widget-chart-6"></div>
                            <!-- END Chart -->
                            <div class="portlet-body">
                                <!-- BEGIN Rich List -->
                                <div class="rich-list rich-list-flush">
                                    <div class="rich-list-item">
                                        <div class="rich-list-prepend">
                                            <!-- BEGIN Avatar -->
                                            <div class="avatar avatar-label-warning">
                                                <div class="avatar-display">
                                                    <i class="fab fa-python"></i>
                                                </div>
                                            </div>
                                            <!-- END Avatar -->
                                        </div>
                                        <div class="rich-list-content">
                                            <h4 class="rich-list-title">Python</h4>
                                            <span class="rich-list-subtitle">Programming language</span>
                                        </div>
                                    </div>
                                    <div class="rich-list-item">
                                        <div class="rich-list-prepend">
                                            <!-- BEGIN Avatar -->
                                            <div class="avatar avatar-label-primary">
                                                <div class="avatar-display">
                                                    <i class="fab fa-facebook"></i>
                                                </div>
                                            </div>
                                            <!-- END Avatar -->
                                        </div>
                                        <div class="rich-list-content">
                                            <h4 class="rich-list-title">Facebook</h4>
                                            <span class="rich-list-subtitle">Social media</span>
                                        </div>
                                    </div>
                                    <div class="rich-list-item">
                                        <div class="rich-list-prepend">
                                            <!-- BEGIN Avatar -->
                                            <div class="avatar avatar-label-danger">
                                                <div class="avatar-display">
                                                    <i class="fab fa-angular"></i>
                                                </div>
                                            </div>
                                            <!-- END Avatar -->
                                        </div>
                                        <div class="rich-list-content">
                                            <h4 class="rich-list-title">Angular</h4>
                                            <span class="rich-list-subtitle">Javascript framework</span>
                                        </div>
                                    </div>
                                    <div class="rich-list-item">
                                        <div class="rich-list-prepend">
                                            <!-- BEGIN Avatar -->
                                            <div class="avatar avatar-label-secondary">
                                                <div class="avatar-display">
                                                    <i class="fab fa-apple"></i>
                                                </div>
                                            </div>
                                            <!-- END Avatar -->
                                        </div>
                                        <div class="rich-list-content">
                                            <h4 class="rich-list-title">Apple</h4>
                                            <span class="rich-list-subtitle">Technology brand</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Rich List -->
                            </div>
                        </div>
                        <!-- END Portlet -->
                    </div>
                    <div class="col-xl-8">
                        <div class="row portlet-row-fill-md">
                            <div class="col-md-6">
                                <!-- BEGIN Portlet -->
                                <div class="portlet">
                                    <div class="portlet-header portlet-header-bordered">
                                        <div class="portlet-icon">
                                            <i class="fa fa-clipboard-list"></i>
                                        </div>
                                        <h3 class="portlet-title">Recent activities</h3>
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN Timeline -->
                                        <div class="timeline timeline-timed">
                                            <div class="timeline-item">
                                                <span class="timeline-time">10:00</span>
                                                <div class="timeline-pin">
                                                    <i class="marker marker-circle text-primary"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <div>
                                                        <span>Meeting with</span>
                                                        <!-- BEGIN Avatar Group -->
                                                        <div class="avatar-group ml-2">
                                                            <div class="avatar avatar-circle">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <div class="avatar avatar-circle">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                            <div class="avatar avatar-circle">
                                                                <div class="avatar-display">
                                                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END Avatar Group -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <span class="timeline-time">12:45</span>
                                                <div class="timeline-pin">
                                                    <i class="marker marker-circle text-warning"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore et dolore magna elit enim at minim veniam quis nostrud</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <span class="timeline-time">14:00</span>
                                                <div class="timeline-pin">
                                                    <i class="marker marker-circle text-danger"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <p class="mb-0">Received a new feedback on <a href="#">GoFinance</a> App product.</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <span class="timeline-time">15:20</span>
                                                <div class="timeline-pin">
                                                    <i class="marker marker-circle text-success"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore et dolore magna.</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <span class="timeline-time">17:00</span>
                                                <div class="timeline-pin">
                                                    <i class="marker marker-circle text-info"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <p class="mb-0">Make Deposit <a href="#">USD 700</a> o ESL.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Timeline -->
                                    </div>
                                </div>
                                <!-- END Portlet -->
                                <!-- BEGIN Portlet -->
                                <div class="portlet">
                                    <div class="portlet-header">
                                        <div class="portlet-icon">
                                            <i class="fa fa-bell"></i>
                                        </div>
                                        <h3 class="portlet-title">Notification</h3>
                                        <div class="portlet-addon">
                                            <!-- BEGIN Dropdown -->
                                            <div class="dropdown">
                                                <button class="btn btn-label-primary dropdown-toggle" data-toggle="dropdown">All</button>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                                    <a class="dropdown-item" href="#">
                                                        <span class="badge badge-label-primary">Personal</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <span class="badge badge-label-info">Work</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <span class="badge badge-label-success">Important</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <span class="badge badge-label-danger">Company</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- END Dropdown -->
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN Rich List -->
                                        <div class="rich-list rich-list-bordered rich-list-action">
                                            <div class="rich-list-item">
                                                <div class="rich-list-prepend">
                                                    <!-- BEGIN Avatar -->
                                                    <div class="avatar avatar-label-info">
                                                        <div class="avatar-display">
                                                            <i class="fa fa-file-invoice"></i>
                                                        </div>
                                                    </div>
                                                    <!-- END Avatar -->
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title">New report has been received</h4>
                                                    <span class="rich-list-subtitle">2 min ago</span>
                                                </div>
                                                <div class="rich-list-append">
                                                    <!-- BEGIN Dropdown -->
                                                    <div class="dropdown">
                                                        <button class="btn btn-text-secondary btn-icon" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-check"></i>
                                                                </div>
                                                                <span class="dropdown-content">Mark as read</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-trash-alt"></i>
                                                                </div>
                                                                <span class="dropdown-content">Delete</span>
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-cog"></i>
                                                                </div>
                                                                <span class="dropdown-content">Settings</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- END Dropdown -->
                                                </div>
                                            </div>
                                            <div class="rich-list-item">
                                                <div class="rich-list-prepend">
                                                    <!-- BEGIN Avatar -->
                                                    <div class="avatar avatar-label-success">
                                                        <div class="avatar-display">
                                                            <i class="fa fa-shopping-basket"></i>
                                                        </div>
                                                    </div>
                                                    <!-- END Avatar -->
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title">Last order was completed</h4>
                                                    <span class="rich-list-subtitle">1 hrs ago</span>
                                                </div>
                                                <div class="rich-list-append">
                                                    <!-- BEGIN Dropdown -->
                                                    <div class="dropdown">
                                                        <button class="btn btn-text-secondary btn-icon" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-check"></i>
                                                                </div>
                                                                <span class="dropdown-content">Mark as read</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-trash-alt"></i>
                                                                </div>
                                                                <span class="dropdown-content">Delete</span>
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-cog"></i>
                                                                </div>
                                                                <span class="dropdown-content">Settings</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- END Dropdown -->
                                                </div>
                                            </div>
                                            <div class="rich-list-item">
                                                <div class="rich-list-prepend">
                                                    <!-- BEGIN Avatar -->
                                                    <div class="avatar avatar-label-danger">
                                                        <div class="avatar-display">
                                                            <i class="fa fa-users"></i>
                                                        </div>
                                                    </div>
                                                    <!-- END Avatar -->
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title">Company meeting canceled</h4>
                                                    <span class="rich-list-subtitle">5 hrs ago</span>
                                                </div>
                                                <div class="rich-list-append">
                                                    <!-- BEGIN Dropdown -->
                                                    <div class="dropdown">
                                                        <button class="btn btn-text-secondary btn-icon" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-check"></i>
                                                                </div>
                                                                <span class="dropdown-content">Mark as read</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-trash-alt"></i>
                                                                </div>
                                                                <span class="dropdown-content">Delete</span>
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-cog"></i>
                                                                </div>
                                                                <span class="dropdown-content">Settings</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- END Dropdown -->
                                                </div>
                                            </div>
                                            <div class="rich-list-item">
                                                <div class="rich-list-prepend">
                                                    <!-- BEGIN Avatar -->
                                                    <div class="avatar avatar-label-warning">
                                                        <div class="avatar-display">
                                                            <i class="fa fa-paper-plane"></i>
                                                        </div>
                                                    </div>
                                                    <!-- END Avatar -->
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title">New feedback received</h4>
                                                    <span class="rich-list-subtitle">6 hrs ago</span>
                                                </div>
                                                <div class="rich-list-append">
                                                    <!-- BEGIN Dropdown -->
                                                    <div class="dropdown">
                                                        <button class="btn btn-text-secondary btn-icon" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-check"></i>
                                                                </div>
                                                                <span class="dropdown-content">Mark as read</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-trash-alt"></i>
                                                                </div>
                                                                <span class="dropdown-content">Delete</span>
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="dropdown-icon">
                                                                    <i class="fa fa-cog"></i>
                                                                </div>
                                                                <span class="dropdown-content">Settings</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- END Dropdown -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Rich List -->
                                    </div>
                                </div>
                                <!-- END Portlet -->
                            </div>
                            <div class="col-md-6">
                                <!-- BEGIN Portlet -->
                                <div class="portlet">
                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- BEGIN Widget -->
                                                <div class="widget4 mb-3">
                                                    <div class="widget4-group">
                                                        <div class="widget4-display">
                                                            <h3 class="widget4-subtitle">Completed Transactions</h3>
                                                            <h2 class="widget4-hightlight">54,234</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                                <!-- BEGIN Widget -->
                                                <div class="widget4">
                                                    <div class="widget4-group">
                                                        <div class="widget4-display">
                                                            <h3 class="widget4-subtitle">New Orders</h3>
                                                            <h2 class="widget4-hightlight">242</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- BEGIN Widget -->
                                                <div class="widget4 mb-3">
                                                    <div class="widget4-group">
                                                        <div class="widget4-display">
                                                            <h3 class="widget4-subtitle">Avarage Product Price</h3>
                                                            <h2 class="widget4-hightlight">$67,50</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Widget -->
                                                <!-- BEGIN Widget -->
                                                <div class="widget4">
                                                    <div class="widget4-group">
                                                        <div class="widget4-display">
                                                            <h2 class="widget4-subtitle">Satisfication Rate</h2>
                                                        </div>
                                                        <div class="widget4-addon">
                                                            <h2 class="widget4-subtitle">90%</h2>
                                                        </div>
                                                    </div>
                                                    <!-- BEGIN Progress -->
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary" style="width: 90%"></div>
                                                    </div>
                                                    <!-- END Progress -->
                                                </div>
                                                <!-- END Widget -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Portlet -->
                                <!-- BEGIN Portlet -->
                                <div class="portlet">
                                    <div class="portlet-header portlet-header-bordered">
                                        <div class="portlet-icon">
                                            <i class="fa fa-user-tag"></i>
                                        </div>
                                        <h3 class="portlet-title">User feeds</h3>
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN Rich List -->
                                        <div class="rich-list rich-list-flush">
                                            <div class="rich-list-item flex-column align-items-stretch">
                                                <!-- BEGIN Rich List -->
                                                <div class="rich-list-item p-0">
                                                    <div class="rich-list-prepend">
                                                        <!-- BEGIN Avatar -->
                                                        <div class="avatar">
                                                            <div class="avatar-display">
                                                                <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                            </div>
                                                        </div>
                                                        <!-- END Avatar -->
                                                    </div>
                                                    <div class="rich-list-content">
                                                        <h4 class="rich-list-title">Airi Satou</h4>
                                                        <span class="rich-list-subtitle">Accountant</span>
                                                    </div>
                                                    <div class="rich-list-append">
                                                        <button class="btn btn-label-primary">Follow</button>
                                                    </div>
                                                </div>
                                                <!-- END Rich List -->
                                                <p class="text-justify mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem optio libero deleniti minus culpa modi, quam rem eius quaerat aut.</p>
                                            </div>
                                            <div class="rich-list-item flex-column align-items-stretch">
                                                <!-- BEGIN Rich List -->
                                                <div class="rich-list-item p-0">
                                                    <div class="rich-list-prepend">
                                                        <!-- BEGIN Avatar -->
                                                        <div class="avatar">
                                                            <div class="avatar-display">
                                                                <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                            </div>
                                                        </div>
                                                        <!-- END Avatar -->
                                                    </div>
                                                    <div class="rich-list-content">
                                                        <h4 class="rich-list-title">Cedric Kelly</h4>
                                                        <span class="rich-list-subtitle">Senior Javascript Developer</span>
                                                    </div>
                                                    <div class="rich-list-append">
                                                        <button class="btn btn-label-primary">Follow</button>
                                                    </div>
                                                </div>
                                                <!-- END Rich List -->
                                                <p class="text-justify mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus non, in, culpa libero quidem consequatur.</p>
                                            </div>
                                            <div class="rich-list-item flex-column align-items-stretch">
                                                <!-- BEGIN Rich List -->
                                                <div class="rich-list-item p-0">
                                                    <div class="rich-list-prepend">
                                                        <!-- BEGIN Avatar -->
                                                        <div class="avatar">
                                                            <div class="avatar-display">
                                                                <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                            </div>
                                                        </div>
                                                        <!-- END Avatar -->
                                                    </div>
                                                    <div class="rich-list-content">
                                                        <h4 class="rich-list-title">Brielle Williamson</h4>
                                                        <span class="rich-list-subtitle">Integration Specialist</span>
                                                    </div>
                                                    <div class="rich-list-append">
                                                        <button class="btn btn-label-primary">Follow</button>
                                                    </div>
                                                </div>
                                                <!-- END Rich List -->
                                                <p class="text-justify mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae nesciunt blanditiis tempora eius accusamus, libero facere amet! Neque quis odio dicta dolor, eaque consectetur. Nihil?</p>
                                            </div>
                                            <div class="rich-list-item flex-column align-items-stretch">
                                                <!-- BEGIN Rich List -->
                                                <div class="rich-list-item p-0">
                                                    <div class="rich-list-prepend">
                                                        <!-- BEGIN Avatar -->
                                                        <div class="avatar">
                                                            <div class="avatar-display">
                                                                <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                                            </div>
                                                        </div>
                                                        <!-- END Avatar -->
                                                    </div>
                                                    <div class="rich-list-content">
                                                        <h4 class="rich-list-title">Sonya Frost</h4>
                                                        <span class="rich-list-subtitle">Software Engineer</span>
                                                    </div>
                                                    <div class="rich-list-append">
                                                        <button class="btn btn-label-primary">Follow</button>
                                                    </div>
                                                </div>
                                                <!-- END Rich List -->
                                                <p class="text-justify mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita praesentium rem aut aliquam perferendis harum molestiae cum beatae, perspiciatis, at nisi reprehenderit minus voluptatibus veritatis. Iste laborum possimus nobis vero?</p>
                                            </div>
                                        </div>
                                        <!-- END Rich List -->
                                    </div>
                                </div>
                                <!-- END Portlet -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->


<!-- END Page Holder -->
<!-- BEGIN Scroll To Top -->
<div class="scrolltop">
    <button class="btn btn-info btn-icon btn-lg">
        <i class="fa fa-angle-up"></i>
    </button>
</div>
<!-- END Scroll To Top -->
<!-- BEGIN Sidemenu -->
<div class="sidemenu sidemenu-right sidemenu-wider" id="sidemenu-todo">
    <div class="sidemenu-header">
        <h3 class="sidemenu-title">May 14, 2020</h3>
        <div class="sidemenu-addon">
            <button class="btn btn-label-danger btn-icon" data-dismiss="sidemenu">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <div class="sidemenu-body pb-0" data-simplebar="data-simplebar">
        <!-- BEGIN Portlet -->
        <div class="portlet portlet-bordered">
            <div class="portlet-header portlet-header-bordered">
                <div class="portlet-icon">
                    <i class="fa fa-tasks"></i>
                </div>
                <h3 class="portlet-title">Upcoming events</h3>
            </div>
            <div class="portlet-body">
                <!-- BEGIN Timeline -->
                <div class="timeline rich-list-bordered">
                    <div class="timeline-item">
                        <div class="timeline-pin">
                            <i class="marker marker-circle text-primary"></i>
                        </div>
                        <div class="timeline-content">
                            <!-- BEGIN Rich List -->
                            <div class="rich-list-item">
                                <div class="rich-list-content">
                                    <h5 class="rich-list-title">12:00</h5>
                                    <p class="rich-list-paragraph">Donec laoreet fringilla justo a pellentesque</p>
                                </div>
                            </div>
                            <!-- END Rich List -->
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-pin">
                            <i class="marker marker-circle text-success"></i>
                        </div>
                        <div class="timeline-content">
                            <!-- BEGIN Rich List -->
                            <div class="rich-list-item">
                                <div class="rich-list-content">
                                    <h5 class="rich-list-title">13:20</h5>
                                    <p class="rich-list-paragraph">Nunc quis massa nec enim</p>
                                </div>
                            </div>
                            <!-- END Rich List -->
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-pin">
                            <i class="marker marker-circle text-danger"></i>
                        </div>
                        <div class="timeline-content">
                            <!-- BEGIN Rich List -->
                            <div class="rich-list-item">
                                <div class="rich-list-content">
                                    <h5 class="rich-list-title">14:00</h5>
                                    <p class="rich-list-paragraph">Praesent sit amet</p>
                                </div>
                            </div>
                            <!-- END Rich List -->
                        </div>
                    </div>
                </div>
                <!-- END Timeline -->
            </div>
        </div>
        <!-- END Portlet -->
        <!-- BEGIN Portlet -->
        <div class="portlet portlet-bordered">
            <div class="portlet-header portlet-header-bordered">
                <div class="portlet-icon">
                    <i class="fa fa-users"></i>
                </div>
                <h3 class="portlet-title">Contacts</h3>
                <div class="portlet-addon">
                    <button class="btn btn-label-primary btn-icon">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="portlet-body p-0">
                <!-- BEGIN Rich List -->
                <div class="rich-list rich-list-flush rich-list-action">
                    <a href="#" class="rich-list-item">
                        <div class="rich-list-prepend">
                            <!-- BEGIN Avatar -->
                            <div class="avatar avatar-circle">
                                <div class="avatar-addon avatar-addon-top">
                                    <div class="avatar-icon avatar-icon-info">
                                        <i class="fa fa-thumbtack"></i>
                                    </div>
                                </div>
                                <div class="avatar-display">
                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                </div>
                                <div class="avatar-addon avatar-addon-bottom">
                                    <i class="marker marker-dot text-secondary"></i>
                                </div>
                            </div>
                            <!-- END Avatar -->
                        </div>
                        <div class="rich-list-content">
                            <h4 class="rich-list-title">Charlie Stone</h4>
                            <span class="rich-list-subtitle">Art Director</span>
                        </div>
                        <div class="rich-list-append flex-column align-items-end">
                            <span class="text-muted text-nowrap">1 min</span>
                            <span class="badge badge-success badge-pill">1</span>
                        </div>
                    </a>
                    <a href="#" class="rich-list-item">
                        <div class="rich-list-prepend">
                            <!-- BEGIN Avatar -->
                            <div class="avatar avatar-circle">
                                <div class="avatar-display">
                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                </div>
                                <div class="avatar-addon avatar-addon-bottom">
                                    <i class="marker marker-dot text-success"></i>
                                </div>
                            </div>
                            <!-- END Avatar -->
                        </div>
                        <div class="rich-list-content">
                            <h4 class="rich-list-title">Freddie Stevens</h4>
                            <span class="rich-list-subtitle">Journalist</span>
                        </div>
                        <div class="rich-list-append flex-column align-items-end">
                            <span class="text-muted text-nowrap">2 hour</span>
                            <span class="badge badge-success badge-pill">12</span>
                        </div>
                    </a>
                    <a href="#" class="rich-list-item">
                        <div class="rich-list-prepend">
                            <!-- BEGIN Avatar -->
                            <div class="avatar avatar-circle">
                                <div class="avatar-display">
                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                </div>
                                <div class="avatar-addon avatar-addon-bottom">
                                    <i class="marker marker-dot text-success"></i>
                                </div>
                            </div>
                            <!-- END Avatar -->
                        </div>
                        <div class="rich-list-content">
                            <h4 class="rich-list-title">Tyler Clark</h4>
                            <span class="rich-list-subtitle">Programmer</span>
                        </div>
                        <div class="rich-list-append flex-column align-items-end">
                            <span class="text-muted text-nowrap">5 hour</span>
                        </div>
                    </a>
                    <a href="#" class="rich-list-item">
                        <div class="rich-list-prepend">
                            <!-- BEGIN Avatar -->
                            <div class="avatar avatar-circle">
                                <div class="avatar-addon avatar-addon-top">
                                    <div class="avatar-icon avatar-icon-success">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </div>
                                <div class="avatar-display">
                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                </div>
                                <div class="avatar-addon avatar-addon-bottom">
                                    <i class="marker marker-dot text-secondary"></i>
                                </div>
                            </div>
                            <!-- END Avatar -->
                        </div>
                        <div class="rich-list-content">
                            <h4 class="rich-list-title">Darcy Harrison</h4>
                            <span class="rich-list-subtitle">Internet Marketer</span>
                        </div>
                        <div class="rich-list-append flex-column align-items-end">
                            <span class="text-muted text-nowrap">1 day</span>
                            <span class="badge badge-success badge-pill">2</span>
                        </div>
                    </a>
                    <a href="#" class="rich-list-item">
                        <div class="rich-list-prepend">
                            <!-- BEGIN Avatar -->
                            <div class="avatar avatar-circle">
                                <div class="avatar-display">
                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                </div>
                                <div class="avatar-addon avatar-addon-bottom">
                                    <i class="marker marker-dot text-success"></i>
                                </div>
                            </div>
                            <!-- END Avatar -->
                        </div>
                        <div class="rich-list-content">
                            <h4 class="rich-list-title">Victor Payne</h4>
                            <span class="rich-list-subtitle">Accountant</span>
                        </div>
                        <div class="rich-list-append flex-column align-items-end">
                            <span class="text-muted text-nowrap">1 day</span>
                            <span class="badge badge-success badge-pill">5</span>
                        </div>
                    </a>
                    <a href="#" class="rich-list-item">
                        <div class="rich-list-prepend">
                            <!-- BEGIN Avatar -->
                            <div class="avatar avatar-circle">
                                <div class="avatar-display">
                                    <img src="../assets/images/avatar/blank.webp" alt="Avatar image">
                                </div>
                                <div class="avatar-addon avatar-addon-bottom">
                                    <i class="marker marker-dot text-secondary"></i>
                                </div>
                            </div>
                            <!-- END Avatar -->
                        </div>
                        <div class="rich-list-content">
                            <h4 class="rich-list-title">Alberta Harris</h4>
                            <span class="rich-list-subtitle">UI Designer</span>
                        </div>
                        <div class="rich-list-append flex-column align-items-end">
                            <span class="text-muted text-nowrap">2 day</span>
                            <span class="badge badge-success badge-pill">4</span>
                        </div>
                    </a>
                </div>
                <!-- END Rich List -->
            </div>
        </div>
        <!-- END Portlet -->
    </div>
</div>
<!-- END Sidemenu -->
<!-- BEGIN Sidemenu -->
<div class="sidemenu sidemenu-right sidemenu-wider" id="sidemenu-settings">
    <div class="sidemenu-header">
        <h3 class="sidemenu-title">Settings</h3>
        <div class="sidemenu-addon">
            <button class="btn btn-label-danger btn-icon" data-dismiss="sidemenu">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <div class="sidemenu-body pb-0" data-simplebar="data-simplebar">
        <!-- BEGIN Portlet -->
        <div class="portlet portlet-bordered">
            <div class="portlet-header portlet-header-bordered">
                <div class="portlet-icon">
                    <i class="fa fa-bolt"></i>
                </div>
                <h3 class="portlet-title">Performance</h3>
            </div>
            <div class="portlet-body">
                <!-- BEGIN Widget -->
                <div class="widget4 mb-3">
                    <div class="widget4-group">
                        <div class="widget4-display">
                            <h6 class="widget4-subtitle">CPU Load</h6>
                        </div>
                        <div class="widget4-addon">
                            <h6 class="widget4-subtitle text-info">60%</h6>
                        </div>
                    </div>
                    <!-- BEGIN Progress -->
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" style="width: 60%"></div>
                    </div>
                    <!-- END Progress -->
                </div>
                <!-- END Widget -->
                <!-- BEGIN Widget -->
                <div class="widget4 mb-3">
                    <div class="widget4-group">
                        <div class="widget4-display">
                            <h6 class="widget4-subtitle">CPU Temparature</h6>
                        </div>
                        <div class="widget4-addon">
                            <h6 class="widget4-subtitle text-success">42°</h6>
                        </div>
                    </div>
                    <!-- BEGIN Progress -->
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 30%"></div>
                    </div>
                    <!-- END Progress -->
                </div>
                <!-- END Widget -->
                <!-- BEGIN Widget -->
                <div class="widget4">
                    <div class="widget4-group">
                        <div class="widget4-display">
                            <h6 class="widget4-subtitle">RAM Usage</h6>
                        </div>
                        <div class="widget4-addon">
                            <h6 class="widget4-subtitle text-danger">6,532 MB</h6>
                        </div>
                    </div>
                    <!-- BEGIN Progress -->
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 80%"></div>
                    </div>
                    <!-- END Progress -->
                </div>
                <!-- END Widget -->
            </div>
        </div>
        <!-- END Portlet -->
        <!-- BEGIN Portlet -->
        <div class="portlet portlet-bordered">
            <div class="portlet-header">
                <h3 class="portlet-title">Customer care</h3>
            </div>
            <div class="portlet-body">
                <!-- BEGIN Form Group -->
                <div class="form-group">
                    <!-- BEGIN Custom Switch -->
                    <div class="custom-control custom-control-lg custom-switch">
                        <input type="checkbox" class="custom-control-input" id="generalSetting1">
                        <label class="custom-control-label" for="generalSetting1">Enable notifications</label>
                    </div>
                    <!-- END Custom Switch -->
                </div>
                <!-- END Form Group -->
                <!-- BEGIN Form Group -->
                <div class="form-group">
                    <!-- BEGIN Custom Switch -->
                    <div class="custom-control custom-control-lg custom-switch">
                        <input type="checkbox" class="custom-control-input" id="generalSetting2" checked="checked">
                        <label class="custom-control-label" for="generalSetting2">Enable case tracking</label>
                    </div>
                    <!-- END Custom Switch -->
                </div>
                <!-- END Form Group -->
                <!-- BEGIN Form Group -->
                <div class="form-group mb-0">
                    <!-- BEGIN Custom Switch -->
                    <div class="custom-control custom-control-lg custom-switch">
                        <input type="checkbox" class="custom-control-input" id="generalSetting3">
                        <label class="custom-control-label" for="generalSetting3">Support portal</label>
                    </div>
                    <!-- END Custom Switch -->
                </div>
                <!-- END Form Group -->
            </div>
        </div>
        <!-- END Portlet -->
        <!-- BEGIN Portlet -->
        <div class="portlet portlet-bordered">
            <div class="portlet-header">
                <h3 class="portlet-title">Reports</h3>
            </div>
            <div class="portlet-body">
                <!-- BEGIN Form Group -->
                <div class="form-group">
                    <!-- BEGIN Custom Switch -->
                    <div class="custom-control custom-control-lg custom-switch">
                        <input type="checkbox" class="custom-control-input" id="generalSetting4">
                        <label class="custom-control-label" for="generalSetting4">Generate reports</label>
                    </div>
                    <!-- END Custom Switch -->
                </div>
                <!-- END Form Group -->
                <!-- BEGIN Form Group -->
                <div class="form-group">
                    <!-- BEGIN Custom Switch -->
                    <div class="custom-control custom-control-lg custom-switch">
                        <input type="checkbox" class="custom-control-input" id="generalSetting5" checked="checked">
                        <label class="custom-control-label" for="generalSetting5">Enable report export</label>
                    </div>
                    <!-- END Custom Switch -->
                </div>
                <!-- END Form Group -->
                <!-- BEGIN Form Group -->
                <div class="form-group mb-0">
                    <!-- BEGIN Custom Switch -->
                    <div class="custom-control custom-control-lg custom-switch">
                        <input type="checkbox" class="custom-control-input" id="generalSetting6">
                        <label class="custom-control-label" for="generalSetting6">Allow data</label>
                    </div>
                    <!-- END Custom Switch -->
                </div>
                <!-- END Form Group -->
            </div>
        </div>
        <!-- END Portlet -->
        <!-- BEGIN Portlet -->
        <div class="portlet portlet-bordered">
            <div class="portlet-header">
                <h3 class="portlet-title">Projects</h3>
            </div>
            <div class="portlet-body">
                <!-- BEGIN Form Group -->
                <div class="form-group">
                    <!-- BEGIN Custom Switch -->
                    <div class="custom-control custom-control-lg custom-switch">
                        <input type="checkbox" class="custom-control-input" id="generalSetting7">
                        <label class="custom-control-label" for="generalSetting7">Enable create projects</label>
                    </div>
                    <!-- END Custom Switch -->
                </div>
                <!-- END Form Group -->
                <!-- BEGIN Form Group -->
                <div class="form-group">
                    <!-- BEGIN Custom Switch -->
                    <div class="custom-control custom-control-lg custom-switch">
                        <input type="checkbox" class="custom-control-input" id="generalSetting8" checked="checked">
                        <label class="custom-control-label" for="generalSetting8">Enable custom projects</label>
                    </div>
                    <!-- END Custom Switch -->
                </div>
                <!-- END Form Group -->
                <!-- BEGIN Form Group -->
                <div class="form-group mb-0">
                    <!-- BEGIN Custom Switch -->
                    <div class="custom-control custom-control-lg custom-switch">
                        <input type="checkbox" class="custom-control-input" id="generalSetting9">
                        <label class="custom-control-label" for="generalSetting9">Enable project review</label>
                    </div>
                    <!-- END Custom Switch -->
                </div>
                <!-- END Form Group -->
            </div>
        </div>
        <!-- END Portlet -->
    </div>
</div>
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
