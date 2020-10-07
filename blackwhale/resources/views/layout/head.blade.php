<!DOCTYPE html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" >
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="/css/black.css">
    <link rel="stylesheet" href="/css/cm.css"> --}}
    {{-- <link href="https://fofamily=nts.googleapis.com/css?Open+Sans:300,400,700&display=swap" rel="stylesheet"> --}}
    <link href="/css/slick.css" rel="stylesheet" type="text/css" />
    <link href="/css/slick-theme.css" rel="stylesheet" type="text/css" />

    <link rel="icon" href="/storage/upload/menu/74831-200.ico">

    @yield('link')
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/view.css">
    @yield('style')

    <title>Black Whale</title>

    @yield('script')
    
    <script src="https://kit.fontawesome.com/f49da65cfc.js" crossorigin="anonymous"></script>

  </head>

  <body>
    @include('inc.usernav')
    @include('sweetalert::alert')

    @yield('content')

  </body>

</html>