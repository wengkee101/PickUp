@extends('layouts.app')

@section('style')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:600|Noto+Sans|Open+Sans:400,700&display=swap');
        *{
            margin: 0;
            padding: 0;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .registerbody{
            height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
            font-family: sans-serif;
            justify-content: center;
            background: url('gradient.jpg');
            background-size: cover;
            background-position: center;
        }
        .regsitercontainer{
            position: relative;
            width: 400px;
            background: white;
            padding: 60px 40px;
        }
        header{
        font-size: 40px;
        margin-bottom: 60px;
        font-family: 'Montserrat', sans-serif;
        }
        .input-field, form .button{
        margin: 25px 0;
        position: relative;
        height: 50px;
        width: 100%;
        }
        .input-field input{
        height: 100%;
        width: 100%;
        border: 1px solid silver;
        padding-left: 15px;
        outline: none;
        font-size: 19px;
        transition: .4s;
        }
        input:focus{
        border: 1px solid #1DA1F2;
        }
        .input-field label, span.show{
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        }
        .input-field label{
        left: 15px;
        pointer-events: none;
        color: grey;
        font-size: 18px;
        transition: .4s;
        }
        span.show{
        right: 20px;
        color: #111;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        user-select: none;
        visibility: hidden;
        font-family: 'Open Sans', sans-serif;
        }
        input:valid ~ span.show{
        visibility: visible;
        }
        input:focus ~ label,
        input:valid ~ label{
        transform: translateY(-33px);
        background: white;
        font-size: 16px;
        color: #1DA1F2;
        }
        form .button{
        margin-top: 30px;
        overflow: hidden;
        z-index: 111;
        }
        .button .inner{
        position: absolute;
        height: 100%;
        width: 300%;
        left: -100%;
        z-index: -1;
        transition: all .4s;
        background: -webkit-linear-gradient(right,#00dbde,#fc00ff,#00dbde,#fc00ff);
        }
        .button:hover .inner{
        left: 0;
        }
        .button button{
        width: 100%;
        height: 100%;
        border: none;
        background: none;
        outline: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
        font-family: 'Montserrat', sans-serif;
        }
        .logincontainer .auth{
        margin: 35px 0 20px 0;
        font-size: 19px;
        color: grey;
        }
        .links{
        display: flex;
        cursor: pointer;
        }
        .facebook, .google{
        height: 40px;
        width: 100%;
        border: 1px solid silver;
        border-radius: 3px;
        margin: 0 10px;
        transition: .4s;
        }
        .facebook:hover{
        border: 1px solid #4267B2;
        }
        .google:hover{
        border: 1px solid #dd4b39;
        }
        .facebook i, .facebook span{
        color: #4267B2;
        }
        .google i, .google span{
        color: #dd4b39;
        }
        .links i{
        font-size: 23px;
        line-height: 40px;
        margin-left: -90px;
        }
        .links span{
        position: absolute;
        font-size: 17px;
        font-weight: bold;
        padding-left: 8px;
        font-family: 'Open Sans', sans-serif;
        }
        .signup{
        margin-top: 50px;
        font-family: 'Noto Sans', sans-serif;
        }
        .signup a{
        color: #3498db;
        text-decoration: none;
        }
        .signup a:hover{
        text-decoration: underline;
        }
        #rememberMe{
            display:inline;
        }
    </style>
@endsection


@section('content')
    <div class="registerbody">
        <div style="width: 500px;background: white;padding: 60px 40px;" class="registercontainer">

        <header>Registration Form</header>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-field">
                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <label for="name">{{ __('Name') }}</label>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-field">
                <input id="outletname" type="text" class="@error('outletname') is-invalid @enderror" name="outletname" value="{{ old('outletname') }}" required autocomplete="outletname" autofocus>
                <label for="outletname">{{ __('Outlet Name') }}</label>

                @error('outletname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-field">
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <label for="email">{{ __('E-Mail Address') }}</label>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-field">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <label for="password">{{ __('Password') }}</label>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-field">
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
            </div>

            <br>
            <div class="button">
                <div class="inner"></div>
                <button type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
        </div>
    </div>

    <script>
        var input = document.querySelector('.pswrd');
        var show = document.querySelector('.show');
        show.addEventListener('click', active);
        function active(){
        if(input.type === "password"){
            input.type = "text";
            show.style.color = "#1DA1F2";
            show.textContent = "HIDE";
        }else{
            input.type = "password";
            show.textContent = "SHOW";
            show.style.color = "#111";
        }
        }
    </script>
@endsection
