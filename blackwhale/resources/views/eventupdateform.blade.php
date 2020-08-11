@extends('layout.head')<!--Staff Layout-->

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

</style>
@endsection

@section('content')
<img width="481" height="96"  style="margin-left:400px;" src = "/image/k.jpg">
@endsection

@section('contentcm')
    <h1 style="margin-left: 170px">Event Update</h1>
        <div class="jumbotron" style="padding: 2rem 2rem">
            @foreach ($events as $event)
            <h2>{{$event->title}}</h2>
            <div class="date">{{$event->date}}</div>
            <div class="pic" style="text-align: center;">
                <img src="{{ asset('/storage/upload\eventupdate/' . $event->image) }}" alt="Image" width="60%" height="50%" style="border-radius: 10px">
            </div>
            <hr>
            <div class="content" style="padding-left: 50px; padding-right:50px">
                {{$event->content}}
                <hr>
                <a href="https://www.facebook.com/theblackwhaletea/">https://www.facebook.com/theblackwhaletea/</a>
            </div>
            <hr>
            @endforeach
            {{$events->links()}}
        </div>
@endsection