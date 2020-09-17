@extends('master')
@section('body')

<div class="display-4 text-center mt-4 mb-4">Your cart</div>
<div class="container ">
    <div class="row d-flex justify-content-center">
        <div class="text-center container mb-4"><h5>You currently have <span class="text-success font-weight-bold">{{count($count)}}</span>  item(s) in your cart! </h5></div>

@foreach ($carts as $cart)


    <div class="col-8 col-md-6 col-lg-4 mx-auto mt-4 mb-4 text-center">

        <img src="{{asset('storage/imgs/' . $cart->img)}}" alt="food" class="img img-fluid" style="width:auto; height: 230px;">
        <h1 class="text-center  mb-2 d-none d-md-block">{{$cart->name}}</h1>
        <h3 class="text-center  mb-2 d-md-none">{{$cart->name}}</h3>

     

        <div class="row text-center d-flex justify-content-center">
            <div class="col-4 col-md-4 egp d-flex align-items-center justify-content-center">{{$cart->price}} EGP</div>
        </div>


        <form action="{{route('cart.delete', ['id' => $cart->id])}}" method="POST">

            @csrf
            
            @method('DELETE')
        
            <button type="submit" class="btn btn-danger btn-block mt-4 mb-4 btn-sm">Delete</button>
        </form>
    
    </div>


    @endforeach




</div>
    </div>
    @if (count($count) > 0 )
        
    
    <div class="container">
    <h4>Total order amount: <span class="font-weight-bold">{{$sum}}</span> EGP</h4>
    <a href="{{'/addOrder'}}" type="button" class=" btn btn-lg btn-success mb-4 mt-4 btn-block">Checkout</a> 
</div>

@endif

{{-- 
    {{-- <div class="container"> --}}
         {{-- <button class=" btn btn-success">Procceed to checkout<button>  --}}
                      
@endsection