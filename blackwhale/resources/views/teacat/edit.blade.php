@extends('layouts.app')

@section('style')

    <style>
        .form-container{
            -webkit-box-shadow: inset 10px 7px 5px -3px rgba(0,0,0,0.75);
            -moz-box-shadow: inset 10px 7px 5px -3px rgba(0,0,0,0.75);
            box-shadow: inset 10px 7px 5px -3px rgba(0,0,0,0.75);
            padding:  50px 120px 20px 120px;
        }

        .custom-file {
            width: 72%;
            margin-left:15px;
            min-width: 0;
            margin-bottom: 0;
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
    <a href="/teas" class="btn btn-light mb-5">Go Back</a>
    
    <h2 style = "color:white;" class="head">Edit Menu Category</h2>
    
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
                <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" onchange="loadFile(event)" >
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <!--image preview-->
            <img id="output" src="{{asset('/storage/upload\menu/'. $teacategory->image)}}" style=" margin-left: 255px; height: 30%; width: 30%; display:block; text-align: center; border-radius: 15px">

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