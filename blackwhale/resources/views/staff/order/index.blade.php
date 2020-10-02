@extends('layouts.app')

@section('style')
    <style>

        .jumbotron{
            padding: 4rem 2rem 2rem 2rem;
            margin-bottom: 4rem;
            background: #ffeaa7;
            width: 80%;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 10px;
        }

        body{
            background: rgb(255,178,62);
            background: linear-gradient(180deg, rgba(255,178,62,1) 0%, rgba(255,179,71,1) 15%, rgba(255,204,51,1) 40%, rgba(255,221,62,1) 70%);
            width: 100%;

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
            width: 170px;
            right: 100px;
        }

        table{
            border-color: white;
            border-radius: 10px;
        }

    </style>  
@endsection

@section('content')
    
    <div class="jumbotron" >

        <div class="topside">
            <div class="leftside">
                <h2>Order History</h2>
                <a href="/custDetails" style="" title="View Customer Details">Customer Details</a> 
                {{-- {{$orders->links()}} --}}
            </div>
            <div class="rightside">
                <img src="/image/invoice.png" alt="receipt">
            </div>
        </div>
        
        <p class="">Filter:<a href="/orders" class="btn btn-default ml-5">Clear Filter</a></p>
        <form action="/searchOrder" method="GET" class="mb-5 mt-3">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-1">
                    <select name="id" id="orderId" class="form-control">
                        <option value="0" disabled selected>-NO-</option>
                        @foreach ($orders as $order)
                            <option value="{{$order->id}}">{{$order->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-2">
                    <select name="orderId" id="" class="form-control">
                        <option value="0" disabled selected>-Order ID-</option>
                        @foreach ($orders as $order)
                            <option value="{{$order->order_id}}">{{$order->order_id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-2">
                    <select name="customerId" id="" class="form-control">
                        <option value="0" disabled selected>-Customer ID-</option>
                        @foreach ($search[0] as $cust)
                            <option value="{{$cust->id}}">{{$cust->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-2">
                    <select name="outletId" id="" class="form-control">
                        <option value="0" disabled selected>-Outlet ID-</option>
                        @foreach ($search[1] as $outlet)
                            <option value="{{$outlet->id}}">{{$outlet->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-2">
                    <select name="payment" id="" class="form-control">
                        <option value="0" disabled selected>-Payment Mtd-</option>
                        <option value="on cash" >On Cash</option>
                        <option value="fpx" >FPX</option>
                    </select>
                </div>
                <div class="col-xs-2">
                    {{-- <label for="createdAt">Date</label> --}}
                    <input type="date" id="createdAt" name="createdAt" class="form-control">
                </div>
                <div class="col-xs-1">
                    <button class="btn btn-default d-inline" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
            </div>
        </form>

        <table class="table table-striped table-bordered ">
            <thead class="thead-dark">
                <th>No.</th>
                <th>Order Id</th>
                <th>Customer Id</th>
                <th>Outlet Id</th>
                <th>Payment Type</th>
                <th>Created Date</th>
                <th>Created Time</th>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><a href="/order/{{$order->id}}">{{$order->id}}</a></td>
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->customer()->pluck('name')->first()}}</td>
                        <td>{{$order->outlet()->pluck('name')->first()}}</td>
                        <td>{{strtoupper($order->payment)}}</td>
                        @php
                            $format1 = 'Y-m-d';
                            $format2 = 'H:i:s';
                            $date = Carbon\Carbon::parse($order->created_at)->format($format1);
                            $time = Carbon\Carbon::parse($order->created_at)->format($format2);
                        @endphp
                        <td>{{ date("Y-m-d", strtotime($date))}}</td>
                        <td>{{ date("H:i:s", strtotime($time))}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection