<?php

namespace App\Http\Controllers;

use App\Paket;
use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $paket = Paket::paginate(5);
        return view('paket.paket',['paket'=>$paket]);
    }

    public function tambah()
    {
        return view('paket.tambah');
    }

    public function edit($id)
    {
        $paket = Paket::find($id);
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $paket = Paket::whereId($id)->first();
        
        $paket->nama_layanan=$request->nama_layanan;
        $paket->harga_kiloan=$request->kiloan;
        $paket->harga_satuan=$request->satuan;
        $paket->save();
        
        alert()->success('Berhasil update data', 'Berhasil!');
        return back();
    }

    public function store(Request $request)
    {
        $paket = Paket::create([
            'nama_layanan' => $request->nama_layanan,
            'harga_kiloan' => $request->kiloan,
            'harga_satuan' => $request->satuan,
        ]);

        alert()->success('Berhasil membuat paket', 'Berhasil!');
        return back();
    }

    public function destroy($id){
        alert()->success('Paket berhasil dihapus', 'Berhasil!');
        Paket::whereId($id)->delete();
        return back();
    }
}
