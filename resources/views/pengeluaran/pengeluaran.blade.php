@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
<li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
    /admin
@else
    /owner
@endif ">Dashboard</a></li>
<li class="breadcrumb-item active"> Pengeluaran </li>
@endsection
@section('konten')
<div class="container">
    <div class="card justify-content-lg-center rounded-0">
        <div class="card-header">
            <h6 style="font-weight: bold;float: left">Tabel Pengeluaran</h5>
            <a href="/daftar-transaksi/tambah/pengeluaran" class="btn btn-primary btn-sm" style="float: right"> <b>+</b> Tambah Data</a>
        </div>
        <div class="card-body table-responsive">
        <table id="myTable" class="table table-bordered text-nowrap" style="overflow: true">
           <thead>
            <tr style="height: 50px">
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Nama</th>
                <th>Biaya</th>
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pengeluaran as $key => $item)
            <tr>
                <td> {{ $pengeluaran->firstItem() + $key }} </td>
                <td> {{ $item->created_at->format('d F Y') }} </td>
                <td> {{ $item->created_at->format('H:i:s') }} </td>
                <td> {{ $item->nama }} </td>
                <td> @currency($item->biaya) </td>
                <td class="text-center"> <a href="/daftar-transaksi/pengeluaran/edit/{{$item->id}}" class="bg-primary rounded-1 text-center" style="color: white;width: 50px;height: 50px;padding: 5px"><i class="fas fa-pen" style="width: 15px;margin: 5px"></i><a href="/daftar-transaksi/pengeluaran/delete/{{$item->id}}" class="bg-danger rounded-1 text-center" style="color: white;width: 50px;height: 50px;padding: 5px;margin-left:5px;"><i class="far fa-trash-alt" style="width: 15px;margin: 5px"></i></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection