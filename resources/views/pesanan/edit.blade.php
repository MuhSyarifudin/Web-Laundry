@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item"><a class="text-decoration-none" href="/daftar-transaksi/orderan/">Orderan</a></li>
    <li class="breadcrumb-item active">Update Status</li>
@endsection
@section('konten')
<div class="card mx-auto d-block" style="width:800px">
    <div class="card-header">
    <h6><b>Mengupdate Status Pesanan</b></h6>
    </div>
        <div class="card-body">
        <form action="/daftar-transaksi/status-update/{{$pesanan->id_pesanan}} " method="POST">
            @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <div class="form-group mt-2">
                        <label for="pembayaran">Pembayaran  :</label>
                        <select name="pembayaran" id="pembayaran" class="form-control">
                            @if ($pesanan->pembayaran == "lunas")
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum lunas</option>
                            @else
                            <option value="Belum Lunas">Belum lunas</option>
                            <option value="Lunas">Lunas</option>
                            @endif
                            
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="status">Status  :</label>
                        <select name="status" id="status" class="form-control">
                            @if ($pesanan->id_status == "selesai")
                            <option value="Selesai">Selesai</option>
                            <option value="Proses">Proses</option>    
                            @else 
                            <option value="Proses">Proses</option>
                            <option value="Selesai">Selesai</option>
                            @endif
                        </select>
                    </div>
                
                    <div class="form-group mt-2" style="height: 40px">
                        <button class="btn btn-primary" style="float: right;margin-top:20px">Submit</button>
                    </div>
        </form>
        </div>
</div>
@endsection