<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Black Whale</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f49da65cfc.js" crossorigin="anonymous"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/joan.css') }}" rel="stylesheet">
    
    <!--bootstrap icon-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Sweet Alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <link rel="icon" href="/storage/upload/menu/74831-200.ico">
    
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap%27');
        
       body{
            background-image: url('/image/Background1.png');
            background-repeat:no-repeat;
            background-size: cover;
            width: 100%;
            height: 100vh;
            background-position: center;    
        }

        div._Container
        {
            position:sticky;
            position:-webkit-sticky;
            top:0;
            font-family: 'Anton';
            margin: 0 auto;
            padding: 0;
        }

        .leftnav{
            float:left;
            
        }
        
        div._container
        {
            position:sticky;
            position:-webkit-sticky;
            top:0;
            font-family: 'Anton';
            margin: 0 auto;
            padding: 20px 10px;
        }

        div._container a
        {
            color:  #fff;
            text-decoration: none;
            font: 20px 'Anton';
            margin: 0 10px;
            letter-spacing: 5px;
            padding: 10px 10px;
            position: relative;
            z-index: 0;
            cursor: pointer;
        }
        
        .green 
        {
            background: rgb(255,178,62);
            background: linear-gradient(0deg, rgba(255,178,62,1) 25%, rgba(255,179,71,1) 50%, rgba(255,204,51,1) 80%, rgba(255,221,62,1) 95%);
        }
        
        /* Border X get width  */
        div.borderXwidth a:before, div.borderXwidth a:after
        {
            position: absolute;
            opacity: 0;
            width: 0%;
            height: 2px;
            content: '';
            background: #FFF;
            transition: all 0.3s;
        }

        div.borderXwidth a:before
        {
            left: 0px;
            top: 0px;
        }

        div.borderXwidth a:after
        {
            right: 0px;
            bottom: 0px;
        }

        div.borderXwidth a:hover:before, div.borderXwidth a:hover:after
        {
            opacity: 1;
            width: 100%;
        }
    </style>
    
    @yield('style')

</head>

<body>
    @include('sweetalert::alert')

    <div>
        <div class="_Container">
            <div class="_container green borderXwidth">

                <!--left nav-bar-->
                @guest
                <div class="leftnav">
                    <a href="{{ url('/') }}">
                        {{ config('app.name', 'Black Whale') }}
                    </a>
                </div> 
                    
                @else
                        <a href="/orders">USER ORDERS</a>
                        <a href="/teas">EDIT MENU</a>
                        <a href="/outlets">ADD OUTLET</a>
                        <a href="/eventupdate">EVENT UPDATES</a>
                        <a href="/franchise_page">FRANCHISE PAGE</a>
                @endguest

                <!--right nav-bar-->
                @guest
                    <a href="{{ route('login') }}">{{ __('LOGIN') }}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                
                    @endif         
                
                
                @else
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('LOGOUT') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
                
            </div>
        </div>
    </div>

    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

</div>
    @yield('script')
</body>


</html>
