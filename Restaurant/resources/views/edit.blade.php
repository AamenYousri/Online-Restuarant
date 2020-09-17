@extends('master')

@section('body')
    


<div class="container mt-5 backDarkGrey mb-5 width50">
    <br>
        <div class="display-4 text-center text-light">Edit item</div>
        <br>
        <form action="{{'/menu/' . $item->id}}" method="POST" enctype="multipart/form-data">
            
            @csrf
            @method('PUT')

            {{-- <input type="hidden" name="__method" value="PUT"> --}}

            

            <div class="form-group">
              <label for="name" class="text-light">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$item->name}}">
            </div>
            
            
             
            <label for="boolean" class="text-light">Category:</label>
            <select class="form-control" id="category" name="category">
                <option {{$item->category== 'Pizza' ? 'SELECTED' : '' }}>Pizza</option>
                <option {{$item->category== 'Burger' ? 'SELECTED' : '' }}>Burger</option>
                <option {{$item->category== 'Fries' ? 'SELECTED' : '' }}>Fries</option>
                </select>
            <br>


      

              
           

            <div class="form-group">
                <label for="price" class="text-light">Price:</label>
                <input type="number" class="form-control" id="price" placeholder="price" name="price" value="{{$item->price}}">
              </div>
       


            <br>

        

            <br>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
          </form>

<br>
<br>
</div>



@endsection