<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title' ?? 'Dashboard')</title>
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css')}}>
  <style>
    * {
      font-family: source sans pro, sans-serif;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <!---Logout Button---->
      <li class="dropdown dropdown-list-toggle">
        <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-user"></i><i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right p-0">
          <div class="dropdown-header">
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fas fa-sign-out-alt mr-1"></i> Logout </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" 
                            class="d-none">
                            @csrf
                          </form>
          </div>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (Auth::user()->avatar)
          <img src="{{ URL::asset('/storage/avatars/'.Auth::User()->avatar)  }}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{ URL::asset('/storage/avatars/avatar-1.png') }}" class="img-circle elevation-2" alt="">
          @endif
          
        </div>
        <div class="info">
          <a href="#" class="d-block text-decoration-none">{{Auth::user()->username}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            @if (Auth::user()->hak_akses == "Owner")
            <a href="/owner" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            @else
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            @endif
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manajemen User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/manajemen-user/aktivasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aktivasi Akun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/manajemen-user/daftar-owner" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Owner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/manajemen-user/daftar-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/manajemen-user/daftar-user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/daftar-transaksi/pengeluaran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengeluaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/daftar-transaksi/orderan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orderan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/paket-layanan" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Paket Laundry
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/laporan" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @yield('breadcrumb')
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      @yield('konten')
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('adminlte/js/adminlte.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
{{-- sweet alert --}}
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqfs_2SoY4YteDlc7hZEB9HU6FVLC3kns&libraries=places"></script>
<script>
$(document).ready(() => {

  $('.autocomplete').each(function() {
    let autocomplete = new google.maps.places.Autocomplete(this);
    autocomplete.addListener('place_changed', () => {
      const place = autocomplete.getPlace();
      console.log(place)
      const lat = place.geometry.location.lat()
      const lng = place.geometry.location.lng()
      $("#pickup-latitude").val(lat)
      $("#pickup-longitude").val(lng)
    });
  });
  $('.autocomplete2').each(function() {
    let autocomplete = new google.maps.places.Autocomplete(this);
    autocomplete.addListener('place_changed', () => {
      const place = autocomplete.getPlace();
      
      const lat = place.geometry.location.lat()
      const lng = place.geometry.location.lng()
      $("#delivery-latitude").val(lat)
      $("#delivery-longitude").val(lng)
    });
  });
})
</script>
@stack('js')
@include('sweet::alert')
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<script>
    $(function () {
      $('#myTable').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "pageLength": 5,
      });
    });
  </script>
</body>
</html>
