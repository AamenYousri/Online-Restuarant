@if($errors->any())
<div class="alert alert-danger">
<ul>
    @foreach ($errors->all() as $error)
    <li>
        {{$error}}
    </li>
        
    @endforeach


</ul>

</div>
@endif

@if (session('status'))

<div class="alert alert-success text-center" style="font-size: 2em;">{{session('status')}}</div>
    
@endif