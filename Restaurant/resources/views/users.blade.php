@extends('master')
@section('body')


<div class="display-4 text-center mt-4">Users</div>
<div class="container ">
    <br>
    <br>

    <div class="row d-flex justify-content-center">



    

    <div class="container">
        <table class="table table-dark table-striped table-condensed table-hover">
          <thead>
            <tr class="">
              <th class=""><h3>id</h3></th>
              <th class=""><h3>name</h3></th>
              <th class=""><h3>email</h3></th>
              <th class=""><h3>phone</h3></th>
              <th class=""><h3>address</h3></th>
              <th class=""><h3>role</h3></th>
              <th class=""><h3>created at</h3></th>
              <th class=""><h3>updated_at</h3></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)

            <tr class="r">
              <td class="">{{$user->id}}</td>
              <td class="">{{$user->name}}</td>
              <td class="">{{$user->email}}</td>
              <td class="">{{$user->phone}}</td>
              <td class="">{{$user->address}}</td>
              <td class="">{{$user->role}}</td>
              <td class="">{{$user->created_at}}</td>
              <td class="">{{$user->updated_at}}</td>
            </tr>
        
            @endforeach

            
          </tbody>


        </table>
     <div class="d-flex justify-content-center">   {{ $users->links() }} </div>

    </div>





    <div class="container mt-5 backDarkGrey mb-3 width50">


    <div class="text-center text-light"><h3>Change admin</h3></div>
    
    <form action="/makeadmin5152" method="POST" enctype="multipart/form-data">
        @csrf
     

        <div class="form-group">
            <label for="admin" class="text-light">User ID:</label>
            <input type="number" class="form-control" id="admin" placeholder="user id" name="admin">
          </div>
   
    

        
        <button type="submit" class="btn btn-primary btn-block mb-2">Add</button>
      </form>
    </div>


    
</div>
</div>

@endsection