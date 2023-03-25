@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/daftar-transaksi/pengeluaran" class="text-decoration-none">Pengeluaran</a></li>
    <li class="breadcrumb-item active"> Tambah Pengeluaran </li>
@endsection
@section('konten')
<div class="card d-block rounded-0">
    <div class="card-header">
    <h6><b>Menambah Pengeluaran</b></h6>
    </div>
        <div class="card-body" style="height: auto">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        <form action="{{route('tambah-pengeluaran')}} " method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="nama">Nama Pengeluaran:</label>
                <input type="text" id="nama" name="nama" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="biaya">Biaya Pengeluaran:</label>
                <input type="text" id="biaya" name="biaya" class="form-control">
            </div>
            <div class="form-group" style="height: 40px">
                <button class="btn btn-primary" style="float: right;margin-top: 20px">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection