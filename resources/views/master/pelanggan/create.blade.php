@extends('layouts.main')
@section('content')
    <div class="header-holder header-holder-desktop">
        <div class="header-container container-fluid">
            <h4 class="header-title">Pelanggan</h4>
            <i class="header-divider"></i>
            <div class="header-wrap header-wrap-block justify-content-start">
                <!-- BEGIN Breadcrumb -->
                <div class="breadcrumb">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item">
                        <div class="breadcrumb-icon">
                            <i data-feather="home"></i>
                        </div>
                        <span class="breadcrumb-text">Dashboard</span> </a>
                    <div class="breadcrumb-item">
                        <span class="breadcrumb-text">Master</span>
                    </div>
                    <a href="{{ route('master.pelanggan') }}" class="breadcrumb-item">
                        <span class="breadcrumb-text">Pelanggan</span> </a>
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
                    <form action="{{ route('master.pelanggan.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nama">Nama Pelanggan</label>
                                    <input type="text" name="nama" class="form-control" id="nama" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="no_hp">No Hp</label>
                                    <input type="text" name="no_hp" class="form-control" id="no_hp" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                        <option selected>Pilih</option>
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="tipe_pelanggan">Tipe Pelanggan</label>
                                    <select class="form-control" name="tipe_pelanggan" id="tipe_pelanggan" required>
                                        <option selected>Pilih</option>
                                        <option>vvip</option>
                                        <option>vip</option>
                                        <option>biasa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="poin_membership">Poin Membership</label>
                                    <input type="text" name="poin_membership" class="form-control" id="poin_membership">
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('master.pelanggan') }}">
                                <button type="button" class="btn btn-secondary">Kembali</button>
                            </a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
