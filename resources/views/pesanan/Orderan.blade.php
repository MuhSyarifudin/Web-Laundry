@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item active"> Orderan </li>
@endsection

@section('konten')
    <div class="container">
        <div class="card justify-content-lg-center rounded-0">
            <div class="card-header">
                <h6 style="font-weight: bold;float: left">Tabel Pesanan</h5>
                <a href="/daftar-transaksi/tambah" class="btn btn-primary btn-sm" style="float: right"> <b>+</b> Tambah Data</a>
            </div>
            <div class="card-body table-responsive">
            <table id="myTable" class="table table-bordered text-nowrap">
               <thead>
                <tr style="height: 50px">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Name</th>
                    <th>Nama layanan</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($pesanan as $key => $item)
                    <tr>
                    <td> {{ $pesanan->firstItem() + $key }} </td>
                    <td> {{ $item->created_at->format('d F Y') }} </td>
                    <td> {{ $item->name }}</td>
                    <td> {{ $item->nama_layanan }} </td>
                    <td 
                    @if (strtolower($item->pembayaran) == "lunas")
                        style="color:green"
                    @else
                        style="color:red;"
                    @endif>{{ $item->pembayaran }}</td>
                    <td 
                    @if (strtolower($item->status) == "selesai")
                        style="color:green;"
                    @else
                        style="color:orange;"
                    @endif
                    > {{ $item->status }} </td>
                    <td> 
                        <a href="/daftar-transaksi/edit/{{ $item->id_pesanan }}" class="text-center"><i class="fas fa-pen"></i></a> 
                        <a href="https://www.google.com/maps/dir/?api=1&origin={{$item->pickup_location}}&destination={{$item->delivery_location}}" target="_new" class="text-center"><i class="fas fa-file"></i></a> 
                        <a href="/daftar-transaksi/delete/{{$item->id_pesanan}}" style="color: red" class="ml-1"><i class="fas fa-trash-alt"></i></a>
                        <a href="" class="ml-1" style="color: black;"><i class="fas fa-print"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $pesanan->links() }}
            </div>
        </div>
        <a href="/print-laporan-pdf" class="btn btn-primary">Print Laporan</a>
    </div>
@endsection