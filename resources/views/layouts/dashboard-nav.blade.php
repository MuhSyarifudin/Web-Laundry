<div class="d-flex" id="wrapper" style="overflow: hidden">
    <!-- Sidebar-->
    <div class="border-end bg-dark" id="sidebar-wrapper">
        <div class="sidebar-heading bg-dark mt-2" style="color: white">
            @if (Auth::User()->avatar != "")
            <img src=" {{ URL::asset('/storage/avatars/'.Auth::User()->avatar)  }}" alt="" style="width: 100px;height: 100px;border-radius: 100px" class="mx-auto d-block">                
            @else
            {{-- <img src=" {{ URL::asset('/storage/avatars/profil.png') }} " alt="" style="width: 100px;height: 100px;border-radius: 100px" class="mx-auto d-block">--}}
            <center><a href="" style="color: white" class="mb-5"><i class="fas fa-5x fa-user-circle"></i></a></center>
            @endif
            
            <h4 style="font-size: 10pt" class="text-center mt-2 mb-0">{{ Auth::user()->name }} </h4>
            <h5 style="font-size: 8pt" class="text-center mt-1">( {{Auth::user()->username}} )</h5>
            <h5 style="font-size: 8pt" class="text-center mt-0">{{ Auth::user()->hak_akses}} </h5>
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-dark bg-dark text-white p-3" href="/dashboard"><i class="fas fa-tachometer-alt" style="margin-right: 15px"></i> Dashboard</a>
            <a class="list-group-item list-group-item-action list-group-item-dark bg-dark text-white p-3" href="/manajemen-user"><i class="fas fa-users" style="margin-right: 15px"></i> Pengguna</a>
            <a class="list-group-item list-group-item-action list-group-item-dark bg-dark text-white p-3" href="/daftar-transaksi"><i class="fas fa-money-check" style="margin-right: 11px"></i> Transaksi</a>
            <a class="list-group-item list-group-item-action list-group-item-dark bg-dark text-white p-3" href="/paket-layanan"><i class="fas fa-archive" style="margin-right: 16px"></i> Paket Laundry</a>
            <a class="list-group-item list-group-item-action list-group-item-dark bg-dark text-white p-3" href="#!"><i class="fas fa-print" style="margin-right: 16px"></i> Laporan</a>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="" id="sidebarToggle" ><i class="fas fa-bars bar" style="color: white"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <h6 class="dropdown-header">Notification</h6>
                                <a class="dropdown-item" href="#"></a>
                                <a class="dropdown-item" href="#"></a>
                              </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fas fa-sign-out-alt mr-1"></i> Logout </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>