@extends('layout.head')<!--Staff Layout-->

@section('link')
    <link rel="stylesheet" href="/css/franchiseform.css">    
@endsection

@section('style')
<style>
    h2{
        display: inline-block;
        margin: 0;
    }

    .jumbotron {
    margin-bottom: 2rem;
    background-color: #e9ecef;
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

    a{
        text-decoration: none;
        color: black;
    }

    .desc{
        white-space: pre;
    }
</style>
@endsection

@section('content')
    <main>
        <header>
            <div class="container">
            <img class="bw-logo" src="/image/1.png" alt="" >
            </div>
        </header>

        <div class="container">
            <h1 class='page-title' style="padding: 20px 0">Event Update</h1>
        </div>
        
        <div class="container">
            <div class="jumbotron" style="padding-left: 2rem">
                @foreach ($events as $event)
                <h2>{{$event->title}}</h2>
                <div class="date">Date: {{$event->date}}</div><br>
                <div class="pic" style="text-align: center;">
                    <img src="{{ asset('/storage/upload\eventupdate/' . $event->image) }}" alt="Image" width="60%" height="50%" style="border-radius: 10px">
                </div><br>
                <hr>
                <div class="content" style="padding-left: 50px; padding-right:50px"><br>
                    Description:<br><br>
                    <div class="desc">{{$event->content}}</div><br>
                    <hr><br>Link Description:<br><br>
                    <a href="https://www.facebook.com/theblackwhaletea/">https://www.facebook.com/theblackwhaletea/</a><br><br>
                </div>
                <hr>
                <br>
                @endforeach
                {{$events->links()}}
            </div>
        </div>
        


    </main>
    <footer style="padding-top: .5rem; height: 12%">
        <div class="left-content" style="padding-left: 5rem;">
        <p>© 2019 - 2020 <strong>Golden Whale International Sdn Bhd</strong></p>
        <p>Visitors: 791118</p>
        </div>

        <div class="right-content">
        <p>powered by <strong>Group 2_39</strong></p>
        </div>
    </footer>
    

        
@endsection

