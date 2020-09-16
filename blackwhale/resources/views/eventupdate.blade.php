@extends('layouts.app') 

@section('style')
<style>
    body{
            background-image: url('/image/Background1.png');
            background-repeat:no-repeat;
            background-size: cover;
            width: 100%;
            height: 100%;
            background-position: center;    
        }


    .input-group {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        width: 100%;
    }

    .input-group > .custom-file {
        position: relative;
        flex: 1 1 auto;
        width: 1%;
        min-width: 0;
        margin-bottom: 0;
    }

    .jumbotron{
        background: #ffeaa7;
        border-radius: 10px;
    }

    h1{
        font-size: 7rem;
    }

    .topside{
        display: flex;
        justify-content: space-between; 
    }

    .rightside img{
        position: relative;
        width: 150px;
    }
</style>
@endsection

@section('content')
        <div class="container" style="">
        
        
        <div class="jumbotron">
            <div class="topside">
                <div class="leftside">
                    <h1 style="">Add Event</h1>
                </div>
                <div class="rightside">
                    <img src="/image/calendar.png" alt="calendar">
                </div>
            </div>

            <form action="{{ route('addevent')}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Name">
                    @error('title')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" placeholder="Enter Date">
                    @error('date')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
                <div class="content-group">
                    <label>Content</label> {{-- id='article-ckeditor' --}}
                    <textarea class="form-control" name="content"  cols="100" rows="10" placeholder="Content"></textarea>
                    @error('content')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                </div>

                <div class="input-group" style="margin-top: 2rem">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" onchange="loadFile(event)" >
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>

                <br>
                <!--image preview-->
                <img id="output" style="height: 20%; width: 40%; display:block; text-align: center; border-radius: 15px">
               
                <button style="margin-top: 1rem" type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    
@endsection

@section('script')
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <script>
        var loadFile = function(event){
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection
