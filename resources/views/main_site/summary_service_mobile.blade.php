<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<body>
<div class="container">

<div class="row">
  <h2 style="color:#3544ab">Your Application Details</h2>
</div>
<form action="/application/service/create" method="post">
  @csrf
<div class="row">
  <div class="form-group col-6">
    <label for="email">Applicant Full name </label>
    <input name="fname_en" class="form-control" id="email" type="text" value="{{$application->applicant_name_en}}" disabled>
  </div>
  <div class="form-group col-6">
    <label for="pwd">الاسم الكامل</label>
 <input name="fname_ar" class="form-control" id="email" type="text" value="{{$application->applicant_name_ar}}" disabled>
  </div>


     <div class="form-group col-6">
    <label for="pwd">Birthdate</label>
    <input name="birthdate"  class="form-control" id="pwd" type="text" value="{{$application->birthdate}}" disabled>
  </div>

    <div class="form-group col-6">
    <label for="pwd">Service Name</label>
    <input name="service_name_en" class="form-control" id="pwd" type="text" value="{{$application->service->en_title}}" disabled>
  </div>

   <div class="form-group col-6">
    <label for="pwd">اسم الخدمة</label>
    <input name="service_name_ar" class="form-control" id="pwd" type="text" value="{{$application->service->ar_title}}" disabled>
  </div>




  <div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">nationality</label>
    <input name="nationality" class="form-control" id="pwd" type="text" value="{{$application->nationality}}" disabled>
  </div>


    <div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">@lang('national id')</label>
    <input name="national_id" class="form-control" id="pwd" type="text" value="{{$application->national_id}}" disabled>
  </div>

<div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">@lang('martial_status')</label>
    <input name="martial_status" class="form-control" id="pwd" type="text" value="{{$application->martial_status}}" disabled>
  </div>

<div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">@lang('work')</label>
    <input name="work" class="form-control" id="pwd" type="text" value="{{$application->work}}" disabled>
  </div>

  @foreach ($application->options as $option)
    {{-- expr --}}

   <div class="form-group col-6">
    <label for="email">{{$option->title}}</label>
    <input name="{{$option->attr}}" class="form-control" id="email" type="text" value="{{$option->app_option->option_value}}" disabled>
  </div>
    @endforeach

<div class="row">

</div>

</div>


<div class="row">
<h4 style="color: #3544ab;">@lang('thanks_sub')</h4>
</div>

<div class="row">
  <h4 style="color: #3544ab;">@lang('thanks_email')</h4>
</div>


 <div class="row">
<a style="color:#3544ab;margin: 1%;font-size: 20px;" href="/">click here if you want to back to main page</a>
</div>


@if($application->confirm==0)
<div class="col-lg-8" style="margin-top:5%;margin-bottom:5%;">

  <a href="/application/confirm/service/mobile/{{$application->id}}" class="btn btn-primary">Confirm</a>


  <a href="/application/unconfirm/service/mobile/{{$application->id}}" class="btn btn-danger">Cancel</a>

</div>
@endif
{{--     <div class="form-group col-6">
    <label for="pwd">service</label>
    <select class="form-control" name="service_sons">
      <option selected disabled>Select Your Main Service</option>
      @foreach ($services as $service)
      @foreach ($ as $element)
        <option value="{{$service->id}}">{{$service->en_title}}</option>
      @endforeach

      @endforeach
    </select>


  </div> --}}

</form>
</div>


<script type="text/javascript" src="{{ asset('main_site/js/options.js') }}"></script>
<script type="text/javascript">
  $('#main_service').on('change', '', function (e) {
get_sub_service();
});
    $('#sub_service').on('change', '', function (e) {
get_options();
});



</script>
</body>
</html>
