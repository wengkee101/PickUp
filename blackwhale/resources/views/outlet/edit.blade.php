@extends('layouts.app')

@section('style')
<style>
 .container{
    background: #ffeaa7;
    border-radius: 10px
 }
</style>
@endsection

@section('content')
    <div class="container pt-5">
        <h2>Edit Outlet</h2>
        
        <form style = "margin-top: 3s5px;" method="post" action="{{route('editOutlet',[$outlet->id])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="nameid" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="nameid" placeholder="Name" value="{{$outlet->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="contactid" class="col-sm-3 col-form-label">Contact Number</label>
                <div class="col-sm-9">
                    <input name="contact" type="text" class="form-control" id="contactid" placeholder="Contact Number" value="{{$outlet->contact}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="emailid" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input name="email" type="text" class="form-control" id="emailid" placeholder="Email Address" value="{{$outlet->email}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="addressid" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                    <input name="address" type="text" class="form-control" id="addesssid" placeholder="Address" value="{{$outlet->address}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="cityid" class="col-sm-3 col-form-label">City</label>
                <div class="col-sm-9">
                    <input name="city" type="text" class="form-control" id="cityid" placeholder="City" value="{{$outlet->city}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="postcodeid" class="col-sm-3 col-form-label">PostCode</label>
                <div class="col-sm-9">
                    <input name="postcode" type="text" class="form-control" id="postcodeid"  placeholder="PostCode" value="{{$outlet->postcode}}">
                </div>
            </div>
            <!--div class="form-group row">
                <label for="postcodeid" class="col-sm-3 col-form-label">PostCode</label>
                <div class="col-sm-9">
                    <input name="postcode" type="file" id="postcodeid" class="custom-file-input">
                    <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
                </div>
            </div-->
            <br>
            <div class="form-group row">
                <div class="offset-sm-3 col-sm-9">
                    <input name="_method" type="hidden" value="POST">
                    <button type="submit" class="btn btn-success float-right">Save Edit</button>
                </div>
            </div>
        </form>

    </div>
@endsection