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
        .loginbody{
            height: 80vh;
            display: flex;
            align-items: center;
            text-align: center;
            font-family: sans-serif;
            justify-content: center;
            background: url(bg.jpg);
            background-size: cover;
            background-position: center;
        }
        .logincontainer{
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
            /* background: -webkit-linear-gradient(right,#00dbde,#fc00ff,#00dbde,#fc00ff); */
            background: linear-gradient(315deg, rgba(64,22,4,1) 0%, rgba(127,43,8,1) 26%, rgba(236,213,33,1) 80%, rgba(255,255,255,1) 100%);  

        }
        .button:hover .inner{
            left: -60%;
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
        #rememberMe{
            display:inline;
        }
    </style>
@endsection


@section('content')
    <div class="loginbody">
        <div class="logincontainer">
            <header>Login Form</header>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!--email-->
                <div class="input-field">
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!--password-->
                <div class="input-field">
                    <input  class="pswrd" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    
                    <label for="password">{{ __('Password') }}</label>
                    <span class="show">SHOW</span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!--login-->
                <div class="form-group ">
                    <div class="button">
                        <div class="inner"></div>
                        <button type="submit">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
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
