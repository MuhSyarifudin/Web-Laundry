@extends('layouts.master')
@section('title','Layanan')
@section('konten')
    <div class="container">
        <h1>Layanan</h1>
        <div class="col-lg-6">
        <h4>Paket Biasa</h4>
        <table class="table table-bordered">
            <tr>
                <th>Nama Layanan</th>
                <th>Harga</th>
            </tr>
            @foreach ($layanan1 as $item)
            <tr>
                <td>{{$item->nama_layanan}}</td>
                <td>@currency($item->harga_kiloan)</td>   
            </tr>
            @endforeach
        </table>
        </div>
        <div class="col-lg-6">
            <h4>Paket Premium</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                </tr>
                @foreach ($layanan2 as $item2)
                <tr> 
                    <td>{{$item2->nama_layanan}}</td>
                    <td>@currency($item2->harga_satuan)</td> 
                </tr>
                @endforeach
            </table>
            </div>
    </div>
@endsection