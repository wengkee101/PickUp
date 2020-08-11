@extends('layouts.app')

@section('style')

    <style>
        .form-container{
            -webkit-box-shadow: inset 10px 7px 5px -3px rgba(0,0,0,0.75);
            -moz-box-shadow: inset 10px 7px 5px -3px rgba(0,0,0,0.75);
            box-shadow: inset 10px 7px 5px -3px rgba(0,0,0,0.75);
            padding:  50px 120px 20px 120px;
        }

        .head{
            text-align: center;
            padding-bottom:20px;
        }
    </style>

@endsection

@section('content')

<div class="container">
    <br>
    <h2 class="head">Edit Menu Category</h2>
    
    <div class="form-container jumbotron">
        
        <form method="post" action="{{route('editTeaCat',[$teacategory->id])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="nameid" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" id="nameid" placeholder="Name" value="{{$teacategory->name}}">
                </div>
            </div>

            <br>
            <div class="form-group row">
                <label for="photos" class="col-sm-3 col-form-label">Image Upload</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="photos" name="image" onchange="loadFile(event)">
                </div>
            </div>
            <!--image preview-->
            <img id="output" src="/img/{{$teacategory->image}}">

            <br><br>
            <div class="form-group row">
                <div class="offset-sm-3 col-sm-9">
                    <button type="submit" class="btn btn-success btn-lg float-right">Confirm</button>
                </div>
            </div>
        </form>
    </div>  
</div>

    <script src="./path/to/dropzone.js"></script>
    <script>
        var loadFile = function(event){
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection