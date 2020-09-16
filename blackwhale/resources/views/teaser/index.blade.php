@extends('layouts.app')

@section('style')
    <style>
        body{
            background: rgb(255,178,62);
            background: linear-gradient(180deg, rgba(255,178,62,1) 0%, rgba(255,179,71,1) 15%, rgba(255,204,51,1) 40%, rgba(255,221,62,1) 70%);
            width: 100%;
            height: 100%;
        }

        .container{
            border-radius: 10px;
            background-color: #ffeaa7;
        }

        .containerfont{
            text-align: center;
        }

        .containertitle{

            width: 90%;
            margin: 2rem auto;
        }

        .accordion {
            background-color: white;
            color: black;
            cursor: pointer;
            padding: 18px;
            width: 90%;
            border-radius: 6px;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
            color:#888;
            border:none;
        }
        
        .active, .accordion:hover {
            background-color: #bbb;
            color: white; 
        }
        
        ._panel {
            padding: 0px;
            display: none;
            margin-left: 50px;
            background-color: none;
            overflow: hidden;
            width: 90%;
        }

        ._grid-container {
            display: grid;
            
            grid-template-columns: auto auto auto auto ;
            width:100%;
            background-color: none;
            padding: 0px;
        }

        ._grid-container > div {
            display: inline;
            background-color: rgba(255, 255, 255, 1.0);
            text-align: center;
            font-size: 18px;
            width: 225px;
        }

        #counter{
            display: inline-block;
            padding: 0.25em 0.4em;
            background:#ccc;
            color:#999
            font-size: 80%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 15px;
            float:right;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .teaproduct{
            background-color: white;
            color: black;
            cursor: pointer;
            padding: 8px;
            width: 90%;
            margin: 10px;
            border-radius: 6px;
            text-align: left;
            outline: none;
            transition: 0.4s;
            color:#888;
            border:none;
        }

        .row-button{
            position: relative;
            display: flex;
            justify-content: flex-end;
            padding: 1rem;
            width: 96%;
        }

        .row-button a{
            margin-left: 1rem;
        }

        h1{
            font-size: 10rem;
            
        }

        .upside{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .bottomside{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .bubble-tea img{
            width: 200px;
        }

        .bubble-tea .pudding{
            width: 100px;
            margin-bottom: -9rem;
            margin-right: -6rem;
        }

    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection

@section('content')
<div class="container">
    <div class="containerfont">
        <div class="containertitle">
            <div class="upside">
                <div class="h1">
                    <h1>Tea Series</h1>
                </div>
                <div class="bubble-tea">
                    <img src="/image/pudding.png" class="pudding" alt="pudding">
                    <img src="/image/bubble-tea.png" alt="bubble tea">
                </div>
            </div>
            <div class="bottomside">
                <a href="/teacat/create" class="btn btn-primary" style="margin-bottom: 1rem;">Add Menu Category</a>
                <a href="/teaser/create" class="btn btn-primary">Add Menu Series</a><br>
            </div>
        </div>


        
        @if(count($teaseries) > 0)
            @foreach($teacategories as $teacategory)
                
                <!--edit and delete button-->
                <div class="row-button" style="">
                    <div style = "">
                        <a style = "" href="/teacat/{{$teacategory->id}}/edit" class="btn btn-warning">Edit Category</a>
                    </div>
                    <div style = "">
                        <a style = "color: white;" class="btn btn-danger" onclick="sweetalertclick('{{$teacategory->name}}', '{{$teacategory->id}}')">Delete Category</a>
                    </div>
                </div>
                

                <!--display category-->
                <button class = "accordion"> 
                    {{$teacategory->name}}<span id="counter">{{$teacategory->series()->count()}}</span>
                </button>
                
                <div class = "_panel">
                    
                    <div class = "_grid-container"> 
                        <!--display series-->
                        @foreach($teacategory->series as $teaserie)
                            <div class="teaproduct">
                                <a href="/teaser/{{$teaserie->id}}">{{$teaserie->name}}</a><br><br>
                                <img src="{{ asset('/storage/upload\menu/' . $teaserie->image) }}" alt="{{$teaserie->name}}" width="100px" height="100px"><br>
                                <p>RM {{number_format($teaserie->price, 2)}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <br><br>
            @endforeach

        <div class="pagination" style="">
            {{$teacategories->links()}}
        </div>
    </div>

    @else
        <p>No results found</p>
            
    @endif
    
</div>

    <script type="application/javascript">
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                panel.style.display = "none";
                } else {
                panel.style.display = "block";
                }
            });
        }
    </script>

    <script>
        
        function sweetalertclick(name , id){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover " + name + " !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = "/teacat/" + id + "/delete"
                } else {
                    swal(name + " is safe!");
                    
                }
            });
        }

    </script>


@endsection