@extends('layouts.app')

@section('style')
    <style>
        .container{
            background-color: #ffeaa7;
            border-radius: 10px;
        }

        h1{
            font-size: 7rem;
        }
        
        .upside{
            display: flex;
            justify-content: space-between;
        }

        .topside {
            display: flex;
            justify-content: space-between;
            margin: 1rem;
        }

        h4{
            margin: 0;
        }   

        .leftside{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .rightside img{
            position: relative;
            width: 150px;
            right: 100px;
        }
    </style>
@endsection

@section('content')

    <div class="container pt-5">
        <div class="topside">
            <div class="leftside">
                <h1 style = "">Outlet Locations</h1>
                <h4 style = "">Search</h4>
            </div>
            <div class="rightside">
                <img src="/image/shops.png" alt="shopes">
            </div>
        </div>
        
        <div class="upside">
            <div class="serach">
                <form style="width: 1000px" action="/search" method="GET">
                    {{ csrf_field() }}
                    <div style = "" class="input-group">
                        <input type="search" class="form-control" name="q" placeholder="Search anything"> 
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
           <div class="addoutlet">
                <button class="btn btn-primary float-right" title="to add outlet"><a style = "color:white;" href="/outlets/create"> Add Outlet </a></button>
           </div>
        </div>

        <!--Search function-->
        
        <br><br>

        <!--Display table of outlets-->
        <div class="content">
        
            @if(count($outlets) > 0)
                <table class="table table-striped table-bordered">
                    <thead class = "thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>PostCode</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($outlets as $outlet)
                            <tr>
                                <td>{{$outlet->id}}</td>
                                <td><strong>{{$outlet->name}}</strong></td>
                                <td>{{$outlet->contact}}</td>
                                <td>{{$outlet->email}}</td>
                                <td>{{$outlet->address}}</td>
                                <td>{{$outlet->city}}</td>
                                <td>{{$outlet->postcode}}</td>
                                <td><a href="/outlets/{{$outlet->id}}/edit" class="btn btn-warning float-left" title="edit this outlet" >EDIT</a></td>
                                <td>
                                    <a onclick="sweetalertclick('{{$outlet->name}}', '{{$outlet->id}}')" class="btn btn-danger float-right" title="delete this outlet" id="deleteBtn">DELETE</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination" style="margin-left: 58px; margin-top: -1rem;">
                    {{$outlets->links()}}
                </div>
                
            @else
                <p>No results found</p>

            @endif
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
                    window.location.href = "/outlets/" + id + "/delete"
                } else {
                    swal(name + " is safe!");
                }
            });
        }

    </script>
@endsection