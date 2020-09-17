@extends('master')

@section('body')

<div class="container mt-4">
<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
  
    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('img/carousel1.jpg')}}" class="img-responsive" alt="" width=100% height="400">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/carousel2.jpg')}}" class="img-responsive" alt="" width=100% height="400">
      </div>
      <div class="carousel-item ">
        <img src="{{asset('img/carousel3.jpg')}}" class="img-responsive" alt="" width=100% height="400">
      </div>
    </div>
  
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  
  </div>
</div>
<div class="container text-center">
  <div class="display-4  mt-4">Top selling</div>

<div class="row mx-auto mt-4 d-flex justify-content-center text-center" >
   

@foreach ($items as $item)
<div class="col-10 col-md-5 boxShadow ml-5 mb-5" style="background-color: #fff; width:auto; height: 230px;" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
  <div class="row">
        <div class="col-6 pb-2 mt-4">
        <img class=" img img-fluid mb-3" src="{{asset('storage/imgs/' . $item->img)}}" alt="" style="width: 200px;; height: 150px;">
        <h4 class="mb-1 font-italic">{{$item->price}} EGP</h4>
        </div>
        <div class="col-6  pl-1">
          <div class="mt-4" style="color: #f00;"><h3 style="font-weight:bolder">{{$item->name}}</h3></div>
          <div class="">{{$item->description}}</div>
          {{-- <div class="btn btn-success mt-4 btn-block">Add to cart</div> --}}
          <a href="{{'/addtopselling' . $item->id }}" type="button" class="btn-success mt-4 btn-block btn-lg">Add to cart</a>
          @if(Auth::user() && Auth::user()->role == 'admin')
          <form action="{{route('topselling.delete', ['id' => $item->id])}}" method="POST">

            @csrf
            
            @method('DELETE')
        
            <button type="submit" class="btn btn-danger btn-block mt-1 btn-sm">Delete</button>
        </form>
        @endif
        </div>  
        
      </div>
    </div>

@endforeach


        

      </div>
    </div>

    <div class="col-md-2"></div>
    <br class="d-lg-none">
  
</div>
</div>


<br>
<br>
<br>
<br>
<br>
@endsection