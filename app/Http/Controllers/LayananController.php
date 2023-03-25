<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;

class LayananController extends Controller
{
    public function index(){
    $layanan1 = Paket::whereNotNull("harga_kiloan")->get();
    $layanan2 = Paket::whereNotNull("harga_satuan")->get();
    return view('layanan')->with(compact('layanan1','layanan2'));
    }
}
