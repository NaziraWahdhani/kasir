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
                        <span class="breadcrumb-text">Dashboard</span>
                    </a>
                    <div class="breadcrumb-item">
                        <span class="breadcrumb-text">Master</span>
                    </div>
                    <a href="{{ route('master.pelanggan') }}" class="breadcrumb-item">
                        <span class="breadcrumb-text">Pelanggan</span>
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
    <div class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- BEGIN Portlet -->
                    <div class="portlet">
                        <div class="portlet-header portlet-header-bordered">
                            <h3 class="portlet-title">Pelanggan</h3>
                            <a href="{{ route('master.pelanggan.create') }}">
                                <button class="btn btn-primary">Tambah</button>
                            </a>
                        </div>
                        <div class="portlet-body">
                            <!-- BEGIN Datatable -->
                            <table id="datatable-1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th width="1">No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tipe Pelanggan</th>
                                    <th>Poin Membership</th>
                                    <th width="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pelanggan as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->no_hp }}</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                    <td><span class="badge badge-info">{{ $data->tipe_pelanggan }}</span></td>
                                    <td>{{ $data->poin_membership }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('master.pelanggan.edit', $data->id) }}"><button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                        @method('DELETE')
                                        <button class="btn btn-danger delete-btn" data-id="{{ $data->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- END Datatable -->
                        </div>
                    </div>
                    <!-- END Portlet -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Ambil semua tombol dengan class "delete-btn"
            let deleteButtons = document.querySelectorAll(".delete-btn");
            deleteButtons.forEach(function (button) {
                button.addEventListener("click", function (event) {
                    event.preventDefault(); // Mencegah link pindah halaman
                    let id = this.getAttribute("data-id"); // Ambil ID dari tombol
                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Data akan dihapus secara permanen!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim permintaan DELETE ke server
                            fetch(`/pelanggan/delete/${id}`, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    "Content-Type": "application/json"
                                }
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire("Berhasil!", data.message, "success").then(() => {
                                            location.reload(); // Refresh halaman
                                        });
                                    } else {
                                        Swal.fire("Gagal!", data.message, "error");
                                    }
                                })
                                .catch(() => {
                                    Swal.fire("Oops!", "Terjadi kesalahan saat menghapus data.", "error");
                                });
                        }
                    });
                });
            });
        });
    </script>
@endpush
