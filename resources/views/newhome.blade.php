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
<!-- <nav class="navbar navbar-expand-sm d-flex justify-content-between navbar-dark" style="background-color:rgb(44,71,118);"> -->
<nav class="navbar navbar-expand-sm d-md-flex justify-content-between navbar-dark fixed-top d-none " style="background-color:rgb(4,31,42);">

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
<a  class="nav-link" href="" >خانه</a>
</li>
<li class="nav-item mr-3">

<a  class="nav-link" href="{{url('/')}}">تماس با ما</a>

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
<!-- scroll text -->
<div class="holder mt-md-5">
<p class="news mt-2">آپلود و دانلود فایل </p>
</div>
<!-- end of scroll text -->
<div class="top-img col-12 text-center ">
    <div class="imgtext deconstructed pt-4 align-self-center " id="imgtext "> انتقال امن فایل
      <div>انتقال امن فایل</div>
      <div>انتقال امن فایل</div>
      <div>انتقال امن فایل</div>
      <div>انتقال امن فایل</div>
    </div>

    <!-- <div class="imgtext2 ">امن
    <div>امن</div>
    <div>امن</div>
    <div>امن</div>
    <div>امن</div>
    </div>
    <div class="imgtext3 ">فایل
      <div>فایل</div>
      <div>فایل</div>
      <div>فایل</div>
      <div>فایل</div>
    </div> -->
</div>

<div class="container-fluid  mt-4">

  <!-- UPLOAD AREA -->
<div class="row d-flex justify-content-around ">
        <div class="col-lg-1"></div>
				<div class=" col-lg-5 col-sm-12 mainupload ">
        <p class="uploadtitle">آپلود فایل</p>

				<div class="errbox">
				<p class="err text-danger"></p>
				</div>
        <p>تعداد دفعات مجاز برای دانلود:</p>
				<input type="number" name="dlcount"  class="dlcount px-3">
				<p class="counterr text-danger"></p>
        <p>زمان مجاز دانلود:(روز)</p>
				<input type="number" name="dltime" max="100"  class="dltime px-3">
				<p class="dayerr danger"></p>
				<button type="submit" class="uploadparam mr-5 px-3 py-1 ">آپلود فایل</button>
				</div>
        <div class="dl">
        <img class="dlimg text-center" src="{{asset('assets/img/download.png')}}" alt="">  
        <p class="mt-3 uploadtitle">با تشکر</p>
        <p class="dltext">شناسه دانلود فایل شما:</p><span class="dllink dltext"></span>
        </div>
        <!-- <div class="gif "> -->
          <img src="{{asset('assets/img/gif3.gif')}}" alt="" class="gif col-lg-4 col-sm-12 mt-5 mt-lg-0">
        <!-- </div> -->
</div>
  <div class="mt-2 col-lg-8">
  <form method="post" action="{{route('uploadfile')}}" enctype="multipart/form-data" data-uploadid
                  class="dropzone " id="dropzone">
    @csrf
  </form> 
  </div>
</div>

<!-- end of upload area -->
<div class="mt-4 footer container-fluid">
<div class="row d-flex justify-content-around">
<div class="col-12 col-md-3 footer-right mt-3 mr-3">
<p>شماره تماس ما:22222222</p>
<p>آدرس: خیابان شریعتی</p>
</div>
<div class="col-12 col-md-3   mt-0 mt-md-5 mr-5">
<i class="fa fa-instagram footer-right"></i>
<i class="fa fa-twitter footer-right mr-1"></i>
<i class="fa fa-telegram footer-right mr-1"></i></div>
</div>
</div>

<div class="overlay">
  <!-- <div class="loader"></div> -->
</div>


<script type="text/javascript">
$('.dl').hide();
$('.overlay').hide();


        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var uploadid =$('#dropzone').data('uploadid');
                return uploadid+';'+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf,.docx",
            addRemoveLinks: false,
            timeout: 5000,
            
            success: function(file, response) 
            {
                console.log(response);
                // alert(response['dllink']);

                $('.mainupload').hide();
                $('.dropzone').hide();
                $('.overlay').show();


                setTimeout(function() {
                $('.dl').show();

                $('.overlay').hide();
                 
                 }, 4000);
                 
                $('.dllink').html(response['dllink']);


            },
            

            error: function(file, response)
            {
               return false;
             
            }
};
</script>
<script>
$('.dropzone').hide();
console.log('hi');
$('.uploadparam').click(function(){
		// alert('hi');

// $('.dlcount, .dltime').each(function() {
		if(!$('.dlcount').val()|| !$('.dltime').val()){
			$('.err').html('لطفا موارد زیر را وارد نمایید.');
			$('.errbox').effect('shake', {direction: "up", times: 2, distance: 5}, 2000);
		}else{
			$('.err').html('');
      var dlcount=$('.dlcount').val();
      var dltime=$('.dltime').val();
      // alert(dltime);
      var token = $('#csrfToken').val();
      var header = $('#csrfHeader').val();

      $.ajax({
       url:'/site/uploadparam',
       type:'POST',
       dataType:'json',
       data:{'dlcount':dlcount,'dltime':dltime,_token: '{{csrf_token()}}'},
       success:function(response,status){
        //  alert(response['uploadid']);
         $('#dropzone').data('uploadid',response['uploadid']);
        //  var uploadid=$('#dropzone').data('uploadid');
        //  alert(uploadid);

       }

      });
      $('.dropzone').show();
    }

		
	});
  
var i = 0;
var txt = 'سلام'; /* The text */
var speed = 50; /* The speed/duration of the effect in milliseconds */

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("imgtext").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}
	
</script>
</body>

</html>