@extends('layout.head')           <!--Customer Layout-->

@section('link')
    <link rel="stylesheet" href="/css/franchiseform.css">    
@endsection

@section('style')
<style>
   
</style>
@endsection

@section('content')
    <main>
        <header>
            <div class="container">
              <img class="bw-logo" src="/image/1.png" alt="" >
            </div>
        </header>

        <div class="container">
            <h1 style="">Franchise Opportunities Form</h1>
            <div class="jumbotron" style="padding-top:2rem; padding-left:4rem;">
        
            <form action="{{ route('addform') }}" method="POST" enctype="multipart/form-data">
        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Full Name" >
                            @error('name')
                                    <span style="color: red">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input type="email" name="email" class="form-control" placeholder="example0000@example.com" >
                            @error('email')
                                    <span style="color: red">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" name="phoneno" class="form-control" placeholder="+60-12 345 6789">
                            @error('phoneno')
                                    <span style="color: red">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Interested Location</label>
                        <input type="text" name="location" class="form-control" placeholder="MidValley @ KL" >
                            @error('location')
                                    <span style="color: red">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Do you have any F&B Experience</label>
                        <select style = "width:92.5%;" class="form-control" name="FoodAndBeverage_Experience" id="" >
                            <option value="">Choose an Option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                            @error('FoodAndBeverage_Experience')
                                    <span style="color: red">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Is your First Franchise?</label>
                        <select style = "width:92.5%;" class="form-control" name="First_Franchise" id="">
                            <option value="">Choose an Option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                            @error('First_Franchise')
                                    <span style="color: red">{{$message}}</span>
                            @enderror
                    </div>
        
                    <div class="content-group">
                        <label>Message</label>
                        <textarea style = "margin-top:15px;" class="form-control" name="Message" id cols="10" rows="10" placeholder="Message"></textarea>
                            @error('Message')
                                    <span style="color: red">{{$message}}</span>
                            @enderror
                    </div>
        
                    <hr style = "margin-top: 15px;">
                    
                    <button style = "margin-top: 15px;" type="submit" name="submit" class="btn btn-primary">Submit Form</button>
            
                </form>
            </div>
        </div>

        <footer>
            <div class="left-content">
              <p>© 2019 - 2020 <strong>Golden Whale International Sdn Bhd</strong></p>
              <p>Visitors: 791118</p>
            </div>
        
            <div class="right-content">
              <p>powered by <strong>Group 2_39</strong></p>
            </div>
          </footer>
      
    </main>
@endsection


    
