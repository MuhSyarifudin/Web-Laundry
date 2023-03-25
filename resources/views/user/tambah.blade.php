@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item active">Tambah User</li>
@endsection
@section('konten')
<div class="card mx-auto d-block rounded-0" style="width:800px">
    <div class="card-header">
    <h6><b>Menambah User</b></h6>
    </div>
        <div class="card-body" style="height: auto">
            @if (Session::has('success'))
                <script>
                swal({!! Session::get('success') !!});
                </script>
            @endif
        <form action="{{route('tambah-user')}}" method="">
            @csrf
            <div class="form-group mt-2">
                <label for="username">Username  :</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="nama">Nama  :</label>
                <input type="text" id="nama" name="name" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="password">Password  :</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="email">Email    :</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="role">role  :</label>
                <select name="role" id="role" class="form-control">
                    <option value="Admin">Admin</option>
                    <option value="Member">Member</option>
                </select>
            </div>
            <div class="form-group" style="height: 40px">
                <button class="btn btn-primary" style="float: right;margin-top: 20px">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection