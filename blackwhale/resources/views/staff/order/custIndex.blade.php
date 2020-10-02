@extends('layouts.app')

@section('style')
    <style>
        .jumbotron{
            position: absolute;
            background: #ffeaa7;
            border-radius: 10px;
            width:80%;
            left: 50%;
            transform: translateX(-50%);
        }    
        h2{
            font-size: 6rem;
            margin: 0
        }

        body{
            background: rgb(255,178,62);
            background: linear-gradient(180deg, rgba(255,178,62,1) 0%, rgba(255,179,71,1) 15%, rgba(255,204,51,1) 40%, rgba(255,221,62,1) 70%);
            width: 100%;

        }

        .btn{
            background-color: #fdcb6e;
        }

        .btn:hover{
            background-color: orange;
        }
    </style>   
@endsection

@section('content')
    
    <div class="jumbotron">
        
        <a href="/orders" class="btn btn-default"><i class="fas fa-chevron-circle-left"></i> Previous</a>
        <h2>Customer Details</h2>


        <p class="mt-5 mb-3">Filter:</p>
        <div class="form-group">
            <select onchange="location = this.value;"  class="form-control col-md-2 mb-5">
                <option selected disabled>-Name-</option>
                @foreach ($customers->unique('name') as $customer)
                    <option value="/custDetails/?name={{$customer->name}}">{{$customer->name}}</option>
                @endforeach
            </select>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>PickUp Time</th>
                <th>Created Date</th>
                <th>Created Time</th>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td style="width:140px">{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->contact}}</td>
                        <td>{{$customer->pickup_time}}</td>
                        @php
                            $format1 = 'Y-m-d';
                            $format2 = 'H:i:s';
                            $date = Carbon\Carbon::parse($customer->created_at)->format($format1);
                            $time = Carbon\Carbon::parse($customer->created_at)->format($format2);
                        @endphp
                        <td>{{ date("Y-m-d", strtotime($date))}}</td>
                        <td>{{ date("H:i:s", strtotime($time))}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection