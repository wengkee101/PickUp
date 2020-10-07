@extends('layout.head')

@section('style')
<style>
.intro{
  height: 100vh;
  position: relative;
}

.review_img{
  z-index: -1;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  /* display: none; */
  opacity: 0;
  transition: opacity 0.75s ease-in-out;
}

.button{
  position: absolute;
  top: 2rem;
  right: 2rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: center;
}

.button a{
  text-decoration: none;
  border-radius: 40px;
  text-align: center;
  background: rgb(64,22,4);
  background: linear-gradient(315deg, rgba(64,22,4,1) 0%, rgba(127,43,8,1) 26%, rgba(236,213,33,1) 80%, rgba(255,255,255,1) 100%);  
  border: 1px solid black;
  background-size: 150%;
  padding: 12px 36px;
  color: black;
  margin: 10px 0;
  display: inline-block;
  cursor: pointer;
  transition: .5s;
}

.button a:hover{
  background-position: right;
}

.navbar{
  display: none;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>
    
@endsection

@section('link')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('script')
  <script type="text/javascript" src="/js/slick.min.js"></script>
  <script type="text/javascript" src="/js/slick.js"></script>
  <script type="text/javascript" src="/js/ScrollMagic.min.js"></script>
  <script type="text/javascript" src="js/debug.addIndicators.min.js"></script>
  <script src="/js/welcome.js" defer></script>
@endsection

@section('content')
  
    <div class="intro" >
      <div><img class="review_img" src="/image/a.png" title="Review 1" />
      </div>
      <div><img class="review_img" src="/image/b.png" title="Review 2" />
      </div>
      <div><img class="review_img" src="/image/c.png" title="Review 3" />
      </div>
      <div><img class="review_img" src="/image/d.png" title="Review 4" />
      </div>
      <div><img class="review_img" src="/image/e.png" title="Review 5" />
      </div>
      <div><img class="review_img" src="/image/f.png" title="Review 6" />
      </div>
      <div><img class="review_img" src="/image/g.png" title="Review 7" />
      </div>
      <div><img class="review_img" src="/image/h.png" title="Review 8" />
      </div>
      <div><img class="review_img" src="/image/i.png" title="Review 9" />
      </div>
      <div><img class="review_img" src="/image/j.png" title="Review 10" />
      </div>
    </div>

    <div class="button">
      <a href="/homepage">Homepage</a>
      <a href="/cust">Order</a>
      <a id="myBtn">Staff Login</a>
      {{-- <a href="/view">View</a> --}}
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
          <div class="form-group">
            <label for="codestaff">Staff Secret Code :</label>
            <input type="text" class="form-control" id="codestaffinput" placeholder="Enter Staff Code">
          </div>
          <button id="myBtn2" class="btn btn-primary mb-2">Confirm identity</button>
      </div>

    </div>

    <script>
      var code2 = "A002";
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      //Get the button to login
      var btnLogin = document.getElementById("myBtn2");

      var code = document.getElementById("codestaffinput");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }

      myBtn2.onclick = function() {
          var code = document.getElementById("codestaffinput").value;
          console.log("A001");
          if(code == "44556677")
            window.location.href = 'http://bw.my/login';
          else
            alert("Wrong Code!");
      }

    </script>
    
@endsection