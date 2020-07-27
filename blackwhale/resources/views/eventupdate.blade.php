<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Add New Event
    </title>
</head>
<body>
    <div class="container">
        <h1>Add Event</h1>
        <div class="jumbotron">
            <form action="{{ route('addevent')}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="text" name="date" class="form-control" placeholder="Enter Date">
                </div>
                <div class="content-group">
                    <label>Content</label>
                    <textarea class="form-control" name="content" id="" cols="100" rows="10" placeholder="Content"></textarea>
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" >
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
        
            </form>
        </div>
    </div>
</body>
</html>