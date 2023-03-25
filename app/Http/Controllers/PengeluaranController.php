<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use App\Pesanan;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pengeluaran()
    {
        $pengeluaran = Pengeluaran::paginate();
        return view('pengeluaran.pengeluaran')->with(compact('pengeluaran'));
    }
    public function tambah(){
        return view('pengeluaran.tambah');
    }
    public function store(Request $request){

        $pengeluaran = new Pengeluaran();

        $pengeluaran->nama=$request->nama;
        $pengeluaran->biaya=$request->biaya;
        $pengeluaran->save();

        alert()->success('Pengeluaran ditambahkan', 'Berhasil!');
        return back();

    }
    public function destroy($id){
        Pengeluaran::whereId($id)->delete();
        
        alert()->success('Data dihapus', 'Berhasil!');
        return back();

    }
    public function edit($id){
        $pengeluaran = Pengeluaran::whereId($id)->first();
        return view('pengeluaran.edit')->with(compact('pengeluaran'));
    }
    public function update(Request $request,$id){
        $pengeluaran = Pengeluaran::whereId($id)->first();

        $pengeluaran->nama=$request->nama;
        $pengeluaran->biaya=$request->biaya;
        $pengeluaran->save();

        alert()->success('Data diupdate', 'Berhasil!');
        return back();

    }
}
