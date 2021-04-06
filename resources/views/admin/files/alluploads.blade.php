@extends('main')
@section('content')
<div class="container" style="margin-bottom: 20vh;width:100%">
<h2 class=" text-center" style="margin-top:15vh;margin-bottom:5vh;">فایل های آپلود شده</h2>
<div style="overflow-x: auto;" class="mb-5 mb-md-0 tablediv">
<table class="table table-striped table-bordered col-12" id="table" >
<thead>
<tr>
<th>id</th>
<th>نام فایل</th>
<th>ip کاربر</th>
<th>دفعات مجاز دانلود</th>
<th>زمان مجاز دانلود</th>
<th>دفعات دانلود باقی مانده </th>
<th>زمان باقی مانده دانلود(روز)</th>
<th>شناسه دانلود</th>
<th>وضعیت فایل</th>
</tr>
</thead>

<tbody>
@foreach($uploads as $upload)
<tr>
<td>{{$upload->id}}</td>
<td>{{$upload->filename}}</td>
<td>{{$upload->ip}}</td>
<td>{{$upload->maxdlcount}}</td>
<td>{{$upload->dltime}}</td>
<td>{{$upload->dlcount}}</td>
<td  >{{$upload->dlremaintime}}</td>
<td>{{$upload->downloadid}}</td>
<td>{{$upload->status->status}}</td>
</tr>
@endforeach
</tbody>

</table>
</div>
<script>
$(document).ready(function(){
    console.log('hi');
    $('#table').DataTable();
    // scrollX: true
});
</script>

</div>

@endsection