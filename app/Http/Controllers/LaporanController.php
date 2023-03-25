<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use App\v_transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        $pesanan = v_transaksi::where('status','selesai')->get();
        $pengeluaran = Pengeluaran::get();

        return view('laporan.laporan',compact('pesanan','pengeluaran'));
    }
}
