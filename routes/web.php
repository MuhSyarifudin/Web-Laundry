<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','index');
Route::view('about','about');
Route::get('layanan',[LayananController::class,'index']);
Route::view('contact','contact');
Route::view('faq','faq');
Route::view('login','login');
Route::view('register','register');
Route::get('/download', function(){
        
        $file = public_path()."/laundry-bwi.apk";

        $headers = array(
            "Content-Type: application/apk"
        );

        return Response::download($file,"laundry-bwi.apk", $headers);
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::middleware(['owner'])->group(function () {
        Route::get('owner', "OwnerController@index");    
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('admin', "AdminController@index");
    });
 
    Route::get('/logout', function() {
        Auth::logout();
        return redirect('home');
    })->name('logout');

    Route::get('/dashboard',[HomeController::class, 'index'])->name('home');
    Route::get('/daftar-transaksi/pengeluaran',[PengeluaranController::class,'pengeluaran']);
    Route::get('/daftar-transaksi/tambah/pengeluaran',[PengeluaranController::class,'tambah']);
    Route::get('/daftar-transaksi/pengeluaran/delete/{id}',[PengeluaranController::class,'destroy']);
    Route::get('/daftar-transaksi/pengeluaran/edit/{id}',[PengeluaranController::class,'edit']);
    Route::post('/daftar-transaksi/pengeluaran/update/{id}',[PengeluaranController::class,'update']);
    Route::get('/daftar-transaksi/orderan',[PesananController::class,'orderan']);
    Route::get('/daftar-transaksi/edit/{id}',[PesananController::class,'edit']);
    Route::post('/daftar-transaksi/status-update/{id}',[PesananController::class,'status_update']);
    Route::get('/daftar-transaksi/tambah',[PesananController::class,'tambah']);
    Route::post('/tambah-pesanan',[PesananController::class,'store'])->name('tambah-pesanan');
    Route::post('/tambah-pengeluaran',[PengeluaranController::class,'store'])->name('tambah-pengeluaran');
    Route::get('/daftar-transaksi/delete/{id}',[PesananController::class,'destroy']);
    Route::get('/paket-layanan',[PaketController::class,'index']);
    Route::get('/paket-layanan/edit/{id}',[PaketController::class,'edit']);
    Route::get('/paket-layanan/tambah',[PaketController::class,'tambah']);
    Route::post('/paket-layanan/update/{id}',[PaketController::class,'update']);
    Route::get('/paket-layanan/delete/{id}',[PaketController::class,'destroy']); 
    Route::post('/tambah-paket',[PaketController::class,'store'])->name('tambah-paket');
    Route::get('/status-update/{id}',[UserController::class,'status_update']);
    Route::get('/manajemen-user/aktivasi',[UserController::class,'activation']);
    Route::get('/manajemen-user/daftar-user',[UserController::class,'user']);
    Route::get('/manajemen-user/daftar-admin',[UserController::class,'admin']);
    Route::get('/manajemen-user/daftar-owner',[UserController::class,'owner']);
    Route::get('/manajemen-user/edit/{data}',[UserController::class,'edit'])->name('edit');
    Route::get('/manajemen-user/tambah',[UserController::class,'tambah']);
    Route::get('/manajemen-user/show/{id}',[UserController::class,'show']);
    Route::post('/manajemen-user/update/{id}',[UserController::class,'update']);
    Route::get('/manajemen-user/delete/{id}',[UserController::class,'destroy']);
    Route::post('/tambah-user',[UserController::class,'store'])->name('tambah-user');
    Route::get('print-laporan-pdf',[PrintController::class,'index']);
    Route::get('laporan',[LaporanController::class,'index']);
});