<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $role = Auth::user()->hak_akses;
        
        if($role == "Owner"){          
            return redirect("owner");
        } 
        else if($role == "Admin"){    
            if (!Auth::user()->is_actived){
            Auth::logout();
            return redirect('/login')->with('error','Akun anda tidak aktif');
            }    
        return redirect("admin");
        }
        else if($role == "Member"){
            Auth::logout();
            return redirect('/login')->with('error','Tidak bisa login sebagai user');
        }
        else {
            Auth::logout();
            return redirect('/');
        }
    }



    
}
