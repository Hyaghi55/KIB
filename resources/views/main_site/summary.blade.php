@extends('layouts.main_layout')

@section('content')
<div class="container">

<div class="row">
	<h2 style="color:#3544ab">Your Application Details</h2>
</div>
<form action="/application/create" method="post">
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

@if (Session::get('family_members')!=null)
  {{-- expr --}}


     <div class="form-group col-6">
    <label for="email">Family Members count</label>
    <input name="{{Session::get('family_members')}}" class="form-control" id="email" type="text" value="{{Session::get('family_members')}}" disabled>
  </div>

     @for ($i = 1; $i < Session::get('family_members')+1;$i++)
       {{-- expr --}}
     
    {{-- expr --}}

   <div class="form-group col-6">
    <label for="email">Family Member {{$i}} BirthDate</label>
    <input name="{{Session::get('birthdate'.$i)}}" class="form-control" id="email" type="text" value="{{Session::get('birthdate'.$i)}}" disabled>
  </div>
    @endfor
@endif





</div>
<div class="container">

@if($application->confirm==0)
<div class="row">
<h4 style="color: #3544ab; font-weight:bold;">@lang('confirm')</h4>
</div>

<div class="row">
  <h4 style="color: #3544ab; font-weight:bold;">@lang('thanks_cost')<span style="color: green;">{{$application->cost}}</span> </h4>
</div>

</div>


<div class="col-lg-8" style="margin-top:5%;margin-bottom:5%;">

  <a href="/application/confirm/{{$application->id}}" class="btn btn-primary">Confirm</a>


  <a href="/application/unconfirm/{{$application->id}}" class="btn btn-danger">Cancel</a>

</div>
@else
<div class="row">
<h4 style="color: #3544ab; font-weight:bold;">@lang('thanks_code')<span style="color: green;">{{$application->code}}</span> </h4>
</div>

<div class="row">
  <h4 style="color: #3544ab; font-weight:bold;">@lang('thanks_cost')<span style="color: green;">{{$application->cost}}</span> </h4>
</div>

 <div class="row">
<a style="color:#3544ab;margin: 1%;font-size: 20px;" href="/">click here if you want to back to main page</a>
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
@endsection
