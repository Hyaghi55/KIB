@extends('layouts.main_layout')

@section('content')
<div class="container">


<div style="margin-bottom:3%" class="row">
  <h2  style="color:#3544ab;text-transform: capitalize;margin-top: 2%;">@lang('User Active'):</h2>
</div>
<form action="/user/active" method="post">
  @csrf
<div class="row">
   <div class="form-group col-lg-6 col-sm-12">
    <label for="email">@lang('Email')</label>
    <input name="email" class="form-control" id="email" type="text">
  </div>

    <div class="form-group col-lg-6 col-sm-12">
    <label for="email">@lang('code')</label>
    <input name="code" class="form-control" id="code" type="password">
  </div>
</div>

<div class="row">
<button style="margin: 1%;
    padding: 1% 3% 1% 3%;background-color:#3544ab;border-color:#3544ab" type="submit" class="btn btn-primary">@lang('active')</button>
</div>


</form>
</div>
@endsection
