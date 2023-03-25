<?php

namespace App\Http\Controllers;

use App\v_transaksi;
use PDF;

class PrintController extends Controller
{
    function index(){
        $pesanan = v_transaksi::where('status','selesai')->get();
        $sum1 = v_transaksi::where('status','selesai')->sum('harga_kiloan');
        $sum2 = v_transaksi::where('status','selesai')->sum('harga_satuan');
        $pdf = PDF::loadView('pdf.laporan',compact('pesanan','sum1','sum2'));
        return $pdf->download('Laporan.pdf');
        // return view('pdf.laporan',compact('pesanan','sum1','sum2'));
    }
}
