@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item"><a class="text-decoration-none" href="/daftar-transaksi/pengeluaran/">Pengeluaran</a></li>
    <li class="breadcrumb-item active">Edit Pengeluaran</li>
@endsection
@section('konten')
<div class="card mx-auto d-block" style="width:800px">
    <div class="card-header">
    <h6><b>Mengedit Status Pengeluaran</b></h6>
    </div>
        <div class="card-body">
        <form action="/daftar-transaksi/pengeluaran/update/{{$pengeluaran->id}} " method="POST">
            @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <div class="form-group mt-2">
                        <label for="nama">Nama Pengeluaran  :</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$pengeluaran->nama}}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="biaya">Biaya Pengeluaran  :</label>
                        <input type="text" class="form-control" id="biaya" name="biaya" value="{{$pengeluaran->biaya}}">
                    </div>
                
                    <div class="form-group mt-2" style="height: 40px">
                        <button class="btn btn-primary" style="float: right;margin-top:20px">Submit</button>
                    </div>
        </form>
        </div>
</div>
@endsection