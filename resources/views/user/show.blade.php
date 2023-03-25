@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item"> <a class="text-decoration-none" href="/manajemen-user/aktivasi">Aktvasi Akun</a></li>
    <li class="breadcrumb-item active">Detail User</li>
@endsection
@section('konten')
<div class="card mx-auto d-block" style="width:800px">
    <div class="card-header text-center">
    <h6><b>User Detail</b></h6>
    </div>
        <div class="card-body">
            <div class="form-group">
                @if ($user->avatar)
                <img src="{{ URL::asset('/storage/avatars/'.$user->avatar)  }}" alt="" width="200px" height="200px">    
                @else
                
                @endif    
            </div>
            <table style="border:0px;border-collapse: true" >
                <tr>
                    <td> <b>Username</b> </td>
                    <td> <b>:</b> </td>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <td> <b>Nama</b> </td>
                    <td> <b>:</b> </td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td> <b>Email</b> </td>
                    <td> <b>:</b> </td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td> <b>role</b> </td>
                    <td> <b>:</b> </td>
                    <td>{{ $user->hak_akses }}</td>
                </tr>     
            </table>
        
    </div>
</div>
@endsection