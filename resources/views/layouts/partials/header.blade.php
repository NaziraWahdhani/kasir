<!-- BEGIN Header -->
    <div class="header">
        <!-- BEGIN Header Holder -->
        <div class="header-holder header-holder-desktop sticky-header" id="sticky-header-desktop">
            <div class="header-container container-fluid">
                <div class="header-wrap header-wrap-block">
                    <!-- BEGIN Input Group -->
                    <div class="input-group-icon input-group-lg widget15-compact">
                        <div class="input-group-prepend">
                            <i class="fa fa-search text-primary"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Type to search...">
                    </div>
                    <!-- END Input Group -->
                </div>
                <div class="header-wrap">
                    <div class="dropdown ml-2">
                        <button class="btn btn-flat-primary widget13" data-toggle="dropdown">
                            <div class="widget13-text"> Hi <strong>{{ auth()->user()->name }}</strong>
                            </div>
                            <!-- BEGIN Avatar -->
                            <div class="avatar avatar-info widget13-avatar">
                                <div class="avatar-display">
                                    <i class="fa fa-user-alt"></i>
                                </div>
                            </div>
                            <!-- END Avatar -->
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                            <!-- BEGIN Portlet -->
                            <div class="portlet border-0">
                                <div class="portlet-body rounded-0 p-0">
                                    <!-- BEGIN Rich List Item -->
                                    <div class="rich-list-item w-20 p-0">
                                        <div class="rich-list-content">
                                            <div class="logout">
                                                <form action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                <button type="submit" tabindex="0" role="menuitem" class="dropdown-item btn">
                                                    <span class="dropdown-icon"><i data-feather="log-out"></i></span>
                                                    <span class="dropdown-content">Keluar</span>
                                                </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Dropdown -->
                </div>
            </div>
        </div>
        <!-- END Header Holder -->
    </div>
<!-- END Page Wrapper -->
