@extends('master')
@section('body')

<div class="display-4 text-center mt-4 mb-4">Your Orders</div>



@if ($customerordersCount >= 1)

<div class="container">
    <div class="row d-flex justify-content-center">

        <table class="table table-striped table-condensed table-hover boxShadow">
            <thead>
              <tr class="">
                <th class=""><h3>Order id</h3></th>
                <th class=""><h3>Name</h3></th>
                <th class=""><h3>Price</h3></th>
                <th class=""><h3></h3></th>
            
              </tr>
            </thead>
            <tbody>





@foreach ($customerorders as $customerorder)

@foreach ($orderdetails as $orderdetail)
    



@if ($customerorder->id == $orderdetail->order_id)
    



<tr class="r">
    <td class="">{{$orderdetail->id}}</td>
    <td class="font-weight-bold">{{$orderdetail->item_name}}</td>
    <td class="">{{$orderdetail->price}} EGP</td>
    <td class=""><form action="{{route('customerorder.delete', ['id' => $orderdetail->id])}}" method="POST">

        @csrf
        
        @method('DELETE')
    
        <button type="submit" class="btn btn-danger d-flex ml-auto btn-sm">Delete</button>
    </form>
</td>
</tr>






   <div class="d-none"> {{$sum = $sum + $orderdetail->price}}</div>



@endif

    @endforeach

    @endforeach

    


</tbody>


</table>




 <h2 class="container text-center mt-4 mb-2 ">Your receipt</h2>


    <table class="table table-striped table-sm table-condensed table-hover boxShadow">
        <thead>
                </thead>
        <tbody>

<tr class="">
<td class="font-weight-bold">Your order price:</td>
<td class="font-weight-bold  text-right">{{$sum}} EGP</td>
</tr>

<tr class="">
    <td class="font-weight-bold">Tax:</td>
    <td class="font-weight-bold text-right">14%</td>
    </tr>
        

    
<tr class="">
    <td class="font-weight-bold">Delivery:</td>
    <td class="font-weight-bold text-right">9 EGP</td>
    </tr>

    <div class="d-none"> {{$sum = $sum + $sum * 0.14}} </div>
    <div class="d-none text-right"> {{$sum += 9}} </div>

     
<tr class="">
    <td class="font-weight-bold">Your total amount to pay:</td>
    <td class="font-weight-bold text-right"><span>  @php
        echo round($sum)
       @endphp  EGP </span></td>
    </tr>
   
 
</tbody>
</table>



</div>
    </div>
    @else

    <h2 class="container text-center">You have no orders</h2>

    @endif


{{-- 
    {{-- <div class="container"> --}}
         {{-- <button class=" btn btn-success">Procceed to checkout<button>  --}}
                      
@endsection