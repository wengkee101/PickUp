<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/joan.css" rel="stylesheet">
        <style>
            body{
                background-image: url('img/waiter.jpg');
                background-repeat: no-repeat;
                background-size: 1700px 800px;
            }
        </style>
           
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="/">Home</a>
            <a href="/about">About</a>
            <a href="/teaseries">Tea Series</a>
            <a href="/messages">FeedBack</a>
            <a href="/outlets">Outlet</a>
            <div class="topnav-right">
                <a href="/stafflogin">Login</a>
                <a href="#guestmode">Guest Mode</a>
            </div>
        </div>
        @include('message')
        @yield('content')

    </body>
</html>
