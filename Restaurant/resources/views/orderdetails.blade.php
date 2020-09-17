@extends('master')
@section('body')


<div class="display-4 text-center mt-4">Order details</div>
<div class="container ">
    <br>
    <br>

    <div class="row d-flex justify-content-center">



    

    <div class="container">
        <table class="table table-dark table-striped table-condensed table-hover">
          <thead>
            <tr class="">
              <th class=""><h3>id</h3></th>
              <th class=""><h3>order id</h3></th>
              <th class=""><h3>user id</h3></th>
              <th class=""><h3>user name</h3></th>
              <th class=""><h3>item name</h3></th>
              <th class=""><h3>price</h3></th>
              <th class=""><h3>created at</h3></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orderdetails as $orderdetail)

            
            {{-- {{dd($orderdetail)}} --}}

          {{-- {{dd($orderdetails)}} --}}

            {{-- @foreach ($orderdetails->item as $items) --}}
                

            <tr class="r">
              <td class="">{{$orderdetail->id}}</td>
              <td class="">{{$orderdetail->order_id}}</td>
              <td class="">{{$orderdetail->user_id}}</td>
              <td class="">{{$orderdetail->user_name}}</td>
              <td class="">{{$orderdetail->item_name}}</td>
              <td class="">{{$orderdetail->price}}</td>
              <td class="">{{$orderdetail->created_at}}</td>
             

            </tr>
        
            @endforeach

            {{-- @endforeach --}}
            
          </tbody>


        </table>
     {{-- <div class="d-flex justify-content-center">   {{ $orderdetails->links() }} </div> --}}

    </div>










    
</div>
</div>

@endsection