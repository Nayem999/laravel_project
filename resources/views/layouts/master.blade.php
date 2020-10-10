<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'BD Network') }}</title> -->
    <title>BD Network</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
    html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}
div.relative {
  position: relative;
} 

div.absolute {
  position: absolute;
  top: 125px;
  left: 10px;
}
/* .vl {
  border-left: thick solid #ff0000;
} */

  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: rgb(201, 76, 76)" id="mainNav">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
          {{-- <a class="btn text-white justify-content-start" href="{{url('/home')}}">BD Network</a> --}}
          <a class="btn text-white justify-content-start" href="{{url('/home')}}">
            <img src="{{asset('public/logo/logo1.png')}}" style="width:80px; height:30px;"  alt="Responsive image">
          </a>
        <ul class="navbar-nav ml-auto">
        
          @guest
         <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
        @if (Route::has('register'))
        <li class="nav-item">
         <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
           </li>
         @endif
        @else
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('profile')}}">
            {{ Auth::user()->name }} <span class="caret"></span>
             </a>
          </li>
        <li class="nav-item">
   <a class="nav-link text-white" href="{{ url('home')}}">Home</a>
     </li>
     
     <li class="nav-item">
          
        <a class="nav-link text-white" href="{{ url('add')}}"><i class="fas fa-users">
          @if(count($fndcount->where('action',0)))
          <div type="button" class="btn btn-success btn-circle p-0 b-0 m-0">
            {{count($fndcount->where('action',0))}}
            </div>
          @endif
          </i></a>
          </li>
          <li class="nav-item">
              <a class="nav-link text-white" href="#"><i class="far fa-bell"></i></a>
                </li>
          <li class="nav-item">
              <a class="nav-link text-white" href="#"><i class="far fa-envelope"></i></a>
                </li>
       <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         <span class="caret"></span>
          </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
         <a class="dropdown-item" href="{{ url('profile') }}">
           {{ 'Profile' }}
           </a>
           <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
           </a>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
          </form>
            </div>
         </li>
         @endguest
            </ul>
      </div>
    </div>
  </nav>
<br>
          <main class="py-4">
              @guest
              @else
              <div class="container-fluid">

                  <div class="row justify-content-center">
                      <div class="col-2 col-sm-2">
                          <div class="p-3" style="position:fixed;">
                              <br>
                              <a href="{{ url('profile') }}" style="font-size: 18px; text-decoration: none;color:slategray"><i class="fas fa-user-circle"> Profile</i> </a>
                          <br>
                          <a href="{{url('post')}}" style="font-size: 18px; text-decoration: none;color:slategray"> <i class="fas fa-address-card"> My Post</i></a><br>
                          <a href="{{route('myfriend')}}" style="font-size: 18px; text-decoration: none;color:slategray"> <i class="fas fa-user-friends"> Friend List</i></a><br>
                          <a href="{{url('friend')}}" style="font-size: 18px; text-decoration: none; color:slategray"> <i class="fas fa-user-friends"> Add Friend</i></a><br>
                      </div>
                      </div>
                      {{-- <div class="col-md-1"><div class="vl"></div></div> --}}
                      <div class="col-7 col-sm-8">
                          <br>
                              <div class="p-3">
                @endguest      
                 @yield('content')
                 @guest
                 @else
                   </div>
                          </div>
                          <div class="col-3 col-sm-2">
                              <br>
                                  <div class="p-3" style="position:fixed;">
                                 @include('layouts.list')
                          </div>
                              </div>

                              {{-- <div class="col-md-1"><div class="vl"></div></div> --}}
                  </div>
              
              </div>
              @endguest 
        </main>
 
</body>

</html>
