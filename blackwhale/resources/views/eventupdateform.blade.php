<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Event Update Page</title>
</head>
<body>
    <div class="container">
        <h1>Event Update</h1>
        <div class="jumbotron">

            @foreach ($events as $event)
    
            <h2>{{$event->title}}</h2>
            <div class="date">{{$event->date}}</div>
            <div class="pic">
                <img src="{{ asset('/storage/upload\eventupdate/' . $event->image) }}" alt="Image" width="90%" height="90%">
            </div>
            <hr>
            <div class="content">
                {{$event->content}}
                <hr>
                <a href="https://www.facebook.com/theblackwhaletea/">https://www.facebook.com/theblackwhaletea/</a>
            </div>
            <hr>
            @endforeach
            {{$events->links()}}

        </div>
    </div>
</body>
</html>