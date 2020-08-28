@extends('layout.head')           <!--Customer Layout-->

@section('style')
<style>
    .jumbotron {
        padding: 2rem 1rem;
        margin-bottom: 2rem;
        background-color: #e9ecef;
        margin-left: 10rem;
        border-radius: 0.3rem;
    }

    form {
        display: block;
        margin-top: 0em;
        margin-block-end: 1em;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .containercm {
        width: 70%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: 15rem;
    }

    .form-control {
        display: block;
        width: 90%;
        height: calc(1.6em + 0.75rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 0.9rem;
        font-weight: 400;
        line-height: 1.6;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 0.9rem;
        line-height: 1.6;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn-primary {
        color: #fff;
        background-color: #3490dc;
        border-color: #3490dc;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #227dc7;
        border-color: #2176bd;
    }

    .btn-primary:focus,
    .btn-primary.focus {
        color: #fff;
        background-color: #227dc7;
        border-color: #2176bd;
        box-shadow: 0 0 0 0.2rem rgba(82, 161, 225, 0.5);
    }

    .btn-primary.disabled,
    .btn-primary:disabled {
        color: #fff;
        background-color: #3490dc;
        border-color: #3490dc;
    }

    .btn-primary:not(:disabled):not(.disabled):active,
    .btn-primary:not(:disabled):not(.disabled).active,
    .show > .btn-primary.dropdown-toggle {
        color: #fff;
        background-color: #2176bd;
        border-color: #1f6fb2;
    }

    .btn-primary:not(:disabled):not(.disabled):active:focus,
    .btn-primary:not(:disabled):not(.disabled).active:focus,
    .show > .btn-primary.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(82, 161, 225, 0.5);
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-inline .form-group {
        display: flex;
        flex: 0 0 auto;
        flex-flow: row wrap;
        align-items: center;
        margin-bottom: 0;
    }

    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    textarea {
        overflow: auto;
        resize: vertical;
    }
    textarea.form-control {
        height: auto;
    }

    .input-group-lg > .form-control:not(textarea),
    .input-group-lg > .custom-select {
        height: calc(1.5em + 1rem + 2px);
    }

    .input-group-lg > .custom-select{
        padding: 0.5rem 1rem;
        font-size: 1.125rem;
        line-height: 1.5;
        border-radius: 0.3rem;
    }

    select,
    optgroup,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    select {
        text-transform: none;
    }

    select {
        word-wrap: normal;
    }
    select.form-control:focus::-ms-value {
        color: #495057;
        background-color: #fff;
    }
    select.form-control[size],
    select.form-control[multiple] {
        height: auto;
    }

    input{
        margin-top: 15px;
    }

    select{
        margin-top:15px;
    }



</style>
@endsection

@section('content')
<img width="481" height="96"  style="margin-left:400px;" src = "/image/k.jpg">
@endsection

@section('contentcm')

    <h1 style="margin-left: 170px">Franchise Opportunities Form</h1>
    <div class="jumbotron" style="padding-top:2rem; padding-left:4rem;">

    <form action="{{ route('addform') }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Full Name" >
                    @error('name')
                            <span style="color: red">{{$message}}</span>
                    @enderror
            </div>
            <div class="form-group">
                <label>E-Mail</label>
                <input type="email" name="email" class="form-control" placeholder="example0000@example.com" >
                    @error('email')
                            <span style="color: red">{{$message}}</span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="phoneno" class="form-control" placeholder="+60-12 345 6789">
                    @error('phoneno')
                            <span style="color: red">{{$message}}</span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="">Interested Location</label>
                <input type="text" name="location" class="form-control" placeholder="MidValley @ KL" >
                    @error('location')
                            <span style="color: red">{{$message}}</span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="">Do you have any F&B Experience</label>
                <select style = "width:92.5%;" class="form-control" name="FoodAndBeverage_Experience" id="" >
                    <option value="">Choose an Option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                    @error('FoodAndBeverage_Experience')
                            <span style="color: red">{{$message}}</span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="">Is your First Franchise?</label>
                <select style = "width:92.5%;" class="form-control" name="First_Franchise" id="">
                    <option value="">Choose an Option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                    @error('First_Franchise')
                            <span style="color: red">{{$message}}</span>
                    @enderror
            </div>

            <div class="content-group">
                <label>Message</label>
                <textarea style = "margin-top:15px;" class="form-control" name="Message" id cols="10" rows="10" placeholder="Message"></textarea>
                    @error('Message')
                            <span style="color: red">{{$message}}</span>
                    @enderror
            </div>

            <hr style = "margin-top: 15px;">
            
            <button style = "margin-top: 15px;" type="submit" name="submit" class="btn btn-primary">Submit Form</button>
    
        </form>
    </div>
@endsection
    

    
