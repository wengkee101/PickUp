@extends('layouts.app')

@section('content')
    
    <div class="jumbotron m-5">
        
        <a href="/orders" class="btn btn-default">Go Back</a>
        <h2>Customer Details</h2>
        
        {{$customers->links()}}

        <table class="table table-striped table-bordered">
            <thead>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Contact</th>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td style="width:140px">{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->contact}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection