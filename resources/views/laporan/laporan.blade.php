@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item active">Laporan</li>
@endsection
@section('konten')    
<div class="card">
    <div class="card-header"><h6 class="m-0" style="float: left; font-weight: bold">Tabel Pesanan</h6></div>
<div class="card-body">
    <table class="table table-bordered text-nowrap" style="overflow: true">
    <tr>
        <td>Nama</td>
        <td>Nama Layanan</td>
        <td>Harga Kiloan</td>
        <td>Harga Satuan</td>
    </tr>
    @foreach ($pesanan as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->nama_layanan }}</td>
            <td>@currency($item->harga_kiloan)</td>
            <td>@currency($item->harga_satuan)</td>
        </tr>
    @endforeach
</table>

<a href="/print-laporan-pdf" class="btn btn-primary mt-4">Print</a>
</div>
</div>
<div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Pie Chart</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 670px;" width="670" height="250" class="chartjs-render-monitor"></canvas>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
