@extends('master')
@section('body')


<div class="display-4 text-center mt-4">Messages</div>
<div class="container ">
    <br>
    <br>

    <div class="row d-flex justify-content-center">



    

    <div class="container">
        <table class="table table-dark table-striped table-condensed table-hover">
          <thead>
            <tr class="">
              <th class=""><h3>id</h3></th>
              <th class=""><h3>Name</h3></th>
              <th class=""><h3>Email</h3></th>
              <th class=""><h3>Subject</h3></th>
              <th class=""><h3>Message</h3></th>
              <th class=""><h3>created at</h3></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($messages as $message)

            <tr class="r">
                <td class="">{{$message->id}}</td>
                <td class="">{{$message->name}}</td>
                <td class="">{{$message->email}}</td>
                <td class="">{{$message->subject}}</td>
                <td class="">{{$message->mesg}}</td>
                <td class="">{{$message->created_at}}</td>
            </tr>
        
            @endforeach

            
          </tbody>


        </table>
     <div class="d-flex justify-content-center">   {{ $messages->links() }} </div>

    </div>










    
</div>
</div>

@endsection