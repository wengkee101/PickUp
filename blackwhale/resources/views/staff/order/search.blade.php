@extends('layouts.app')

@section('style')
    <style>
    body{
        background: rgb(255,178,62);
        background: linear-gradient(180deg, rgba(255,178,62,1) 0%, rgba(255,179,71,1) 15%, rgba(255,204,51,1) 40%, rgba(255,221,62,1) 70%);
        height: 130vh;
    }

        
        .jumbotron{
            background: #ffeaa7;
            width: 60%;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: 0;
            transform: translate(-50%, -40%);
        }
        
        .btn{
            background-color: #fdcb6e;
        }

        .btn:hover{
            background-color: orange;
        }
        
        .filter{
            margin: 10px 15px;
            padding: 9px 15px;
            background: #444;
            color:white;
            border-radius: 30px;
            font-size:14px;
            font-weight:bold;
        }
    </style>    
@endsection

@section('content')
    
<div class="jumbotron m-5">
    <h2>Order History</h2>
    <a href="/custDetails" style="float:right;font-size:19px;" title="View Customer Details">
        <span class="fa fa-user fa-lg"></span> Customer Details</a> 

    <p class="mt-5 mb-5">Filter:
        @for ($i = 0; $i < 6; $i++)
            @if ($filter[$i])
                <span class="filter">{{$filter[$i]}} &nbsp;
                </span>
            @endif
        @endfor
        <a href="/orders" class="btn btn-default d-inline">Clear Filter</a>
    </p>

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
                    @foreach ($orders->unique('customer_id') as $order)
                        <option value="{{$order->customer_id}}">{{$order->customer()->pluck('name')->first()}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-2">
                <select name="outletId" id="" class="form-control">
                    <option value="0" disabled selected>-Outlet ID-</option>
                    {{-- @php
                        $result = array_unique($orders);
                    @endphp --}}
                    @foreach ($orders->unique('outlet_id') as $outlet)
                        <option value="{{$outlet->id}}">{{$order->outlet()->pluck('name')->first()}}{{$outlet->id}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-2">
                <select name="payment" id="" class="form-control">
                    <option value="0" disabled selected>-Payment Mtd-</option>
                    @foreach ($orders->unique('payment') as $outlet)
                        <option value="{{$outlet->payment}}">{{$outlet->payment}}</option>
                    @endforeach
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

    <table class="table table-striped table-bordered  mt-5">
        <thead>
            <th>No.</th>
            <th>Order Id</th>
            <th>Customer Name</th>
            <th>Outlet Name</th>
            <th>Payment Type</th>
            <th>Created Date</th>
            <th>Created Time</th>
        </thead>
        <tbody>
            {{-- @foreach($orders->sortBy('outlet_id') as $order) --}}
            @foreach ($orders as $order)
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