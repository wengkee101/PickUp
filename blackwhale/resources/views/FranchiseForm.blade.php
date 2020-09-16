@extends('layouts.app')    <!--Staff Layout-->

@section('style')
    <style>
        .cm{
            background-color: white;
        }

        .table{
        }

        .container {
            border-radius: 10px;
            width: 100%;
            background-color: #ffeaa7;;
            color: black;
            padding: 20px 20px;
        }

        h4{
            margin: 0;
        }   

        h1{
            margin-top: 5rem;
            color: black;
            font-size: 5rem;
        }

        .topside{
            display: flex;  
            justify-content: space-between;

        }

        .leftside {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .rightside img{
            position: relative;
            width: 150px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="topside">
        <div class="leftside">
            <h1>Franchise Opportunities Form</h1>

            <!--Search function-->
            <h4 style = "">Search for City</h4>
        </div>
        <div class="rightside">
            <img src="/image/document.png" alt="document">
        </div>
    </div>

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
</div>


@endsection

