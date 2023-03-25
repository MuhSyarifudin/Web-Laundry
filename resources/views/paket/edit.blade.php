@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="/paket-layanan" class="text-decoration-none">Paket Laundry</a></li>
    <li class="breadcrumb-item active">Edit Paket</li>
@endsection
@section('konten')
<div class="card mx-auto d-block mt-5 rounded-0" style="width:800px">
    <div class="card-header">
    <h6><b>Mengedit Paket Laundry</b></h6>
    </div>
        <div class="card-body">
        <form action="/paket-layanan/update/{{$paket->id}} " method="POST">
            @csrf
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="form-group mt-2">
                <label for="username">Nama Layanan  :</label>
                <input type="text" id="nama_layanan" name="nama_layanan" class="form-control" value=" {{old('nama_layanan',$paket->nama_layanan)}} ">
            </div>
            <div class="form-group mt-2">
                <label for="username">Harga Kiloan  :</label>
                <input type="text" id="kiloan" name="kiloan" class="form-control" value=" {{old('harga_kiloan',$paket->harga_kiloan)}} ">
            </div>
            <div class="form-group mt-2">
                <label for="username">Harga Satuan  :</label>
                <input type="text" id="satuan" name="satuan" class="form-control" value=" {{old('harga_satuan',$paket->harga_satuan)}} ">
            </div>
            <div class="form-group" style="height: 40px">
                <button class="btn btn-primary" style="float: right;margin-top: 20px">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection