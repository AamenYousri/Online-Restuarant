@extends('master')
@section('body')


<div class="display-4 text-center mt-4">Your profile</div>
<div class="container">

    
    <h3 class="mb-1">ID: {{$profile->id}}</h3>   
    <h3 class="mb-1">Name: {{$profile->name}}</h3>
    <h3 class="mb-1">Email: {{$profile->email}}</h3>
    <h3 class="mb-1">Address: {{$profile->address}}</h3>
    <h3 class="mb-1">Phone number: {{$profile->phone}}</h3>
    <h3 class="mb-4">Account balance: </h3>
    
    <br>
    <br>

<a href="{{'/editprofile/' . $profile->id . '/edit'}}" class="btn btn-success btn-block btn-sm mt-3">Edit profile </a>

<br>
<br>

</div>
@endsection