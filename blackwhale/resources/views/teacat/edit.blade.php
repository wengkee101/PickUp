@extends('layouts.app')

@section('style')

    <style>
        body{
            background: rgb(255,178,62);
            background: linear-gradient(180deg, rgba(255,178,62,1) 0%, rgba(255,179,71,1) 15%, rgba(255,204,51,1) 40%, rgba(255,221,62,1) 70%);
            height: 100%;       
        }

        .form-container{
            padding:  50px 120px 20px 120px;
        }

        .jumbotron{
            background: #ffeaa7;
        }

        .custom-file {
            width: 72%;
            margin-left:15px;
            min-width: 0;
            margin-bottom: 0;
        }

        .head{
            font-size: 7rem;
            height: 100px;
        }



    </style>

@endsection

@section('content')

<div class="container">
    <br>
    
    <div class="form-container jumbotron">
        <a href="/teas" class="btn btn-light mb-5">Go Back</a>

        <h2 style = "" class="head">Edit Menu Category</h2>

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