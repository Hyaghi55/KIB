@extends('layouts.main_layout')

@section('content')
<div class="container">


<div class="row">
  <h2  style="color:#3544ab;text-transform: capitalize;margin-top: 2%;">@lang('User Login'):</h2>
</div>
<form action="/user/login" method="post">
  @csrf
<div class="row">
   <div class="form-group col-lg-6 col-sm-12">
    <label for="email">@lang('Email')</label>
    <input name="email" class="form-control" id="email" type="text">
  </div>
</div>
<div class="row">
   <div class="form-group col-lg-6 col-sm-12">
    <label for="email">@lang('Password')</label>
    <input name="password" class="form-control" id="email" type="password">
  </div>
</div>

<div class="row">
<button style="margin: 1%;
    padding: 1% 3% 1% 3%;background-color:#3544ab;border-color:#3544ab" type="submit" class="btn btn-primary">@lang('login')</button>
</div>

<div class="row">
  <a style="color:#3544ab;margin: 1%;font-size: 15px;font-weight:bold;" href="/password/reset">Did You forget Your password click here to reset</a>
</div>

<div class="row">
<a style="color:#3544ab;margin: 1%;font-size: 20px;" href="/user/register">@lang('Havent you join us please register')</a>
</div>


</form>
</div>
@endsection
