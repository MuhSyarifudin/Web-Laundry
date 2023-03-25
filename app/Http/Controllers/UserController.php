<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use SweetAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;
use UxWeb\SweetAlert\SweetAlert as SweetAlertSweetAlert;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function user()
    {   $user = User::where('hak_akses','Member')->paginate(5);
        $link = 'Data User';
        return view('user.user', compact('user','link'));
    }
    public function admin()
    {
        $user = User::where('hak_akses','Admin')->paginate(5);
        $link = 'Data Admin';
        return view('user.user', compact('user','link'));
    }
    public function owner()
    {
        $user = User::where('hak_akses','Owner')->paginate(5);
        $link = 'Data Owner';
        return view('user.user', compact('user','link'));
    }
    public function edit($id)
    {
        $user = User::whereId($id)->first();
        return view('user.edit', compact('user'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }
    public function update(Request $request, $id)
    {

        $user = User::whereId($id)->first();
        
        $user->username=$request->username;
        $user->name=$request->nama;
        $user->email=$request->email;
        $user->hak_akses=$request->role;
        $user->save();

        alert()->success('Berhasil update data', 'Berhasil!');
        return back();
    }
    public function tambah()
    {
        return view('user.tambah');
    }
    public function store(Request $request)
    {   
        $Username = $request->input('username');
        $Nama = $request->input('name');
        $Email = $request->input('email');
        $Pass = $request->input('password');
        $Role = $request->input('role');

        $response = Http::post('http://localhost:8080/api/usr/v1/s', [    
                'username' => $Username,
                'name' => $Nama,
                'email' => $Email,
                'password' => $Pass,
                'role' => $Role
            ]
        );

        if($response->status() == 200 ){
            alert()->success('Berhasil membuat akun', 'Berhasil!');
            return back();
        }else {
            alert()->error('Gagal membuat akun', 'Gagal!');
            return back();
        }
        
    }
    public function destroy($id)
    {
        User::whereId($id)->delete();
        alert()->success('Data berhasil dihapus', 'Berhasil!');
        return back();
    }
    public function activation()
    {
        $user = User::where('hak_akses', 'Admin')->simplepaginate(10);
        return view('user.aktif', compact('user'));
    }
    public function status_update($id)
    {
        $user = User::whereId($id)->first();

        if ($user->is_actived == 1) {
            $status = 0;
        }else {
            $status = 1;
        }

        $values = array('is_actived' => $status);
        User::whereId($id)->update($values);
        return back()->with('success','User status has been updated');
    }
}