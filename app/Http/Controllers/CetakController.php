<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class CetakController extends Controller
{
    function index(){
        $pdf = PDF::loadView('pdf.laporan');
        return $pdf->download('invoice.pdf');
    }
}
