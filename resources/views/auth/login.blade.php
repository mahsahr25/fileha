@extends('main')
@section('content')
<div class="container">
<div  class="row d-flex justify-content-between  mainlogin" >
<!-- <div class="col-12 col-lg-4 "> -->
<img src="{{asset('assets/img/login.png')}}" alt="" class="col-12 col-lg-4">
<!-- </div> -->
<div class="col-12 col-lg-4 " style="margin-top:15vh;" class="mb-3 ">
<h2 class="mb-5 text-center logintitle">ورود ادمین</h2>
<form action="{{route('login')}}" method="POST" class="loginform" >
@csrf
  <div class="form-group">
    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="پست الکترونیکی" id="email" name="email" reqiuired>
    @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
    @enderror
  </div>
  <div class="form-group">
    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="رمز عبور" id="pwd" name="password" required>
    @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
    @enderror
  </div>
  <div class="text-center mt-3">
  <button type="submit" class="btn loginbtn mt-3">ورود</button>
  </div>
  
</form>
</div>

</div>
</div>
@endsection