<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/themes/panely/assets/build/styles/ltr-core.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/themes/panely/assets/build/styles/ltr-vendor.css') }}" rel="stylesheet" />
    <style>
        body {
            font-size: 14px;
            width: 8cm;
            font-family: Arial, sans-serif;
        }
        .table-produk {
            font-size: 14px;
        }
        .table-produk tbody::after {
            content: '';
            display: block;
            height: 20px;
        }
        @media print {
            body {
                font-size: 14px;
                width: 8cm;
                font-family: Arial, sans-serif;
            }
            .table-produk {
                font-size: 14px;
            }
            .table-produk tbody::after {
                content: '';
                display: block;
                height: 20px;
            }
        }
    </style>
</head>
<body>
<h4 class="text-center">Smart Kasir</h4>

<table width="100%">
    <tbody>
    <tr>
        <td>{{ date('d/m/Y H:i', strtotime($data->created_at)) }}</td>
        <td>{{ $data->nama_user }}</td>
    </tr>
    <tr>
        <td>{{ $data->nama_pelanggan }}</td>
        <td>{{ $data->tipe_pelanggan }}</td>
    </tr>
    </tbody>
</table>
<br>

<table class="table-produk" width="100%">
    <thead>
    <tr style="border-top: 1px solid; border-bottom: 1px solid;">
        <th width="50">No</th>
        <th colspan="2">Nama Barang</th>
        <th class="text-right">Jumlah</th>
        <th width="125" class="text-right">Harga</th>
    </tr>
    </thead>
    <tbody>
    @foreach($barang as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td colspan="2">{{ $item->nama_barang }}</td>
            <td class="text-right">{{ $item->jumlah }}</td>
            <td class="text-right">{{ number_format($item->harga, 0, ',', '.') }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr style="border-top: 1px solid;">
        <td colspan="4" class="text-right"><strong>Total Bayar</strong></td>
        <td class="text-right"><strong>{{ number_format($data->total, 0, ',', '.') }}</strong></td>
    </tr>
    <tr>
        <td colspan="4" class="text-right">Bayar</td>
        <td class="text-right">{{ number_format($data->bayar, 0, ',', '.') }}</td>
    </tr>
    <tr>
        <td colspan="4" class="text-right">Kembali</td>
        <td class="text-right">{{ number_format($data->bayar - $data->total, 0, ',', '.') }}</td>
    </tr>
    </tfoot>
</table>


<br>
<p class="text-center">** Terima kasih sudah berbelanja ** <br> Barang yang sudah dibeli tidak dapat dikembalikan</p>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        window.print();
    });
</script>
</body>
</html>
