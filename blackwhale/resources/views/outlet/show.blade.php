@extends('master')

@section('content')
    <div class="container pt-5">

            <a href="/outlets">Go Back</a>
            <h1>{{$outlet->name}}</h1>
            
            <h5>General</h5>
            <p>{{$outlet->contact}}</p>
            <p>{{$outlet->email}}</p>
            <hr>
            <h5>Address </h5>
            <p>{{$outlet->address}}</p>
            <p>{{$outlet->city}}</p>
            <p>{{$outlet->postcode}}</p>
            <hr>
            <a href="/outlets/{{$outlet->id}}/edit" class="btn btn-warning btn-lg float-left">Edit</a>

            <form action="{{ route('deleteOutlet' , $outlet->id ) }}" method="get">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="DELETE">
                <button type="submit" class="btn btn-danger btn-lg float-right" id="deleteBtn">DELETE</button>
            </form>
        </div>    
        
@endsection