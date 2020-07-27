@extends('master')

@section('content')

    <div class="container pt-5">
        <h1>Outlet Locations</h1>
        
        <button class="btn btn-lights btn-lg float-right"><a href="/outlets/create">Add Outlet</a></button><br><br>


        <!--Display table of outlets-->
        <div class="content">
        
            @if(count($outlets)>0)
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>PostCode</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($outlets as $outlet)
                        <tr>
                            <td>{{$outlet->id}}</td>
                            <td><strong><a href="/outlets/{{$outlet->id}}">{{$outlet->name}}</a></strong></td>
                            <td>{{$outlet->contact}}</td>
                            <td>{{$outlet->email}}</td>
                            <td>{{$outlet->address}}</td>
                            <td>{{$outlet->city}}</td>
                            <td>{{$outlet->postcode}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                
                
            @else
                <p>No posts found</p>
            @endif

        </div>
    </div>
@endsection