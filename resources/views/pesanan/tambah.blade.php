@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/daftar-transaksi/orderan" class="text-decoration-none">Orderan</a></li>
    <li class="breadcrumb-item active"> Tambah Orderan </li>
@endsection
@section('konten')
<div class="card d-block rounded-0">
    <div class="card-header">
    <h6><b>Menambah Pesanan</b></h6>
    </div>
        <div class="card-body" style="height: auto">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        <form action="{{route('tambah-pesanan')}} " method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="nama">Nama  :</label>
                <select name="id_user" id="nama" class="form-control">
                    <option value="">--</option>
                    @foreach ($user as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="layanan">Nama Layanan  :</label>
                <select name="id_layanan" id="layanan" class="form-control">
                    <option value="">--</option>
                    @foreach ($paket as $item2)
                    <option value="{{ $item2->id }}">{{ $item2->nama_layanan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="pickup">Pickup  :</label>
                <input type="text" class="form-control autocomplete" name="pickup">
                <input type="text" style="display: none" class="form-control" name="pickup_latitude" id="pickup-latitude">
                <input type="text" style="display: none" class="form-control" name="pickup_longitude" id="pickup-longitude">
            </div>
            <div class="form-group">
                <label>Delivery</label>
                <input type="text" class="form-control autocomplete2" name="delivery">
                <input type="text" style="display: none" class="form-control" value="0" name="delivery_latitude" id="delivery-latitude">
                <input type="text" style="display: none" class="form-control" value="0" name="delivery_longitude" id="delivery-longitude">
              </div>
            <div class="form-group mt-2">
                <label for="pembayaran">Pembayaran    :</label>
                <select name="pembayaran" id="pembayaran" class="form-control">
                    <option value="Belum Lunas">Belum lunas</option>
                    <option value="Lunas">Lunas</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="status">Status    :</label>
                <select name="status" id="status" class="form-control">
                    <option value="Proses">Proses</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
            <div class="form-group" style="height: 40px">
                <button class="btn btn-primary" style="float: right;margin-top: 20px">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection