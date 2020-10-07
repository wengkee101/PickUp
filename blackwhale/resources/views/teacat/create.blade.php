@extends('layouts.app')

@section('style')

    <style>
        body{
            background: rgb(255,178,62);
            background: linear-gradient(180deg, rgba(255,178,62,1) 0%, rgba(255,179,71,1) 15%, rgba(255,204,51,1) 40%, rgba(255,221,62,1) 70%);
            height: 100vh;
        }

        .form-container{
            padding:  50px 120px 20px 120px;
        }

        .jumbotron{
            background: #ffeaa7;
        }

        body{
        }

        .custom-file {
            width: 72%;
            margin-left:15px;
            min-width: 0;
            margin-bottom: 0;
        }

        .head{
            position: relative;
            font-size: 7rem;
            color: black;
            margin: 0;
        }

        .upside{
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
            height: 300px;
        }

        .leftside{
            position: relative;
            top: 10rem;
            left: 2rem;

        }

        img{
            width: 80px;
            border-radius: 10px;
        }
        .btn-light{
            background-color: #fdcb6e;
        }

        .btn-light:hover{
            background-color: orange;
        }

    </style>

@endsection

@section('content')

<div class="container">
    
    <div class="form-container jumbotron">
        <a href="/teas" class="btn btn-light mb-5"><i class="fas fa-chevron-circle-left"></i> Previous</a>

        <div class="upside">
            <div class="leftside">
                <h2 style = ""class="head">Add Menu Category</h2>
    
            </div>
            <div class="rightside">
                <!--image preview-->
                <img id="output" src="/storage/upload/menu/noimage.jpg" style="width: 300px; height: 300px;">
                <br>
            </div>
        </div>
        
        <form method="post" action="{{route('addTeaCat')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="nameid" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" id="nameid" placeholder="Name" required>
                </div>
            </div>

            <br>
            <div class="form-group row">
                <label for="photos" class="col-sm-3 col-form-label">Image Upload</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" onchange="loadFile(event)" required>
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            
            <br>
            <div class="form-group row">
                <div class="offset-sm-3 col-sm-9">
                    <button type="submit" class="btn btn-success float-right">Submit Form</button>
                </div>
            </div>
        </form>
    </div>  
</div>

    
    <script>
        var loadFile = function(event){
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection