<?php

namespace App\Http\Controllers;

use App\Pesanan;
use App\User;
use App\v_transaksi;
use App\Pengeluaran;

class AdminController extends Controller
{
    public function index(){
        $user = User::where('hak_akses','Member')->get(); 
        $pesanan = Pesanan::where('id_status','belum selesai')->get();
        $transaksi = v_transaksi::get();
        $activate = User::where('is_actived','')->where('is_actived','0')->get();

        return view("page.home")->with(compact('user'))->with(compact('pesanan'))->with(compact('activate'))->with(compact('transaksi'));
    }

}
