@extends('layouts.main')
@section('content')
    <div class="header-holder header-holder-desktop">
        <div class="header-container container-fluid">
            <h4 class="header-title">Penjualan</h4>
            <i class="header-divider"></i>
            <div class="header-wrap header-wrap-block justify-content-start">
                <!-- BEGIN Breadcrumb -->
                <div class="breadcrumb">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item">
                        <div class="breadcrumb-icon">
                            <i data-feather="home"></i>
                        </div>
                        <span class="breadcrumb-text">Dashboard</span> </a>
                    <a href="{{ route('penjualan') }}" class="breadcrumb-item">
                        <span class="breadcrumb-text">Penjualan</span> </a>
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
                    <form action="{{ route('penjualan.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="no_penjualan">No Penjualan</label>
                                    <input type="text" name="no_penjualan" class="form-control" id="no_penjualan" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="id_pelanggan">Nama Pelanggan</label>
                                    <select class="form-control" name="id_pelanggan" id="id_pelanggan">
                                        <option selected>Pilih</option>
                                        @foreach($pelanggan as $data)
                                            <option value="{{ $data->id }}" data-tipe="{{ $data->tipe_pelanggan }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group">
                                        <input name="tanggal" type="text" class="form-control" placeholder="dd/mm/yyyy" id="datepicker-3">
                                        <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar-alt"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-condensed mt-3 mb-3 nowrap" id="table">
                            <thead>
                            <tr>
                                <th>Barang</th>
                                <th width="7%">Satuan</th>
                                <th width="7%">Jumlah</th>
                                <th width="10%">Harga</th>
                                <th width="12%">Sub Total</th>
                                <th width="12%">Total</th>
                                <th width="1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(old('form_add_barang'))
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control" name="id_barang" id="formIdBarang0">
                                                <option value="" selected disabled>Pilih</option>
                                                @foreach($barang as $data)
                                                    <option value="{{ $data->id }}" data-harga="{{ $data->harga }}">
                                                        {{ $data->nama_barang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>{!! Form::text('form_add_satuan', old('form_add_satuan'), ['class' => 'form-control', 'id' => 'formSatuan0', 'readonly']) !!}
                                    <td>{!! Form::text('form_add_jumlah', old('form_add_jumlah'), ['class' => 'form-control text-center', 'id' => 'formJumlah0', 'data-input-type' => 'number-format', 'data-thousand-separator' => 'false',  'data-decimal-separator' => 'false', 'data-precision' => '1', 'onkeyup' => 'editJumlah(0)']) !!}</td>
                                    <td>{!! Form::text('form_add_harga', old('form_add_harga'), ['class' => 'form-control text-right', 'id' => 'formHarga0', 'data-input-type' => 'number-format', 'ondblclick' => 'edit_harga(this, 0)', 'onkeyup' => 'produkSetSubTotal(0)', 'readonly']) !!}
                                    <td>{!! Form::text('form_add_sub_total', old('form_add_sub_total'), ['class' => 'form-control text-right', 'id' => 'formSubTotal0', 'data-input-type' => 'number-format', 'readonly']) !!}</td>
                                    <td>{!! Form::text('form_add_total', old('form_add_total'), ['class' => 'form-control text-right', 'id' => 'formTotal0', 'data-input-type' => 'number-format', 'readonly']) !!}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="formAddBarang()">
                                            <i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control" name="id_barang" id="formIdBarang0" onchange="barangSetHarga()">
                                                <option value="" selected disabled>Pilih</option>
                                                @foreach($barang as $data)
                                                    <option value="{{ $data->id }}" data-harga="{{ $data->harga }}">
                                                        {{ $data->nama_barang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>{!! Form::text('form_add_satuan', old('form_add_satuan'), ['class' => 'form-control', 'id' => 'formSatuan0', 'readonly']) !!}
                                    <td>{!! Form::text('form_add_jumlah', NULL, ['class' => 'form-control text-center', 'id' => 'formJumlah0', 'data-input-type' => 'number-format', 'data-thousand-separator' => 'false',  'data-decimal-separator' => 'false', 'data-precision' => '1', 'onkeyup' => 'editJumlah(0)']) !!}</td>
                                    <td>{!! Form::text('form_add_harga', NULL, ['class' => 'form-control text-right', 'id' => 'formHarga0', 'data-input-type' => 'number-format', 'ondblclick' => 'edit_harga(this, 0)', 'onkeyup' => 'produkSetSubTotal(0)', 'readonly']) !!}
                                    <td>{!! Form::text('form_add_sub_total', NULL, ['class' => 'form-control text-right', 'id' => 'formSubTotal0', 'data-input-type' => 'number-format', 'readonly']) !!}</td>
                                    <td>{!! Form::text('form_add_total', NULL, ['class' => 'form-control text-right', 'id' => 'formTotal0', 'data-input-type' => 'number-format', 'readonly']) !!}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="formAddBarang()">
                                            <i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            @endif
                            @if(isset($barang->nama_barang))
                                @foreach($barang as $barangs)
                                    <tr data-row-id="{{ $barangs['id_barang'] }}">
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" name="id_barang" id="formIdBarang0">
                                                    <option value="" selected disabled>Pilih</option>
                                                    @foreach($barang as $data)
                                                        <option value="{{ $data->id }}" data-harga="{{ $data->harga }}">
                                                            {{ $data->nama_barang }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>{!! Form::text('form_add_satuan', old('form_add_satuan'), ['class' => 'form-control', 'id' => 'formSatuan0', 'readonly']) !!}
                                        <td>{!! Form::text('form_add_jumlah', old('form_add_jumlah'), ['class' => 'form-control text-center', 'id' => 'formJumlah0', 'data-input-type' => 'number-format', 'data-thousand-separator' => 'false',  'data-decimal-separator' => 'false', 'data-precision' => '1', 'onkeyup' => 'editJumlah(0)']) !!}</td>
                                        <td>{!! Form::text('form_add_harga', old('form_add_harga'), ['class' => 'form-control text-right', 'id' => 'formHarga0', 'data-input-type' => 'number-format', 'ondblclick' => 'edit_harga(this, 0)', 'onkeyup' => 'produkSetSubTotal(0)', 'readonly']) !!}
                                        <td>{!! Form::text('form_add_sub_total', old('form_add_sub_total'), ['class' => 'form-control text-right', 'id' => 'formSubTotal0', 'data-input-type' => 'number-format', 'readonly']) !!}</td>
                                        <td>{!! Form::text('form_add_total', old('form_add_total'), ['class' => 'form-control text-right', 'id' => 'formTotal0', 'data-input-type' => 'number-format', 'readonly']) !!}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" onclick="removeBarang('{{ $barangs['id_barang'] }}')">
                                                <i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div class="card">
                            <section>
                                <div class="card-body" style="height: 93px; background: #E5E5E5">
                                    <h3 class="text-black">Total</h3>
                                    <div class="text-right">
                                        <h2 id="labelTotal0" class="text-right text-black"></h2>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="text-right" style="margin-top: 10px">
                            <a href="{{ route('penjualan') }}">
                                <button class="btn btn-secondary" type="button">Batal</button>
                            </a>
                            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modal-dialog">
                                Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pembayaran</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diskon">Diskon (%)</label>
                                {!! Form::text('form_add_diskon', NULL, ['class' => 'form-control text-right', 'id' => 'formDiskon0', 'data-input-type' => 'number-format']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="poin_digunakan">Poin digunakan</label>
                                {!! Form::text('form_add_poin', NULL, ['class' => 'form-control text-right', 'id' => 'formPoin0', 'data-input-type' => 'number-format']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bayar">Bayar</label>
                                {!! Form::text('form_add_bayar', NULL, ['class' => 'form-control text-right', 'id' => 'formPoin0', 'data-input-type' => 'number-format']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kembali">Kembali</label>
                                {!! Form::text('form_add_kembali', NULL, ['class' => 'form-control text-right', 'id' => 'formPoin0', 'data-input-type' => 'number-format', 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="text-right">
                        <a href="javascript:;" class="btn btn-secondary" id="batal" data-dismiss="modal">Batal</a>
                        <button class="btn btn-success" type="submit">Store</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        var editJumlahTimeOut;

        function formAddBarang() {
            var idBarang = $('#formIdBarang0').val();
            var satuan = $('#formSatuan0').val();
            var namaBarang = $('#formIdBarang0 option:selected').text();
            var jumlah = $('#formJumlah0').val() || 1;
            var harga = $('#formHarga0').val() || 0;
            var subTotal = harga * jumlah;
            var total = subTotal;
            if (!idBarang) {
                alertDialog('Barang tidak boleh kosong');
                return false;
            }
            if (jumlah == '' || jumlah == 0) {
                alertDialog('Jumlah tidak boleh kosong');
                return false;
            }
            if ($('tr[data-row-id="'+idBarang+'"]').length == 0) {
                var html = `
        <tr data-row-id="${idBarang}">
            <td> ${namaBarang}
                <input type="hidden" name="penjualan['${idBarang}'][id_barang]" id="formIdBarang${idBarang}" value="${idBarang}">
            </td>
            <td>
                <input type="text" name="penjualan['${idBarang}'][satuan]" class="form-control" id="formSatuan${idBarang}"
                    readonly value="${satuan}">
            </td>
            <td>
                <input type="text" name="penjualan['${idBarang}'][jumlah]" class="form-control text-center" id="formJumlah${idBarang}"
                    data-input-type="number-format" data-thousand-separator="false" data-decimal-separator="false"
                    data-precision="0" value="${jumlah}">
            </td>
            <td>
                <input type="text" name="penjualan['${idBarang}'][harga]" class="form-control text-right" id="formHarga${idBarang}"
                    data-input-type="number-format" readonly value="${harga}">
            </td>
            <td>
                <input type="text" name="penjualan['${idBarang}'][sub_total]" class="form-control text-right" id="formSubTotal${idBarang}"
                    data-input-type="number-format" readonly value="${subTotal}">
            </td>
            <td>
                <input type="text" name="penjualan['${idBarang}'][total]" class="form-control text-right" id="formTotal${idBarang}"
                    data-input-type="number-format" readonly value="${total}">
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="remove(${idBarang})"><i class="fa fa-trash"></i></button>
            </td>
        </tr>`;
                $('#table tbody').append(html);
                resetForm();
            } else {
                confirmDialog('Produk sudah ada di dalam daftar', 'apakah anda ingin tetap menambahkannya?', function () {
                    var key = new Date().getTime();
                    var html = `
            <tr data-row-id="${key}">
                <td> ${namaBarang}
                    <input type="hidden" name="penjualan['${key}'][id_barang]" id="formIdBarang${key}" value="${idBarang}">
                </td>
                <td>
                <input type="text" name="penjualan['${key}'][satuan]" class="form-control" id="formSatuan${key}"
                    data-input-type="number-format" readonly value="${satuan}">
                </td>
                <td>
                    <input type="text" name="penjualan['${key}'][jumlah]" class="form-control text-center" id="formJumlah${key}"
                        data-input-type="number-format" data-thousand-separator="false" data-decimal-separator="false"
                        data-precision="0" value="${jumlah}">
                </td>
                <td>
                    <input type="text" name="penjualan['${key}'][harga]" class="form-control text-right" id="formHarga${key}"
                        data-input-type="number-format" readonly value="${harga}">
                </td>
                <td>
                    <input type="text" name="penjualan['${key}'][sub_total]" class="form-control text-right" id="formSubTotal${key}"
                        data-input-type="number-format" readonly value="${subTotal}">
                </td>
                <td>
                    <input type="text" name="penjualan['${key}'][total]" class="form-control text-right" id="formTotal${key}"
                        data-input-type="number-format" readonly value="${total}">
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="remove(${key})"><i class="fa fa-trash"></i></button>
                </td>
            </tr>`;
                    $('#table tbody').append(html);
                    resetForm();
                });
            }
        }

        $('#formIdBarang0').change(function () {
            $('#formJumlah0').val(1); // Set default jumlah = 1 saat pilih barang
            barangSetHarga(0);
        });

        function barangSetHarga(id) {
            var tipePelanggan = $('#id_pelanggan option:selected').data('tipe');
            if ($('#formIdBarang'+id).val()) {
                $('#table tbody').blockUI();
                $.ajax({
                    url: '<?php echo e(route('master.barang.harga')); ?>',
                    data: {
                        id_barang: $('#formIdBarang'+id).val(),
                        tipe_pelanggan: tipePelanggan
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#formHarga'+id).val(response.harga);
                            $('#formSatuan'+id).val(response.satuan);
                        } else {
                            toastr.error('Gagal mendapatkan harga');
                            resetHarga(id);
                        }
                    }
                }).done(function () {
                    $('#table tbody').unblock();
                    barangSetSubTotal(id)
                })
            }
        }

        function barangSetSubTotal(id) {
            var jumlah = parseFloat($('#formJumlah'+id).val()) || 0;
            var harga = parseFloat($('#formHarga'+id).val()) || 0;
            var subTotal = harga * jumlah;
            $('#formSubTotal'+id).val(subTotal);
            $('#formTotal'+id).val(subTotal);
        }

        function editJumlah(id) {
            clearTimeout(editJumlahTimeOut);
            editJumlahTimeOut = setTimeout(function () {
                barangSetHarga(id);
            }, 200);
        }

        function resetForm() {
            $('#formIdBarang0').val('');
            $('#formSatuan0').val('');
            $('#formJumlah0').val('');
            $('#formHarga0').val('');
            $('#formSubTotal0').val('');
            $('#formTotal0').val('');
        }

        function remove(id) {
            confirmDialog('Apakah anda yakin ingin mengahapus data ini?', 'Proses ini tidak dapat dibatalkan', function () {
                $('#table tbody tr[data-row-id="'+id+'"]').remove();
                setSubTotal();
            });
        }
    </script>
@endpush
