@extends('layouts.main')
@section('content')
    <div class="header-holder header-holder-desktop">
        <div class="header-container container-fluid">
            <h4 class="header-title">User Roles</h4>
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
                        <span class="breadcrumb-text">Pengaturan</span>
                    </div>
                    <a href="{{ route('pengaturan.user-roles') }}" class="breadcrumb-item">
                        <span class="breadcrumb-text">Role</span>
                    </a>
                    <div class="breadcrumb-item">
                        <span class="breadcrumb-text">Create</span>
                    </div>
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
    <div class="content">
        <div class="container-fluid">
            <div class="portlet">
                <div class="portlet-body">
                    @include('layouts.partials.message')
                    @include('layouts.partials.formRequestErrors')
                    <form action="{{ route('pengaturan.user-roles.update', $data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="role">role</label>
                                    <input type="text" name="role" value="{{ $data->role }}" class="form-control" id="role" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <input type="text" name="description" value="{{ $data->description }}" class="form-control" id="description" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('pengaturan.user-roles') }}">
                                <button type="button" class="btn btn-secondary">Batal</button>
                            </a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
