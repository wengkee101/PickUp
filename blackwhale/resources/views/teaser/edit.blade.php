@extends('layouts.app')

@section('style')

    <style>
        body{
            background: rgb(255,178,62);
            background: linear-gradient(180deg, rgba(255,178,62,1) 0%, rgba(255,179,71,1) 15%, rgba(255,204,51,1) 40%, rgba(255,221,62,1) 70%);
            height: 100%;
        }
        
        .form-container{
            background: #ffeaa7;
            padding:  50px 120px 20px 120px;
        }

        .custom-file {
            width: 72%;
            margin-left:15px;
            min-width: 0;
            margin-bottom: 0;
        }

        .head{
            font-size: 7rem;
            padding-bottom:20px;
        }
    </style>

@endsection

@section('content')

<div class="container">

    <div class="form-container jumbotron">
        <a href="/teas" class="btn btn-light mb-5">Go Back</a>
    
        <h2  style="" class="head">Edit Menu Series</h2>

        <form method="post" action="{{route('editTeaSer', [$teaserie->id])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="nameid" class="col-sm-3 col-form-label">Category Name</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" id="nameid" placeholder="Name" value="{{$teacategory->name}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="nameid" class="col-sm-3 col-form-label">Series Name</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" id="nameid" placeholder="Name" value="{{$teaserie->name}}">
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
            <img id="output" src="{{asset('/storage/upload\menu/'. $teaserie->image)}}" style=" margin-left: 255px; height: 30%; width: 30%; display:block; text-align: center; border-radius: 15px">

            <br><br>
            <div class="form-group row">
                <label for="descriptionid" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea name="description" type="text" class="form-control" id="descriptionid" placeholder="Description" rows="5" cols="50">{{$teaserie->description}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="priceid" class="col-sm-3 col-form-label">Price (RM)</label>
                <div class="col-xs-2">
                    <input name="price" type="text" class="form-control" id="priceid" placeholder="Price" value="{{number_format($teaserie->price, 2)}}">
                </div>
            </div>
            <br>

            <div class="form-group row">
                <label for="rateid" class="col-sm-3 col-form-label">Rating</label>
                <div class="col-xs-2">
                    <input name="rate" type="number" class="form-control" id="rateid" placeholder="Rating" value="{{$teaserie->rate}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="quantityid" class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-xs-2">
                    <input name="quantity" type="number" class="form-control" id="quantityid" placeholder="Quantity" value="{{$teaserie->quantity}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-3 col-sm-9">
                    <input name="_method" type="hidden" value="POST">
                    <button type="submit" class="btn btn-success btn-lg float-right">Confirm</button>
                </div>
            </div>
        </form>
    </div>  
</div>

    <script>
        var loadFile = function(event){
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0])
        }
    </script>

@endsection