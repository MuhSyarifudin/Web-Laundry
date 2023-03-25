@extends('layouts.master-2')
@section('title','Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item"><a class="text-decoration-none" href=" @if (Auth::user()->hak_akses == 'Admin')
        /admin
    @else
        /owner
    @endif ">Dashboard</a></li>
    <li class="breadcrumb-item active"> </li>
@endsection
@section('konten')
<div class="container">
    <div class="card justify-content-lg-center rounded-0">
        <div class="card-header">
            <h6 style="font-weight: bold;float: left" class="m-0">Tabel Pengguna</h5>
            <a href="/manajemen-user/tambah" class="btn btn-primary btn-sm" style="float: right"> <b>+</b> Tambah Data</a>
        </div>
        <div class="card-body">
            <table id="myTable" class="table table-bordered text-nowrap">
               <thead>
                     <tr>
                        <th class="col-1">No</th>
                        <th class="col-1">Username</th>
                        <th class="col">Nama</th>
                        <th class="col">Email</th>
                        <th class="col">Role</th>
                        <th class="col">Opsi</th>    
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;    
                    @endphp
                @foreach ($user as $key => $data)
                        <tr>
                            <td class="col-1">{{ $user->firstItem() + $key }}</td>
                            <td class="col-1">{{ $data->username }}</td>
                            <td class="col">{{ $data->name }}</td>
                            <td class="col">{{ $data->email }}</td>
                            <td class="col">{{ $data->hak_akses }}</td>
                            <td class="col text-center align-middle">
                                @if (Auth::User()->hak_akses == "Admin")
                                    @if ($data->hak_akses == "Owner")
                                         
                                    @else
                                        <a href="/manajemen-user/edit/{{$data->id}}" class="bg-primary rounded-1 text-center" style="color: white;width: 50px;height: 50px;padding: 5px"><i class="fas fa-pen" style="width: 15px;margin: 5px"></i><a href="/manajemen-user/delete/{{$data->id}}" class="bg-danger rounded-1 text-center" style="color: white;width: 50px;height: 50px;padding: 5px;margin-left:5px;"><i class="far fa-trash-alt" style="width: 15px;margin: 5px"></i>
                                    @endif
                                @else
                                <a href="/manajemen-user/edit/{{$data->id}}" class="bg-primary rounded-1 text-center" style="color: white;width: 50px;height: 50px;padding: 5px"><i class="fas fa-pen" style="width: 15px;margin: 5px"></i><a href="/manajemen-user/delete/{{$data->id}}" class="bg-danger rounded-1 text-center" style="color: white;width: 50px;height: 50px;padding: 5px;margin-left:5px;"><i class="far fa-trash-alt" style="width: 15px;margin: 5px"></i>
                                @endif
                            </td>
                                
                        </tr>
                    @endforeach($user)
                </tbody>
            </table>
            </div>
    </div>

</div>                
@endsection