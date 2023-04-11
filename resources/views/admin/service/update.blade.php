@extends('layouts.admin_layout')
@section('content')
@section('styles')
    <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@if($errors->any())
<div class="alert alert-danger col-lg-6">
  {{$errors->first()}}
</div>           
@endif

  <div class="col-6">
<form  class="container" action='/admin/{{Request::segment(2)}}/update/{{$service->id}}' method="POST" enctype="multipart/form-data">
  @csrf

      <div class="form-group">
    <label for="exampleInputEmail1">{{Request::segment(2)}} english title</label>
    <input name="en_title" class="form-control"  id="comment" required value="{{$service->en_title}}">
    
  </div>

        <div class="form-group">
    <label for="exampleInputEmail1">{{Request::segment(2)}} arabic Title</label>
    <input name="ar_title" class="form-control"  id="comment" required value="{{$service->ar_title}}">
    
  </div>

          <div class="form-group">
    <label for="exampleInputEmail1">{{Request::segment(2)}} english subtitle</label>
    <input name="en_subtitle" class="form-control"  id="comment" required value="{{$service->en_subtitle}}">
    
  </div>

          <div class="form-group">
    <label for="exampleInputEmail1">{{Request::segment(2)}} arabic subtitle</label>
    <input name="ar_subtitle" class="form-control"  id="comment" required value="{{$service->ar_subtitle}}">
    
  </div>


          <div class="form-group">
    <label for="exampleInputEmail1">{{Request::segment(2)}} english description</label>
    <textarea name="en_description" rows="5" class="form-control"  id="comment" required>{{$service->en_description}}</textarea>
  </div>


          <div class="form-group">
    <label for="exampleInputEmail1">{{Request::segment(2)}} arabic description</label>
    <textarea name="ar_description" rows="5" class="form-control"  id="comment" required>{{$service->ar_description}}</textarea>
  </div>


{{--          <div class="form-group">
    <label for="exampleInputEmail1">{{Request::segment(2)}} parent_id</label>
    <select name="parent_id" class="form-control">
      <option value="0">Father</option>
      @foreach ($services as $service)
      <option value="{{$service->id}}">{{$service->en_title}}</option>
      @endforeach
      
    </select>
    
  </div> --}}
<div class="form-group">
  <label for="exampleInputEmail1">{{Request::segment(2)}} Company</label>
  <select name="company_id[]" class="custom-select" multiple>
    @foreach ($service->partner as $partner)
    @foreach ($companies as $company)
    @if ($partner->id==$company->id)
      <option value="{{$company->id}}" selected>{{$company->title}}</option>
      @else
      @if ($partner->id!=$company->id)
      <option value="{{$company->id}}">{{$company->title}}</option>
      @else
      <option value="{{$company->id}}" hidden>{{$company->title}}</option>
      @endif

    @endif
    @endforeach

    @endforeach
  </select>    
</div>

<!-- <div class="form-group">
 <label for="exampleInputEmail1">quotation</label>
  <input class="active" type="file" name="quotation" enctype="multipart/form-data"  multiple>
</div> -->

<div class="form-group">
  <label for="exampleInputEmail1">Image</label>
  <input class="active" type="file" name="image[]" enctype="multipart/form-data"  multiple>
  <br><br>
</div>
  <div class="form-group">
  <label for="exampleInputEmail1">icon</label>
  <input class="active" type="file" name="icon" enctype="multipart/form-data" >
</div>
  <button  type="submit" class="btn btn-success"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Update {{Request::segment(2)}}</button>
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