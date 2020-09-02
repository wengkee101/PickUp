@extends('layouts.app')

@section('style')

    <style>
        label{
            color:black;
        }

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

        .custom-file {
            width: 72%;
            margin-left:15px;
            min-width: 0;
            margin-bottom: 0;
        }

        .form-group{
            margin-top:5px;
        }

    </style>

@endsection

@section('content')

<div class="container">
    <br>
    <a href="/teas" class="btn btn-light mb-5">Go Back</a>

    <h2 style = "color:white;" class="head">Add Menu Series</h2>
    
    <div class="form-container jumbotron">
            
        <form method="post" action="{{route('addTeaSer')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="cats" class="col-sm-3 col-form-label">Choose a category:</label>
                <select id="cats" name="cats_id" style = "margin-left: 15px;">
                    @foreach($teacategories as $teacategory)
                        <option value={{$teacategory->id}}>{{$teacategory->name}}</option>
                    @endforeach
                </select>
            </div>
            <div style = "margin-top:40px;" class="form-group row">
                <label for="nameid" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" id="nameid" placeholder="Name" value = {{old('name')}}>
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
            <img id="output" src="/storage/upload/menu/noimage.jpg" style=" margin-left: 255px; height: 30%; width: 30%; display:block; text-align: center; border-radius: 15px">

            <br>
            <div class="form-group row">
                <label for="descriptionid" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea name="description" type="text" class="form-control" id="descriptionid" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="priceid" class="col-sm-3 col-form-label">Price</label>
                <div class="col-xs-2">
                    <input name="price" type="text" class="form-control" id="priceid" placeholder="Price"  value="{{ old('price') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="rateid" class="col-sm-3 col-form-label">Rating</label>
                <div class="col-xs-2">
                    <input name="rate" type="number" class="form-control" id="rateid" placeholder="Rating" value="{{ old('rate') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="quantityid" class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-xs-2">
                    <input name="quantity" type="number" class="form-control" id="quantityid" placeholder="Quantity" value="{{ old('quantity') }}">
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