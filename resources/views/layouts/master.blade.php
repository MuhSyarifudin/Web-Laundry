<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/Stylesheet1.css">
        <link rel="stylesheet" href="../css/Stylesheet2.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../adminlte/plugins/select2/css/select2.min.css">
        @yield('style') 
    </head>
    <body>
    @include('layouts.navigation')  
      @yield('konten')
          <script src="../bootstrap/js/bootstrap.js"></script>
          <script src="../bootstrap/js/bootstrap.min.js"></script>
          <script src="../adminlte/plugins/select2/js/select2.full.min.js"></script>
      @yield('footer')
        </body>
</html>