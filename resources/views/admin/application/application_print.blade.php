<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<img src="http://khouryinsurance.com/main_site/img/Logo.png" style="width:100px;height:100px;margin-left: 45%;" class="center-block">
	</header>
<div class="container">

{{-- <div class="row">
	<h2 style="color:#3544ab">Your application Details</h2>
</div> --}}
<div class="row">
  <div class="form-group col-lg-4 col-sm-4">
    <label for="email">Applicant Full name </label>
    <input name="fname_en" class="form-control" id="email" type="text" value="{{$application->applicant_name_en}}" disabled>
  </div>
  <div class="form-group col-lg-4 col-sm-4">
    <label for="pwd">الاسم الكامل</label>
 <input name="fname_ar" class="form-control" id="email" type="text" value="{{$application->applicant_name_ar}}" disabled>
  </div>


     <div class="form-group col-lg-4 col-sm-4">
    <label for="pwd">Birthdate</label>
    <input name="birthdate"  class="form-control" id="pwd" type="text" value="{{$application->birthdate}}" disabled>
  </div>

    <div class="form-group col-lg-4 col-sm-4">
    <label for="pwd">Service Name</label>
    <input name="service_name_en" class="form-control" id="pwd" type="text" value="{{$application->service->en_title}}" disabled>
  </div>

   <div class="form-group col-lg-4 col-sm-4">
    <label for="pwd">اسم الخدمة</label>
    <input name="service_name_ar" class="form-control" id="pwd" type="text" value="{{$application->service->ar_title}}" disabled>
  </div>


  <div class="form-group col-lg-4 col-sm-4">
    <label for="pwd">nationality</label>
    <input name="nationality" class="form-control" id="pwd" type="text" value="{{$application->nationality}}" disabled>
  </div>


    <div class="form-group col-lg-4 col-sm-4">
    <label for="pwd">@lang('national id')</label>
    <input name="national_id" class="form-control" id="pwd" type="text" value="{{$application->national_id}}" disabled>
  </div>

<div class="form-group col-lg-4 col-sm-4">
    <label for="pwd">@lang('martial_status')</label>
    <input name="martial_status" class="form-control" id="pwd" type="text" value="{{$application->martial_status}}" disabled>
  </div>

<div class="form-group col-lg-4 col-sm-4">
    <label for="pwd">@lang('work')</label>
    <input name="work" class="form-control" id="pwd" type="text" value="{{$application->work}}" disabled>
  </div>
  @foreach ($application->options as $option)
  	{{-- expr --}}

   <div class="form-group col-lg-4 col-sm-4">
    <label for="email">{{$option->title}}</label>
    <input name="{{$option->attr}}" class="form-control" id="email" type="text" value="{{$option->app_option->option_value}}" disabled>
  </div>
    @endforeach


     <div class="form-group col-lg-4 col-sm-4">
    <label for="pwd">Code</label>
    <input name="birthdate"  class="form-control" id="pwd" type="text" value="{{$application->code}}" disabled>
  </div>

      <div class="form-group col-lg-4 col-sm-4">
    <label for="pwd">Cost</label>
    <input name="birthdate"  class="form-control" id="pwd" type="text" value="{{$application->cost}}" disabled>
  </div>

<div class="row" style="margin-left: 80%;margin-top: 3%;">
	<h6 class="text-right">التوقيع : {{$application->applicant_name_ar}}</h6>
</div>
{{-- <div class="row" style="margin-bottom: 3%;">
	<button id="print" style="background-color: #012079;
    border-color: #012079;color:white;" class="btn btn-primary">Print Application</button>
</div> --}}
</div>
</div>

<script type="text/javascript">
$( document ).ready(function() {
      window.print();
});
 

</script>
</body>
</html>