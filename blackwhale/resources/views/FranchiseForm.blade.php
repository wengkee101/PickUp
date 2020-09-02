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

    <!--Search function-->
    <h4 style = "margin-top:50px;">Search for City</h4>
    <form action="/franchisesearch" method="GET">
        {{ csrf_field() }}
        <div style = "margin-top:15px; width:100%;" class="input-group">
            <input type="search" class="form-control" name="q" placeholder="Search anything"> 
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>
    <br><br>
    
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

    <div class="pagination" style="margin-left: 58px; margin-top: -1rem;">
        {{$franchises->links()}}
    </div>

@endsection

