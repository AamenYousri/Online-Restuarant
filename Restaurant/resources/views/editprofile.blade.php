@extends('master')

@section('body')
    


<div class="container mt-5 backDarkGrey mb-5 width50">
    <br>
        <div class="display-4 text-center text-light">Edit profile</div>
        <br>
        <form action="{{'/editprofile/' . $profile->id}}" method="POST" enctype="multipart/form-data">
            
            @csrf
            @method('PUT')

            {{-- <input type="hidden" name="__method" value="PUT"> --}}

            

      

            <div class="form-group">
                <label for="id" class="text-light">ID:</label>
                <input type="text" class="form-control" id="id" placeholder="Enter name" name="id" value="{{$profile->id}}" readonly>
              </div>
              
             <br>
  
  


            <div class="form-group">
              <label for="name" class="text-light">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$profile->name}}">
            </div>
            
           <br>



           <div class="form-group">
            <label for="email" class="text-light">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter name" name="email" value="{{$profile->email}}">
          </div>
          
         <br>


    
      

           <div class="form-group">
            <label for="address" class="text-light">Address:</label>
            <input type="text" class="form-control" id="address" placeholder="Enter name" name="address" value="{{$profile->address}}">
          </div>
          
         <br>


    
              
      

           <div class="form-group">
            <label for="phone" class="text-light">Phone number:</label>
            <input type="number" class="form-control" id="phone" placeholder="Enter name" name="phone" value="{{$profile->phone}}">
          </div>
          
         <br>

           

        
        

            <br>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
          </form>

<br>
<br>
</div>



@endsection