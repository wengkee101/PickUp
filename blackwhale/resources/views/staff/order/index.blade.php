@extends('layouts.app')

@section('content')
    
    <div class="jumbotron m-5">
        <h2>Order History</h2>
        <a href="/custDetails" style="flost:right" title="View Customer Details">Customer Details</a> 
        {{$orders->links()}}
        <table class="table table-striped table-bordered">
            <thead>
                <th>No.</th>
                <th>Order Id</th>
                <th>Customer Id</th>
                <th>Outlet Id</th>
                <th>Payment Type</th>
                <th>Time and Date</th>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><a href="/order/{{$order->id}}">{{$order->id}}</a></td>
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->customer_id}}</td>
                        <td>{{$order->outlet_id}}</td>
                        <td>{{$order->payment}}</td>
                        <td>{{$order->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection