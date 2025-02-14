<!-- BEGIN Aside -->
<div class="aside">
    <div class="aside-header">
        <h3 class="aside-title">Smart Kasir</h3>
        <div class="aside-addon">
            <button class="btn btn-label-primary btn-icon btn-lg" data-toggle="aside">
                <i class="fa fa-times aside-icon-minimize"></i>
                <i class="fa fa-thumbtack aside-icon-maximize"></i>
            </button>
        </div>
    </div>
    <div class="aside-body" data-simplebar="data-simplebar">
        <!-- BEGIN Menu -->
        <div class="menu">
            <div class="menu-item">
                <a href="{{ route('dashboard') }}" data-menu-path="/ltr/index.html" class="menu-item-link">
                    <div class="menu-item-icon">
                        <i class="fa fa-desktop"></i>
                    </div>
                    <span class="menu-item-text">Dashboard</span>
                </a>
            </div>
            <div class="menu-item">
                <button class="menu-item-link menu-item-toggle">
                    <div class="menu-item-icon">
                        <i class="fa fa-database"></i>
                    </div>
                    <span class="menu-item-text">Master</span>
                    <div class="menu-item-addon">
                        <i class="menu-item-caret caret"></i>
                    </div>
                </button>
                <!-- BEGIN Menu Submenu -->
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="{{ route('master.pelanggan') }}" data-menu-path="/ltr/portlet/drag.html" class="menu-item-link">
                            <i class="menu-item-bullet"></i>
                            <span class="menu-item-text">Pelanggan</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('master.kategori-barang') }}" data-menu-path="/ltr/portlet/base.html" class="menu-item-link">
                            <i class="menu-item-bullet"></i>
                            <span class="menu-item-text">Kategori Barang</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('master.barang') }}" data-menu-path="/ltr/portlet/drag.html" class="menu-item-link">
                            <i class="menu-item-bullet"></i>
                            <span class="menu-item-text">Barang</span>
                        </a>
                    </div>
                </div>
                <!-- END Menu Submenu -->
            </div>
            <div class="menu-item">
                <a href="{{ route('penjualan') }}" data-menu-path="/ltr/chart/apex-chart.html" class="menu-item-link">
                    <div class="menu-item-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <span class="menu-item-text">Penjualan</span>
                </a>
            </div>

            <div class="menu-item">
                <button class="menu-item-link menu-item-toggle">
                    <div class="menu-item-icon">
                        <i class="fa fa-print"></i>
                    </div>
                    <span class="menu-item-text">Laporan</span>
                    <div class="menu-item-addon">
                        <i class="menu-item-caret caret"></i>
                    </div>
                </button>
                <!-- BEGIN Menu Submenu -->
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="{{ route('laporan-penjualan') }}" data-menu-path="/ltr/form/basic/base.html" class="menu-item-link">
                            <i class="menu-item-bullet"></i>
                            <span class="menu-item-text">Penjualan</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('laporan-stok') }}" data-menu-path="/ltr/form/basic/custom.html" class="menu-item-link">
                            <i class="menu-item-bullet"></i>
                            <span class="menu-item-text">Stok Barang</span>
                        </a>
                    </div>
                </div>
                <!-- END Menu Submenu -->
            </div>

            <div class="menu-item">
                <button class="menu-item-link menu-item-toggle">
                    <div class="menu-item-icon">
                        <i class="fa fa-cog"></i>
                    </div>
                    <span class="menu-item-text">Pengaturan</span>
                    <div class="menu-item-addon">
                        <i class="menu-item-caret caret"></i>
                    </div>
                </button>
                <!-- BEGIN Menu Submenu -->
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="{{ route('pengaturan.user-roles') }}" data-menu-path="/ltr/form/basic/base.html" class="menu-item-link">
                            <i class="menu-item-bullet"></i>
                            <span class="menu-item-text">User Roles</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('pengaturan.data-user') }}" data-menu-path="/ltr/form/basic/custom.html" class="menu-item-link">
                            <i class="menu-item-bullet"></i>
                            <span class="menu-item-text">Data User</span>
                        </a>
                    </div>
                </div>
                <!-- END Menu Submenu -->
            </div>

{{--            <div class="menu-item">--}}
{{--                <button class="menu-item-link menu-item-toggle">--}}
{{--                    <div class="menu-item-icon">--}}
{{--                        <i class="fa fa-unlock-alt"></i>--}}
{{--                    </div>--}}
{{--                    <span class="menu-item-text">Login</span>--}}
{{--                    <div class="menu-item-addon">--}}
{{--                        <i class="menu-item-caret caret"></i>--}}
{{--                    </div>--}}
{{--                </button>--}}
{{--                <!-- BEGIN Menu Submenu -->--}}
{{--                <div class="menu-submenu">--}}
{{--                    <div class="menu-item">--}}
{{--                        <a href="../ltr/pages/login/login-1.html" data-menu-path="/ltr/pages/login/login-1.html" class="menu-item-link">--}}
{{--                            <i class="menu-item-bullet"></i>--}}
{{--                            <span class="menu-item-text">Login 1</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="menu-item">--}}
{{--                        <a href="../ltr/pages/login/login-2.html" data-menu-path="/ltr/pages/login/login-2.html" class="menu-item-link">--}}
{{--                            <i class="menu-item-bullet"></i>--}}
{{--                            <span class="menu-item-text">Login 2</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- END Menu Submenu -->--}}
{{--            </div>--}}
{{--            <div class="menu-item">--}}
{{--                <button class="menu-item-link menu-item-toggle">--}}
{{--                    <div class="menu-item-icon">--}}
{{--                        <i class="fa fa-user-plus"></i>--}}
{{--                    </div>--}}
{{--                    <span class="menu-item-text">Register</span>--}}
{{--                    <div class="menu-item-addon">--}}
{{--                        <i class="menu-item-caret caret"></i>--}}
{{--                    </div>--}}
{{--                </button>--}}
{{--                <!-- BEGIN Menu Submenu -->--}}
{{--                <div class="menu-submenu">--}}
{{--                    <div class="menu-item">--}}
{{--                        <a href="../ltr/pages/register/register-1.html" data-menu-path="/ltr/pages/register/register-1.html" class="menu-item-link">--}}
{{--                            <i class="menu-item-bullet"></i>--}}
{{--                            <span class="menu-item-text">Register 1</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="menu-item">--}}
{{--                        <a href="../ltr/pages/register/register-2.html" data-menu-path="/ltr/pages/register/register-2.html" class="menu-item-link">--}}
{{--                            <i class="menu-item-bullet"></i>--}}
{{--                            <span class="menu-item-text">Register 2</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- END Menu Submenu -->--}}
{{--            </div>--}}
{{--            <div class="menu-item">--}}
{{--                <button class="menu-item-link menu-item-toggle">--}}
{{--                    <div class="menu-item-icon">--}}
{{--                        <i class="fa fa-unlink"></i>--}}
{{--                    </div>--}}
{{--                    <span class="menu-item-text">Error</span>--}}
{{--                    <div class="menu-item-addon">--}}
{{--                        <i class="menu-item-caret caret"></i>--}}
{{--                    </div>--}}
{{--                </button>--}}
{{--                <!-- BEGIN Menu Submenu -->--}}
{{--                <div class="menu-submenu">--}}
{{--                    <div class="menu-item">--}}
{{--                        <a href="../ltr/pages/error/error-1.html" data-menu-path="/ltr/pages/error/error-1.html" class="menu-item-link">--}}
{{--                            <i class="menu-item-bullet"></i>--}}
{{--                            <span class="menu-item-text">Error 1</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="menu-item">--}}
{{--                        <a href="../ltr/pages/error/error-2.html" data-menu-path="/ltr/pages/error/error-2.html" class="menu-item-link">--}}
{{--                            <i class="menu-item-bullet"></i>--}}
{{--                            <span class="menu-item-text">Error 2</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- END Menu Submenu -->--}}
{{--            </div>--}}
        </div>
        <!-- END Menu -->
    </div>
</div>
