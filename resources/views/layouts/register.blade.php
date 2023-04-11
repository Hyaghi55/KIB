@extends('layouts.main_layout')

@section('content')
<div class="container">


<div class="row">
  <h2  style="color:#3544ab;text-transform: capitalize;margin-top: 2%;">@lang('User Register') :</h2>
</div>
<form action="/user/register" method="post">
  @csrf
<div class="row">
  <div class="form-group col-4">
    <label for="email">@lang('First Name')</label>
    <input name="fname_en" class="form-control" id="email" type="text">
  </div>
  <div class="form-group col-4">
    <label for="pwd">@lang('Fathers Name')</label>
    <input name="father_name_en" class="form-control" id="pwd" type="text">
  </div>

    <div class="form-group col-4">
    <label for="pwd">@lang('Last Name')</label>
    <input name="lname_en" class="form-control" id="pwd" type="text">
  </div>


   <div class="form-group col-4">
    <label for="email">@lang('Email')</label>
    <input name="email" class="form-control" id="email" type="text">
  </div>



 <div class="form-group col-4">
    <label for="pwd">@lang('Mobile')</label>
    <input name="mobile" class="form-control" id="mobile" type="text">
  </div>



  <div class="form-group col-4">
    <label for="pwd">@lang('User Name')</label>
    <input name="username" class="form-control" id="username" type="text">
  </div>


   <div class="form-group col-4">
    <label for="email">@lang('Password')</label>
    <input name="password" class="form-control" id="email" type="password">
  </div>

    <div class="form-group col-4">
    <label for="pwd">@lang('Birthdate')</label>
    <input name="birthdate" class="form-control" id="birthdate" type="date">
  </div>

    <div class="form-group col-6">
    <label for="pwd">@lang('city')</label>
    <select class="form-control" name="city_id"  id="city_id">
        <option selected disabled>@lang('Select Your City')</option>
        @foreach ($cities as $city)
            <option value="{{$city->id}}">{{$city->en_title}}</option>
        @endforeach
    </select>
  </div>
</div>
{{--     <div class="form-group col-4">
    <label for="pwd">service</label>
    <select class="form-control" name="service_sons">
        <option selected disabled>@lang('Select Your Main Service')</option>
        @foreach ($services as $service)
        @foreach ($ as $element)
            <option value="{{$service->id}}">{{$service->get_title}}</option>
        @endforeach

        @endforeach
    </select>


  </div> --}}

<div class="row">
<button style="margin: 1%;
    padding: 1% 3% 1% 3%;background-color:#3544ab;border-color:#3544ab" type="submit" class="btn btn-primary">@lang('register')</button>
</div>

<div class="row">
<a style="color:#3544ab;margin: 1%;font-size: 20px;" href="/user/login">@lang('if you had join us please click to login')</a>
</div>


</form>
</div>
@endsection
