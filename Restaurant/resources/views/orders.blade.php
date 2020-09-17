@extends('master')
@section('body')


<div class="display-4 text-center mt-4">Orders</div>
<div class="container ">
    <br>
    <br>

    <div class="row d-flex justify-content-center">



    

    <div class="container">
        <table class="table table-dark table-striped table-condensed table-hover">
          <thead>
            <tr class="">
              <th class=""><h3>id</h3></th>
              <th class=""><h3>user id</h3></th>
              <th class=""><h3>created at</h3></th>
              <th class=""><h3></h3></th>

            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)

            <tr class="r">
              <td class="">{{$order->id}}</td>
              <td class="">{{$order->user_id}}</td>
              <td class="">{{$order->created_at}}</td>
              <td class=""><form action="{{route('customerorder.archive', ['id' => $order->id])}}" method="POST">

                @csrf
                
                {{-- @method('DELETE') --}}
            
                <button type="submit" class="btn btn-primary d-flex ml-auto btn-sm">Archive</button>
            </form></td>
            </tr>
        
            @endforeach

            
          </tbody>


        </table>
     <div class="d-flex justify-content-center">   {{ $orders->links() }} </div>

    </div>










    
</div>
</div>

@endsection