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

</style>
    
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
    </div>
    
@endsection