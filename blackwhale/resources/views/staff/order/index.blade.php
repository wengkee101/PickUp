@extends('layouts.app')

@section('style')
    <style>

        .jumbotron{
            background: #ffeaa7;
            width: 80%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -45%);
        }

        h2{
            font-size: 6rem;
            margin: 0
        }

        .topside{
            display: flex;
            justify-content: space-between;
        }

        .rightside img{
            position: relative;
            width: 150px;
            right: 100px;
        }


        table{
            border-color: white;
            border-radius: 10px;
        }

    </style>  
@endsection

@section('content')
    
    <div class="jumbotron" style="margin-bottom: 0;">

        <div class="topside">
            <div class="leftside">
                <h2>Order History</h2>
                <a href="/custDetails" style="" title="View Customer Details">Customer Details</a> 
                {{$orders->links()}}
            </div>
            <div class="rightside">
                <img src="/image/invoice.png" alt="receipt">
            </div>
        </div>
        




        <table class="table bg-white" style="border-color: ">
            <thead class="thead-dark">
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
                        <th scope="row"><a href="/order/{{$order->id}}">{{$order->id}}</a></th>
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