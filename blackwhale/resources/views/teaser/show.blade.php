@extends('layouts.app')

@section('style')

    <style>

        body{
            background: rgb(255,178,62);
            background: linear-gradient(180deg, rgba(255,178,62,1) 0%, rgba(255,179,71,1) 15%, rgba(255,204,51,1) 40%, rgba(255,221,62,1) 70%);
            width: 100%;
            height: 100%;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto ;
            padding: 20px;
        }

        .jumbotron{
            background: #ffeaa7;
        border-radius: 10px;
        }

        img{
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
        
        <br>
        <div class="jumbotron">
            <a href="/teas" class="btn btn-light mb-5"><i class="fas fa-chevron-circle-left"></i> Previous</a>
        
            <h1 class="ml-5">Tea Series</h1>
            <h4 class="ml-5"><a href="/teaser">All</a> > <a href="#">{{$teacategory->name}}</a></h4>

            <div class="grid-container">
                <div>
                    <!--display menu-->
                    <div style="max-width: 340px; padding: 10px">
                        <h2>{{$teaserie->name}}</h2><br>
                        <img src="{{ asset('/storage/upload\menu/' . $teaserie->image) }}" alt="{{$teaserie->name}}"  width="150px" height="150px"><br><br>
                    </div>
                    <a href="/teaser/{{$teaserie->id}}/edit" class="btn btn-warning">Edit Menu Series</a>
                    <a onclick="sweetalertclick('{{$teaserie->name}}', '{{$teaserie->id}}')" class="btn btn-danger">Delete Menu Series</a>
                </div>
                <div class="pl-4">
                    <div>
                        <br><br>
                        <h4>Description</h4>
                        <h5 style="width: 600px; height:80px; text-align: justify">{{$teaserie->description}}</h5><br>
                    </div>
                    <div>
                        <h4>Price</h4>
                        <p style="height:50px;" href="#">RM {{number_format($teaserie->price, 2)}}</p>
                    </div>

                    <div>
                        <h4>Rating</h4>
                        @for($i = 0; $i <= $teaserie->rate; $i++)
                            <i class="fa fa-star" style="font-size: 24px;color:#eed555"></i>
                        @endfor
                        <p style="display:inline;">{{$teaserie->rate}}</p>
                    </div>
                    <br>
                    <div>
                        <h4>Quantity</h4>
                        <p style="width: 600px; height:50px;">{{$teaserie->quantity}}</p> 
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        
        function sweetalertclick(name , id){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover " + name + " !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = "/teaser/" + id + "/delete"
                } else {
                    swal(name + " is safe!");
                    
                }
            });
        }

    </script>

@endsection