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
        
    </style>    
@endsection

@section('content')
    
    <div class="jumbotron m-5">
        <div class="container">
            <a href="/orders" class="btn btn-default">Go Back</a>
            <h2>Order History</h2>
            <br>
            <h4>Order Details (Order ID: {{$data[0]->order_id}})</h4>
            <table class="table table-striped table-primary">
                <thead>
                    <th>Order ID</th>
                    <th>Payment</th>
                    <th>Date</th>
                    <th>Time</th>
                </thead>
                <tbody>
                   
                    <tr>
                        <td>{{$data[0]->order_id}}</td>
                        <td>{{$data[0]->payment}}</td>
                        @php
                            $format1 = 'Y-m-d';
                            $format2 = 'H:i:s';
                            $date = Carbon\Carbon::parse($data[0]->created_at)->format($format1);
                            $time = Carbon\Carbon::parse($data[0]->created_at)->format($format2);
                        @endphp
                        <td>{{ date("Y-m-d", strtotime($date))}}</td>
                        <td>{{ date("H:i:s", strtotime($time))}}</td>
                    </tr>
                </tbody>
            </table>

            <br>
            <h4>Puchased Item</h4>
            <table class="table table-striped table-success text-left">
                <thead>
                    <th>Item Code</th>
                    <th>Price Per Unit</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            @foreach($data[1]->tea_id as $tea)
                                <ol>{{$tea}}</ol>
                            @endforeach
                        </td>
                        <td>
                            @foreach($data[1]->unit_price as $p)
                                <ol>RM {{number_format($p,2)}}</ol>
                            @endforeach
                        </td>
                        <td>
                            @foreach($data[1]->quantity as $q)
                                <ol>{{$q}}</ol>
                            @endforeach
                        </td>
                        <td>
                            @foreach($data[4] as $subtotal)
                                <ol>RM {{number_format($subtotal,2)}}</ol>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>Total:</b> </td>
                        <td style="text-decoration-style: double; text-decoration-line:underline;"><b>RM {{number_format($data[5],2)}}</b> </td>
                    </tr>
                </tbody>
            </table>
{{-- 
            <br>
            <h4>Staff Details</h4>
            <table class="table table-striped table-info">
                <thead>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Created</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data[2]->id}}</td>
                        <td>{{$data[2]->name}}</td>
                        <td>{{$data[2]->email}}</td>
                        <td>{{$data[2]->created_at}}</td>
                    </tr>
                </tbody>
            </table> --}}


            <br>
            <h4>Outlet Details</h4>
            <table class="table table-striped table-info">    
                <thead>
                    <th>Outlet ID</th>
                    <th>Outlet Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Postcode</th>
                    <th>Date</th>
                    <th>Time</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data[2]->id}}</td>
                        <td>{{$data[2]->name}}</td>
                        <td>{{str_pad($data[2]->contact, 11, "0", STR_PAD_LEFT)}}</td>
                        <td>{{$data[2]->email}}</td>
                        <td>{{$data[2]->address}}</td>
                        <td>{{$data[2]->city}}</td>
                        <td>{{$data[2]->postcode}}</td>
                        @php
                            $format1 = 'Y-m-d';
                            $format2 = 'H:i:s';
                            $date = Carbon\Carbon::parse($data[2]->created_at)->format($format1);
                            $time = Carbon\Carbon::parse($data[2]->created_at)->format($format2);
                        @endphp
                        <td>{{ date("Y-m-d", strtotime($date))}}</td>
                        <td>{{ date("H:i:s", strtotime($time))}}</td>
                    </tr>
                </tbody>
            </table>

            

            <br>
            <h4>Customer Details</h4>
            <table class="table table-striped table-info">    
                <thead>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Pick Up Date</th>
                    <th>Pick Up Time</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data[3]->id}}</td>
                        <td>{{$data[3]->name}}</td>
                        <td>{{str_pad($data[3]->contact, 11, "0", STR_PAD_LEFT)}}</td>
                        @php
                            $format1 = 'Y-m-d';
                            $format2 = 'H:i:s';
                            $date = Carbon\Carbon::parse($data[3]->created_at)->format($format1);
                            $time = Carbon\Carbon::parse($data[3]->created_at)->format($format2);
                        @endphp
                        <td>{{ date("Y-m-d", strtotime($date))}}</td>
                        <td>{{ date("H:i:s", strtotime($time))}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
    
@endsection