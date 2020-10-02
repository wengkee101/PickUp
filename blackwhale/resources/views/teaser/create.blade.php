@extends('layouts.app')

@section('style')

    <style>
        .jumbotron{
            background: #ffeaa7;
        }

        body{
            background: rgb(255,178,62);
            background: linear-gradient(180deg, rgba(255,178,62,1) 0%, rgba(255,179,71,1) 15%, rgba(255,204,51,1) 40%, rgba(255,221,62,1) 70%);
            width: 100%;
            height: 100%;
        }


        label{
            color:black;
        }

        .form-container{
            border: .4px solid orange;
        }

        .head{

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

        .icon{
            display: flex;

            flex-direction: row;
        }
        
        img{
            display: flex;
            border-radius: 15px;
        }

        .leftside{
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        h2{
            position: relative;
            top: 8rem;
            font-size: 10rem;
        }

        .image{
            padding: 3rem;
            display: flex;
            justify-content: center;    
            align-items: center;
        }

        .top-row{
            height: 330px;

        }
        
        .icon img {
            bottom: -5px;
            position: relative;
            width: 80px;
        }
        
        .icon .hotcup{
            left: 2rem;
            transform: rotateY(180deg);
        }
        .icon .bubble{
            right: 0rem;
        }

        .icon-table{
            position: relative;
            width: 150px;
            left: 2rem;
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
    <br>
    
    
    <div class="form-container jumbotron">

        <a href="/teas" class="btn btn-light mb-5"><i class="fas fa-chevron-circle-left"></i> Previous</a>

        <div class="top-row">


            <div class="col-xs-8 leftside">
                
                <div class="group">
                    <div class="icon">
                        {{-- <img class="hotcup" src="/image/hot-chocolate.png" alt="image1">
                        <img class="bubble" src="/image/bubble-tea2.png" alt="image2"> --}}
                    </div>

                    <div class="icon-table">
                        {{-- <img class="table" src="/image/table.png" alt="image3"> --}}
                    </div>
                </div>

                <div class="h2">
                    <h2 style = "" class="head">Menu Series</h2>
                </div>
            </div>


            <div class="col-xs-4 image">
                <!--image preview-->
                <img id="output" src="/storage/upload/menu/noimage.jpg" style="width: 100%; height: 100%">
            </div>
        </div>
        
        <form method="post" action="{{route('addTeaSer')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">

                <select class="form-control" id="cats" name="cats_id" style = "width: 98%;margin-left: 1rem;" required>
                    <option disabled selected>Selected a Category</option>
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