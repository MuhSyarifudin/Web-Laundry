<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use App\v_transaksi;
use App\Pesanan;
use App\User;

class OwnerController extends Controller
{
    public function index(){
        $user = User::where('hak_akses','Member')->get(); 
        $pesanan = Pesanan::where('id_status','belum selesai')->get();
        $transaksi = v_transaksi::get();
        $activate = User::where('is_actived','')->where('is_actived','0')->get();

        return view("page.home")->with(compact('user'))->with(compact('pesanan'))->with(compact('activate'))->with(compact('transaksi'));
    }
}
