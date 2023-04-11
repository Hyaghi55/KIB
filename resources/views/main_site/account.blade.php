@extends('layouts.main_layout')

@section('content')
<div class="container">
    

<div class="row">
    <h2 style="color:#3544ab">@lang('account')</h2>
</div>
<form action="/account" method="post">
  @csrf
<div class="row">
  <div class="form-group col-4">
    <label for="email">First Name</label>
    <input name="fname_en" class="form-control" id="email" type="text" value="{{$name[0]}}">
  </div>
  <div class="form-group col-4">
    <label for="pwd">Father's Name</label>
    <input name="father_name_en" class="form-control" id="pwd" type="text" value="{{$name[1]}}">
  </div>

    <div class="form-group col-4">
    <label for="pwd">Last Name</label>
    <input name="lname_en" class="form-control" id="pwd" type="text" value="{{$name[2]}}">
  </div>



   <div class="form-group col-4">
    <label for="email">Email</label>
    <input name="email" class="form-control" id="email" type="text" value="{{$user->email}}">
  </div>



  

  <div class="form-group col-4">
    <label for="pwd">User Mobile</label>
    <input name="mobile" class="form-control" id="username" type="text" value="{{$user->mobile}}">
  </div>


{{--   <div class="form-group col-4">
    <label for="pwd">User Name</label>
    <input name="username" class="form-control" id="username" type="text" value="{{$user->username}}" hidden> 
  </div> --}}

{{-- 
   <div class="form-group col-4">
    <label for="email">Password</label>
    <input name="password" class="form-control" id="email" type="password" value="{{$user->password}}" hidden>
  </div>
 --}}
    <div class="form-group col-4">
    <label for="pwd">Birthdate</label>
    <input name="birthdate" class="form-control" id="birthdate" type="date" value="{{$user->birthdate}}">
  </div>

    <div class="form-group col-6">
    <label for="pwd">city</label>
    <select class="form-control" name="city_id"  id="city_id">
        <option  disabled>Select Your City</option>
        @foreach ($cities as $city)
        @if ($user->city->city_id==$city->id)
          <option value="{{$city->id}}" selected>{{$city->en_title}}</option>
        @else
         <option value="{{$city->id}}">{{$city->en_title}}</option>
        @endif
            
        @endforeach
    </select>
  </div>
</div>
{{--     <div class="form-group col-4">
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

<div class="row">
<button style="margin: 1%;
    padding: 1% 3% 1% 3%;background-color:#3544ab;border-color:#3544ab" type="submit" class="btn btn-primary">@lang('update_account')</button>   
</div>
  
</form>
</div>
@endsection
