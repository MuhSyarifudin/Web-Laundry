@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item active">Edit User</li>
@endsection
@section('konten')
<div class="card mx-auto d-block rounded-0" style="width:800px">
    <div class="card-header">
    <h6><b>Mengedit User</b></h6>
    </div>
        <div class="card-body">
        <form action="/manajemen-user/update/{{$user->id}} " method="POST">
            @csrf
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="form-group mt-2">
                <label for="username">Username  :</label>
                <input type="text" id="username" name="username" class="form-control" value=" {{old('username',$user->username)}} ">
            </div>
            <div class="form-group mt-2">
                <label for="nama">Nama  :</label>
                <input type="text" id="nama" name="nama" class="form-control" value=" {{old('nama',$user->name)}} ">
            </div>
            <div class="form-group mt-2">
                <label for="nama">Password  :</label>
                <input type="password" id="nama" name="password" class="form-control" value="" disabled>
            </div>
            <div class="form-group mt-2">
                <label for="email">Email    :</label>
                <input type="email" id="email" name="email" class="form-control" value=" {{old('email',$user->email)}} ">
            </div>
            <div class="form-group mt-2">
                <label for="role">role  :</label>
                <select name="role" id="role" class="form-control">
                    @if (old('role',$user->hak_akses=='Owner'))
                    <option value="Owner" selected="selected">Owner</option>
                    <option value="Admin">Admin</option>
                    <option value="Member">Member</option>
                    @elseif(old('role',$user->hak_akses=='Admin'))
                    <option value="Admin" selected="selected">Admin</option>
                    <option value="Member">Member</option>
                    
                    @else
                    <option value="Admin">Admin</option>
                    <option value="Member" selected="selected">Member</option>
                    @endif
                </select>
            </div>
            <div class="form-group mt-2" style="height: 40px">
                <button class="btn btn-primary" style="float: right;margin-top:20px">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection