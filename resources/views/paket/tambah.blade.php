@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item active"><a class="text-decoration-none" href="/paket-layanan">Paket Laundry</a></li>
    <li class="breadcrumb-item active">tambah</li>
@endsection
@section('konten')
<div class="card d-block">
    <div class="card-header text-center">
    <h6><b>Tambah Paket</b></h6>
    </div>
        <div class="card-body" style="height: auto">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        <form action="{{route('tambah-paket')}} " method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="nama">Nama Layanan  :</label>
                <input type="text" id="nama_layanan" name="nama_layanan" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="nama">Harga Kiloan :</label>
                <input type="text" id="kiloan" name="kiloan" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="nama">Harga Satuan:</label>
                <input type="text" id="satuan" name="satuan" class="form-control">
            </div>
            <div class="form-group" style="height: 40px">
                <button class="btn btn-primary" style="float: right;margin-top: 20px">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection