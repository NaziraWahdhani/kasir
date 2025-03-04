@extends('layouts.main')
@section('content')
    <div class="header-holder header-holder-desktop">
        <div class="header-container container-fluid">
            <h4 class="header-title">Barang</h4>
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
                        <span class="breadcrumb-text">Edit</span>
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
                    <form action="{{ route('master.pelanggan.update', $pelanggan->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nama">Nama Pelanggan</label>
                                    <input type="text" name="nama" value="{{ $pelanggan->nama }}" class="form-control" id="nama" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" value="{{ $pelanggan->alamat }}" class="form-control" id="alamat" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="no_hp">No Hp</label>
                                    <input type="text" name="no_hp" value="{{ $pelanggan->no_hp }}" class="form-control" id="no_hp" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                        <option value="" disabled {{ empty($pelanggan->jenis_kelamin) ? 'selected' : '' }}>Pilih</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin', $pelanggan->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $pelanggan->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="tipe_pelanggan">Tipe Pelanggan</label>
                                    <select class="form-control" name="tipe_pelanggan" id="tipe_pelanggan" required>
                                        <option value="" disabled {{ empty($pelanggan->tipe_pelanggan) ? 'selected' : '' }}>Pilih</option>
                                        <option value="vvip" {{ old('tipe_pelanggan', $pelanggan->tipe_pelanggan ?? '') == 'vvip' ? 'selected' : '' }}>vvip</option>
                                        <option value="vip" {{ old('tipe_pelanggan', $pelanggan->tipe_pelanggan ?? '') == 'vip' ? 'selected' : '' }}>vip</option>
                                        <option value="biasa" {{ old('tipe_pelanggan', $pelanggan->tipe_pelanggan ?? '') == 'biasa' ? 'selected' : '' }}>biasa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="poin_membership">Poin Membership</label>
                                    <input type="text" name="poin_membership" value="{{ $pelanggan->poin_membership }}" class="form-control" id="poin_membership">
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('master.pelanggan') }}">
                                <button type="button" class="btn btn-secondary">Batal</button>
                            </a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
