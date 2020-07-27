@extends('master')
@section('style')
<style>
    body{
        background-image: url('img/bg.png');
        background-repeat: no-repeat;
        background-size: 1600px 900px;
    }
</style>
@endsection
    @section('content')
    <div>
        <img src="img/logo.png" alt="blackwhale logo" id="logohome">
        
        <div class="boxie">
            <h1>login</h1>
            <input type="text" placeholder="Username"><br>
            <input type="password" placeholder="Password"><br>

            <button type="submit" name="staffLoginBtn">Login</button><br>
            <a href="#forgetPassword">Forget Password?</a><br>
            <a href="#regsiter">Register</a><br>
        </div>
    </div>
    
    
    @endsection