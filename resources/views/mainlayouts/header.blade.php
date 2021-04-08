<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FileHa</title>
    <link rel="shortcut icon" type="image/jpg" href="{{asset('assets/img/logo/file2.png')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <link rel="stylesheet" href="{{asset('assets/bootstrap-v4-rtl-master/bootstrap-rtl.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <link rel="stylesheet" href="{{asset('assets/newhome.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">


    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    
</head>
<body>
<header>
<nav class="navbar navbar-expand-sm d-md-flex justify-content-between navbar-dark fixed-top d-none " style="background-color:rgb(4,31,42);width:100%">

<ul class="navbar-nav">
<li class="nav-item">
<a class="navbar-brand" href="">
<img src="" alt="">
</a>
</li>
<li>
<img src="{{asset('assets/img/logo/file2.png')}}" alt="" class="logo ">
</li>
<li class="nav-item mr-5 active">
<a  class="nav-link" href="{{url('/')}}" >خانه</a>
</li>
<li class="nav-item mr-3">

<a  class="nav-link" href="">تماس با ما</a>

</li>
</ul>
<ul class="navbar-nav">
@if(Auth::check())
<li class="nav-item ml-3 dropdown d-flex" >
<img src="{{asset('assets/img/users/user5.png')}}" alt="" class="adminimg">
<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">&nbsp;{{ Auth::user()->name }}</a>
<div class="dropdown-menu">
        <a class="dropdown-item" href="{{url('admin/alluploads')}}">آپلودها</a>
        <a class="dropdown-item" href="{{ route('logout') }}" 
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('خروج') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
</div>


</li>
@else
<li class="nav-item ml-3">
<a  class="nav-link" href="{{route('login')}}">ورود</a>
</li>
@endif

<form class="form-inline ml-4" action="#">
    <input class="form-control mr-sm-2" type="text" placeholder="جستجو">
    <button class="btn" type="submit" style="background-color:rgb(190,207,237)">جستجو</button>
  </form>
</ul>
</nav>
<!-- navbar in small screen -->
<nav class="navbar navbar-expand-md  d-md-none smallnav" style="background-color:rgb(4,31,42);">
  <!-- Brand -->
  <a class="navbar-brand" href="{{url('/')}}">
<img src="{{asset('assets/img/logo/file2.png')}}" alt="" class="smalllogo ">

  </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <!-- <span class="navbar-toggler-icon" style="color:rgb(255,255,255)"></span> -->
    <span class="" style="color:rgb(255,255,255)"><i class="fa fa-bars"></i></span>

  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      @if(Auth::check())
      <li class="nav-item">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" href="">{{Auth::user()->name}}</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{url('admin/alluploads')}}">آپلودها</a>
        <a class="dropdown-item" href="{{ route('logout') }}" 
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('خروج') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
</div>
      </li>
      @else
      <li class="nav-item">
      <a class="nav-link" href="{{route('login')}}">ورود</a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="">تماس با ما</a>

      </li>
      
    </ul>
  </div>
</nav>
</header>