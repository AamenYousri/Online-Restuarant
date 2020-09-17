@extends('master')

@section('body')
    


<div class="container mt-5 backDarkGrey mb-5 width50">
    <br>
        <div class="display-4 text-center text-light">Add new topselling item</div>
        <br>
        <form action="/addtopselling" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="name" class="text-light">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            
            
       

      

            <div class="form-group">
                <label for="name" class="text-light">Description:</label>
                <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
              </div>
              
              
         
  
              
           

            <div class="form-group">
                <label for="price" class="text-light">Price:</label>
                <input type="number" class="form-control" id="price" placeholder="price" name="price">
              </div>
       


            <br>

            <label for="img" class="text-light">Item image</label>

            <div class="form-group">
              <input type="file" name="image" id="image" class="form-control-file border text-light">
            </div>
        

            <br>
            <button type="submit" class="btn btn-primary btn-block">Add</button>
          </form>

<br>
<br>
</div>



@endsection