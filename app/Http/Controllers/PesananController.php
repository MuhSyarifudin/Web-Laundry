<?php

namespace App\Http\Controllers;

use App\v_transaksi;
use App\Paket;
use App\pengeluaran;
use App\Pesanan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orderan()
    {
        $pesanan = v_transaksi::paginate(5);
        return view('pesanan.orderan')->with(compact('pesanan'));
    }
    public function status_update(Request $request, $id){
        
        $pesanan = Pesanan::where('id_pesanan',$id)->first();

        $pesanan->pembayaran=$request->pembayaran;
        $pesanan->id_status=$request->status;
        $pesanan->save();
        
        alert()->success('Berhasil update data', 'Berhasil!');
        return back();
        
    }
    public function edit($id)
    {
        $pesanan = Pesanan::where('id_pesanan',$id)->first();
        return view('pesanan.edit', compact('pesanan'));
    }
    public function tambah()
    {
        $user = User::where('hak_akses','Member')->get();
        $paket = Paket::get();
        return view('pesanan.tambah')->with(compact('user'))->with(compact('paket'));
    }
    public function store(Request $request){
        $pesanan = new Pesanan();

        $pesanan->id_user=$request->id_user;
        $pesanan->id_list_harga=$request->id_layanan;
        $pesanan->pickup=$request->pickup;
        $pesanan->delivery=$request->delivery;
        $pesanan->delivery_location = $request->delivery_latitude.", ".$request->delivery_longitude;
        $pesanan->pickup_location = $request->pickup_latitude.", ".$request->pickup_longitude;
        $pesanan->pembayaran=$request->pembayaran;
        $pesanan->id_status=$request->status;
        $pesanan->save();

        alert()->success('Pesanan di tambahkan', 'Berhasil!');
        return back();
    }
    public function destroy($id){
        $pesanan = Pesanan::where('id_pesanan',$id);
        $pesanan->delete();

        alert()->success('Pesanan dihapus', 'Berhasil!');
        return back();
    }
    
}
