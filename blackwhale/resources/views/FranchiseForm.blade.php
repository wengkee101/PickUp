@extends('layouts.app')    <!--Staff Layout-->

@section('style')
    <style>
        .cm{
            margin-top: 3rem;
            background-color: white;
        }

        .table{
            margin-top:2rem;
        }

        table{
            border-radius: 12px;
        }

        .containercm {
            width: 90%;
            padding-right: 150px;
            padding-left: 15px;
            margin-left: 15rem;
            color: white;
        }

    </style>
@endsection

@section('contentcm')

<h1>Franchise Opportunities Form</h1>
    <div class="cm">  
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>location</th>
                <th>F&B Experience</th>
                <th>First_Franchise</th>
                <th>Message</th>
            </tr>
            </thead>
            @foreach ($franchises as $franchise)
            <tbody>
                <tr>
                <td style="width: 15%;">{{$franchise->name}}</td>
                <td>{{$franchise->email}}</td>
                <td>{{$franchise->phoneno}}</td>
                <td style="width: 10%;">{{$franchise->location}}</td>
                <td style="width: 10%; text-align:center;">{{$franchise->FoodAndBeverage_Experience}}</td>
                <td style="text-align:center;">{{$franchise->First_Franchise}}</td>
                <td>{{$franchise->Message}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

@endsection

