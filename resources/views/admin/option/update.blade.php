@extends('layouts.admin_layout')
@section('styles')
    <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endsection
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
          <!-- Page Heading -->
          @section('content')
          
@if($errors->any())
<div class="alert alert-danger col-lg-6">
  {{$errors->first()}}
</div>           
@endif

  <div class="col-6">
<form  class="container" action='/admin/{{Request::segment(2)}}/update/{{$option->id}}' method="POST" enctype="multipart/form-data">
  @csrf

        <div class="form-group">
    <label for="exampleInputEmail1">{{Request::segment(2)}} Title</label>
    <input name="title" class="form-control" id="comment" required value="{{$option->title}}">
    
  </div>
        <div class="form-group">
<label for="exampleInputEmail1">{{Request::segment(2)}} Option Type</label>
  <select class="form-control"  name="type">
    <option selected disabled>choose option Type</option>
    @if ($option->type=='dropdown')
    <option value="dropdown" selected>Dropdown</option>
    @else
    <option value="input" selected>Input</option>
    @endif
</select>
</div>


  <div class="form-group">
    <label for="exampleInputEmail1">{{Request::segment(2)}} Attribute</label>
    <input name="attr" class="form-control" id="comment" required value="{{$option->attr}}">
    
  </div>

     <div class="form-group">
<label for="exampleInputEmail1">{{Request::segment(2)}} Service</label>
<select class="form-control"  name="service">
  <option selected disabled>choose the service</option>
  @foreach ($services as $service)
  @if ($option->service->en_title==$service->en_title)
       <option value="{{$service->id}}" selected>{{$service->en_title}}</option>
  @else
  <option value="{{$service->id}}">{{$service->en_title}} / {{$service->type}}</option>
  @endif

  @endforeach
    
</select>
</div>




  <select class="form-control js-example-tokenizer" multiple="multiple" name="value[]">
    @php
     {{$values=explode('@',$option->value);}}
         @endphp

     @foreach ($values as $value)
      <option value="{{$value}}" selected>{{$value}}</option>
     @endforeach
</select>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script src="{{ asset('js/dropzone.js') }}"></script>

    <script type="text/javascript">
      $(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',']
})
    </script>
@endsection


</body>

</html>
