<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=false;">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant</title>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!-- 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->

    <link href="{{asset('css/app.css')}}"  rel="stylesheet"/>
    <link href="{{asset('css/style.css')}}"  rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>
<body>
    <header>



        <div class="" style="
        background-image: url('{{asset('img/back.jpg')}}'); 
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        /* height: 100%; */
      ">


            <nav class="navbar navbar-expand-lg navbar-dark back pt-3">
                <a class="navbar-brand" href="">
                    <img src="{{asset('img/logo.png')}}" alt="" style="width: 40px;" class="img-responsive img">
                    <span class="">Restaurant</span>
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navb">
                    <ul class="navbar-nav ml-auto mr-5">
                        <li class="nav-item ml-3">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item ml-3">
                            <a class="nav-link {{ Request::is('menu') ? 'active' : '' }}" href="{{url('menu')}}">Menu</a>
                        </li>
                        <li class="nav-item ml-3">
                            <a class="nav-link {{ Request::is('mycart') ? 'active' : '' }}" href="{{url('mycart')}}">My Cart</a>
                        </li>
                        <li class="nav-item ml-3">
                            <a class="nav-link {{ Request::is('customerorder') ? 'active' : '' }}" href="{{url('customerorder')}}">My Orders</a>
                        </li>
                        <li class="nav-item ml-3">
                            <a class="nav-link {{ Request::is('contactus') ? 'active' : '' }}" href="{{url('contactus')}}">Contact Us</a>
                        </li>

                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="{{'/myprofile/' . Auth::user()->id}}" class="dropdown-item">Profile</a>
                                </div>
                            </li>
                        @endguest
                    
                    @if(Auth::user() && Auth::user()->role == 'admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                              Dashboard
                            </a>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{'/additem'}}">Add item</a>
                              <a class="dropdown-item" href="{{'/orders'}}">Orders</a>
                              <a class="dropdown-item" href="{{'/orderdetails'}}">Order details</a>
                              <a class="dropdown-item" href="{{'/users'}}">Users</a>
                              <a class="dropdown-item" href="{{'/messages'}}">Messages</a>
                              <a class="dropdown-item" href="{{'/addtopselling'}}">Add top selling</a>

                            </div>
                          </li>
                       
                    </ul>
                   @endif
                  
                </div>
            </nav>
        </div>
        


    </header>
    @include('includes/messages')

    @yield('body')


    

    <footer>
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <img class="img-responsive  d-flex justify-content-end paddingLeft" src="{{asset('img/footerfood.png')}}" alt="slogan" style="width: 80%">
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="menu">
                        <span>Menu</span>
                        <li>
                        <a href="{{url('/')}}">Home</a>
                        </li>

                        <li>
                            <a href="{{url('menu')}}">Our menu</a>
                        </li>

                        <li>
                            <a href="{{url('mycart')}}">My Cart</a>
                        </li>

                      
            
                    </ul>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="address">
                        <span>Contact</span>
                        <li>
                           <a href="https://www.facebook.com/FitnessClubf/"   target="_blank">Facebook</a>
                        </li>
                        <li>
                           <a href="https://www.instagram.com/fitnessclubf4/?hl=en"  target="_blank">Instagram</a>
                        </li>
                        <li>
                            <a href="#" id="emailClick">Email</a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
        
    
    </footer>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/javascript1.js')}}"></script>
<script>
    AOS.init();
  </script>
</body>
</html>