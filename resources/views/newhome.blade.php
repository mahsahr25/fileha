@extends('main')
@section('content')
<!-- scroll text -->
<div class="holder mt-md-5">
<p class="news mt-2">آپلود و دانلود فایل </p>
</div>
<!-- end of scroll text -->
<div class="top-img col-12 text-center ">
    <div class="imgtext  pt-4 streak " id="imgtext "> انتقال امن فایل
      
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

<div class="container-fluid  mt-4  middlesection">

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


<div class="overlay">
  
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
		


		if(!$('.dlcount').val()|| !$('.dltime').val()){
			$('.err').html('لطفا موارد زیر را وارد نمایید.');
			$('.errbox').effect('shake', {direction: "up", times: 2, distance: 5}, 2000);
		}else{
			$('.err').html('');
      var dlcount=$('.dlcount').val();
      var dltime=$('.dltime').val();
      
      var token = $('#csrfToken').val();
      var header = $('#csrfHeader').val();

      $.ajax({
       url:'/site/uploadparam',
       type:'POST',
       dataType:'json',
       data:{'dlcount':dlcount,'dltime':dltime,_token: '{{csrf_token()}}'},
       success:function(response,status){
        
         $('#dropzone').data('uploadid',response['uploadid']);
        

       }

      });
      $('.dropzone').show();
    }

		
	});
  



	
</script>
@endsection

<!-- </body>

</html> -->