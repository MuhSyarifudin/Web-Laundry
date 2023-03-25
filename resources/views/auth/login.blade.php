
        @extends('layouts.app')
        @section('title','Login')
        @section('content')
        <div class="container">
            <div class="kotak card card-primary rounded-0 shadow mt-5">
                <div class=" rounded-0 m-0" style="height: 50px;">
                    <div class="container card-header">
                        <h5 class="judul text-center text-primary">Masuk</h5>
                    </div>
                </div>
                <div class="container card-body rounded-0 m-0">
                    <form class="m-0" action="{{ route('login') }}" method="POST">
                        @csrf
                        @if (Session::has('error'))
                            <div class="alert alert-danger mb-0" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif  
                        <div class="input-group">
                            <div class="input-group mb-3" style="margin-bottom: 5px;">
                                <div class="alert alert-success form-control" style="margin-bottom: 0px;display: none;">Berhasil Login</div>
                                <div class="alert alert-danger form-control" style="margin-bottom: 0px;display: none;">Username/Password salah</div>
                            </div>
                            <div class="input-group mb-1" style="margin-bottom: 0px;">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input id="username" type="text" class="form-control @error('email') is-invalid @enderror" name="username" value="" required autocomplete="username" autofocus placeholder="Username">
                            </div>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="input-group mb-1 mt-2" id="">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                <input type="password" id="password" class="form-control pwd @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                                <div class="input-group-text" >
                                    <a href="" class="reveal"><i class="fas fa-eye eye"></i></i></a>
                                </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror    
                            </div>
                              <div class="col ">
                                  <a href="{{ route('password.request') }}" class="link forget" style="float: right;">Lupa password ?</a>
                              </div>
                              <div class="input-group">
                            <button class=" btn btn-primary btn-login btn-block btn-lg rounded-2 form-control mt-1">Login</button>
                             </div>
                             <div class="col mt-4">
                                 <p class="text-center">Belum punya akun ? <a href="/register" class="link">Mendaftar</a></p>
                             </div>
                        </form>
                </div>
            </div>
        </div>
        
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f67ea26c71.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
   $(".reveal").on('click',function(e) {
    e.preventDefault()

    var $pwd = $(".pwd");
    var $eye = $(".eye");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
        $eye.removeClass('fa-eye');
        $eye.addClass('fa-eye-slash');
    } else if ($pwd.attr('type') === 'text') {
        $pwd.attr('type', 'password');
        $eye.removeClass('fa-eye-slash');
        $eye.addClass('fa-eye');
    }
});
        </script>
@endsection    