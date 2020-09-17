@extends('master')
@section('body')

<div class="display-4 text-center mt-4">Our menu</div>
<div class="container ">

    <div class="btn-group">
        <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
             Filter
          </button>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="{{'/menu/pizza/'}}">Pizza</a>
            <a class="dropdown-item" href="{{'/menu/burger/'}}">Burger</a>
            <a class="dropdown-item" href="{{'/menu/'}}">No filter</a>

          </div>
        </div>
      </div>

<div class="row d-flex justify-content-center">

    @foreach ($items as $item)

    {{-- {{dd(asset('storage/imgs/' . $item->img))}} --}}

    <div class="col-8 col-md-6 col-lg-4 mx-auto mt-4 mb-4 text-center">

        <img src="{{asset('storage/imgs/' . $item->img)}}" alt="food" class="img img-fluid" style="width:auto; height: 230px;">
        <h1 class="text-center  mb-2 d-none d-md-block">{{$item->name}}</h1>
        <h3 class="text-center  mb-2 d-md-none">{{$item->name}}</h3>

     

        <div class="row text-center d-flex justify-content-center">
            <div class="col-4 col-md-4 egp d-flex align-items-center justify-content-center">{{$item->price}} EGP</div>
            <div href="" class="order col-4 col-md-6">
                <a href="{{'/addCart' . $item->id }}" type="button" class="orderBtn btn btn-lg">ORDER</a> 
            </div>
        </div>
        
        
        @if(Auth::user() && Auth::user()->role == 'admin')

       
            <div class=" row text-center d-flex justify-content-center">
                <a href="{{'/menu/' . $item->id . '/edit'}} " type="button" class="btn btn-primary mb-5">Edit</a>
   <form action="{{route('menu.delete', ['id' => $item->id])}}" method="POST">

    @csrf
    
    @method('DELETE')

    <button type="submit" class="btn btn-danger">Delete</button>
</form>
                {{-- <div class="btn btn-success btn-block col-6">Edit</div>
                <br>
                <div class="btn btn-danger btn-block col-5">Delete</div> --}}
            </div>
@endif
        
    </div>
@endforeach



    
</div>
</div>
@endsection