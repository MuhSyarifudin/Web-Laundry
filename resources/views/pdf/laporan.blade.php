<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{public_path('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{public_path('bootstrap/css/bootstrap.min.css')}}">
    <style>
        *{
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <table class="table table-bordered text-no-wrap">
        <h4 style="font-weight: bold">Pemasukan</h4>
        <tr>
            <td>Tanggal</td>
            <td>Jam</td>
            <td>Nama</td>
            <td>Nama Layanan</td>
            <td>Harga</td>
        </tr>
        @foreach ($pesanan as $item)
            <tr>
                <td>{{ $item->created_at->format('d F Y') }}</td>
                <td>{{ $item->created_at->format('H:i:s') }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->nama_layanan }}</td>
                    @if (!$item->harga_kiloan)
                    <td>@currency($item->harga_satuan)</td>
                    @else
                    <td>@currency($item->harga_kiloan)</td>    
                    @endif
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" class="text-center"><h6 style="font-weight: bold">Total</h6></td>
            <td colspan="2" class="text-center">@currency($sum1 + $sum2)</td>
        </tr>
    </table>
</body>
</html>