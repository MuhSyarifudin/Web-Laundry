@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item active">Paket Laundry</li>
@endsection
@section('konten')
    <div class="container">
        <div class="card rounded-0">
            <div class="card-header">
                <h6 style="font-weight: bold;float: left">Tabel Paket</h5>
                    <a href="paket-layanan/tambah" class="btn btn-primary btn-sm" style="float: right"> <b>+</b> Tambah Data</a>
            </div>
            <div class="card-body">
                <table id="myTable" class="table table-bordered text-nowrap">
                    <thead>
                    <tr style="height: 50px">
                        <th class="col-1" width="10px">No</th>
                        <th class="col-4">Nama Layanan</th>
                        <th class="col-1">Kiloan</th>
                        <th class="col-1">Satuan</th>
                        <th class="col-2 text-center">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach ($paket as $key => $item)
                <tr>
                    <td class="col-1"> {{ $paket->firstItem() + $key }} </td>
                    <td class="col-4"> {{ $item->nama_layanan }} </td>
                    <td class="col-1"> 
                         @if ($item->harga_kiloan != "")
                        @currency($item->harga_kiloan) 
                         @else
                        -
                         @endif 
                    </td>
                    <td class="col-1">
                        @if ($item->harga_satuan != "")
                        @currency($item->harga_satuan)
                         @else
                        -
                         @endif    
                    </td>
                    <td class="col-2 text-center"><a href="/paket-layanan/edit/{{$item->id}} " class="bg-primary rounded-1 text-center" style="color: white;width: 50px;height: 50px;padding: 5px"><i class="fas fa-pen" style="width: 15px;margin: 5px"></i><a href="/paket-layanan/delete/{{$item->id}}" class="bg-danger rounded-1 text-center" style="color: white;width: 50px;height: 50px;padding: 5px;margin-left:5px;"><i class="far fa-trash-alt" style="width: 15px;margin: 5px"></i></td>
                </tr>
                @endforeach
                </tbody>
                </table>
                
            </div>
        </div>
    </div>
@endsection