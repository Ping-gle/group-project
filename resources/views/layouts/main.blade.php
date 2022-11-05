<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festivity OTOP @yield('header')</title>

<link rel="stylesheet" href="{{asset('/css/main.css')}}">
<linl rel="icon" type="image/x-icon" href="background-image/BG001.jpg">

</head>
<body background="background-image/background1.jpg">
    <center>
    <div class="logo"><img src="background-image/logo.png" alt=""></div>
    <h1>Festivity @yield('header')</h1>
    </center>

    

    <nav>
        <ul>
           <li><a href="/home">Home</a></li>
           <li><a href="/product">All Products</a></li>
           <li><a href="/shop">All Shops</a></li>
            <li><a href="/region">Regions</a></li>
            
          
        </ul>
    </nav>

    <div class="signin">
    @auth
        <span> 
            <b>Email</b>: {{ \Auth::user()->email }} <br>
            <b>Role</b>: {{ \Auth::user()->role }}      
        </span>
        <a href="{{route('logout') }}">Logout</a> 
    @endauth
    @guest
        <div class="signinicon">
            <a href="/auth/signin">Sign In</a>
        </div>
    @endguest
    </div>
    <br>
    
    

    @if(session()->has('status'))
        <div class="status">
            <span class="info">{{session()->get('status')}}</span>
        </div>
    @endif

    @error('error')
    <div class='status'>
        <span class='warm'>{{ $message }}</span></div>
    @enderror

    @yield('content')
<footer>
    <p><b> Created by</b><br> Norraset Pikhunthot 642110149<br>Patcharapong Thitwong 642110166
    <br>Peerapat Photong 642110172<br>Penporn klaharn 642110173</p>
</footer>
</body>
</html>