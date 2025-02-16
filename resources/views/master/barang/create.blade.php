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
                    <a href="{{ route('master.barang') }}" class="breadcrumb-item">
                        <span class="breadcrumb-text">Barang</span> </a>
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
                    <form action="{{ route('master.barang.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input type="text" name="kode_barang" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="id_kategori_barang">Kategori Barang</label>
                                    <select class="form-control" name="id_kategori_barang" id="id_kategori_barang">
                                        <option selected>Pilih</option>
                                        @foreach($kategoriBarang as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="id_satuan">Satuan</label>
                                    <select class="form-control" name="id_satuan" id="id_satuan">
                                        <option selected>Pilih</option>
                                        @foreach($satuans as $satuan)
                                            <option value="{{ $satuan->id }}">{{ $satuan->satuan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tanggal Kedaluarsa</label>
                                    <div class="input-group">
                                        <input name="tanggal_kedaluarsa" type="text" class="form-control" placeholder="dd/mm/yyyy" id="datepicker-1">
                                        <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar-alt"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tanggal Pembelian</label>
                                    <div class="input-group">
                                        <input name="tanggal_pembelian" type="text" class="form-control" placeholder="dd/mm/yyyy" id="datepicker-2">
                                        <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar-alt"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="text" name="harga_beli" class="form-control text-right" id="harga_beli" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="harga_jual_1">Harga Jual 1 (HPP + 10%)</label>
                                    <input type="text" name="harga_jual_1" class="form-control text-right" id="harga_jual_1" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="harga_jual_2">Harga Jual 2 (HPP + 20%)</label>
                                    <input type="text" name="harga_jual_2" class="form-control text-right" id="harga_jual_2" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="harga_jual_3">Harga Jual 3 (HPP + 30%)</label>
                                    <input type="text" name="harga_jual_3" class="form-control text-right" id="harga_jual_3" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="text" name="stok" class="form-control" id="stok" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="minimal_stok">Minimal Stok</label>
                                    <input type="text" name="minimal_stok" class="form-control" id="minimal_stok" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('master.barang') }}">
                                <button class="btn btn-secondary" type="button">Batal</button>
                            </a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#harga_beli").on("input", function() {
                let hargaBeli = parseInt($(this).val().replace(/\D/g, "")) || 0;

                let hargaJual1 = hargaBeli * 1.10;
                let hargaJual2 = hargaBeli * 1.20;
                let hargaJual3 = hargaBeli * 1.30;

                $("#harga_jual_1").val(formatRupiah(hargaJual1));
                $("#harga_jual_2").val(formatRupiah(hargaJual2));
                $("#harga_jual_3").val(formatRupiah(hargaJual3));
            });

            function formatRupiah(angka) {
                return angka.toLocaleString("id-ID");
            }
        });
    </script>
@endpush
