@extends('layouts.admin_layout')
@section('styles')
    <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">


<div class="row">
  <h2  style="color:#3544ab;text-transform: capitalize;margin-top: 2%;">Admin User create</h2>
</div>
<form action="/admin/user/create" method="POST" enctype="multipart/form-data">
  @csrf
<div class="row">
  <div class="form-group col-lg-4 col-sm-12">
    <label for="email">@lang('First Name')</label>
    <input name="fname_en" class="form-control" id="email" type="text" value="{{old('fname_en')}}">
  </div>
  <div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">@lang('Fathers Name')</label>
    <input name="father_name_en" class="form-control" id="pwd" type="text" value="{{old('father_name_en')}}">
  </div>

    <div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">@lang('Last Name')</label>
    <input name="lname_en" class="form-control" id="pwd" type="text" value="{{old('lname_en')}}">
  </div>


   <div class="form-group col-lg-4 col-sm-12">
    <label for="email">@lang('Email')</label>
    <input name="email" class="form-control" id="email" type="text" value="{{old('email')}}">
  </div>



 <div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">@lang('Mobile')</label>
    <input name="mobile" class="form-control" id="mobile" type="text" value="{{old('mobile')}}" placeholder="type your mobile nine digits example 993000000">
  </div>



  <div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">@lang('User Name')</label>
    <input name="username" class="form-control" id="username" type="text" value="{{old('username')}}">
  </div>


   <div class="form-group col-lg-4 col-sm-12">
    <label for="email">@lang('Password')</label>
    <input name="password" class="form-control" id="email" type="password" value="{{old('password')}}">
  </div>

    <div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">@lang('Birthdate')</label>
    <input name="birthdate" class="form-control" id="birthdate" type="date" value="{{old('birthdate')}}">
  </div>

    <div class="form-group col-lg-6 col-sm-12">
    <label for="pwd">@lang('city')</label>
    <select class="form-control" name="city_id"  id="city_id">
        <option selected disabled>@lang('Select Your City')</option>
        @foreach ($cities as $city)
            <option value="{{$city->id}}">{{$city->en_title}}</option>
        @endforeach
    </select>


     
  </div>

     <div class="form-group col-lg-6 col-sm-12">
    <label for="pwd">User Role</label>
    <select class="form-control" name="role"  id="role" value="{{old('role')}}">
        <option selected disabled>Select User Role</option>
        <option value="user">user</option>
        <option value="admin">admin</option>
        <option value="company">company</option>
    </select>


     
  </div>
</div>
{{--     <div class="form-group col-lg-4 col-sm-12">
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


  <div class="form-group">
  <label for="exampleInputEmail1">Image</label>
  <input class="active" type="file" name="image" enctype="multipart/form-data">
</div>



  <button  type="submit" class="btn btn-success"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Create {{Request::segment(2)}}</button>



</form>
</div>
@endsection
    @section('scripts')
   <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection