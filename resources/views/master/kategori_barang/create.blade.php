@extends('layouts.main')
@section('content')
    <div class="header-holder header-holder-desktop">
        <div class="header-container container-fluid">
            <h4 class="header-title">Kategori Barang</h4>
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
                        <span class="breadcrumb-text">Master</span>
                    </div>
                    <a href="{{ route('master.kategori-barang') }}" class="breadcrumb-item">
                        <span class="breadcrumb-text">Kategori Barang</span>
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
    <div class="content">
        <div class="container-fluid">
            <div class="portlet">
                <div class="portlet-body">
                    @include('layouts.partials.message')
                    @include('layouts.partials.formRequestErrors')
                    <form action="{{ route('master.kategori-barang.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kode_kategori">Kode Kategori</label>
                                    <input type="text" name="kode_kategori" class="form-control" id="kode_kategori" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('master.kategori-barang') }}">
                                <button class="btn btn-secondary" type="button">Kembali</button>
                            </a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
