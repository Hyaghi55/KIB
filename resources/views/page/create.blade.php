@extends('layouts.admin_layout')

@section('styles')
    <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')


@if($errors->any())
<div class="alert alert-danger col-lg-6">
  {{$errors->first()}}
</div>           
@endif

	<div class="col-6">
<form  class="container" action='/admin/{{Request::segment(2)}}/create' method="POST" enctype="multipart/form-data">
	@csrf

			<div class="form-group">
		<label for="exampleInputEmail1">{{Request::segment(2)}} english Title</label>
		<input name="en_name" class="form-control"  id="comment" required>
		
	</div>


			<div class="form-group">
		<label for="exampleInputEmail1">{{Request::segment(2)}} arabic Title</label>
		<input name="ar_name" class="form-control"  id="comment" required>
		
	</div>

				<div class="form-group">
		<label for="exampleInputEmail1">{{Request::segment(2)}} Main english Description</label>
		<textarea name="en_description" class="form-control summernote" rows="5" id="comment" required></textarea>
		
	</div>


					<div class="form-group">
		<label for="exampleInputEmail1">{{Request::segment(2)}} Main arabic Description</label>
		<textarea name="ar_description" class="form-control summernote" rows="5" id="comment" required></textarea>
		
	</div>

			<div class="form-group">
		<label for="exampleInputEmail1">{{Request::segment(2)}} link</label>
		<input name="link" class="form-control"  id="comment" required>
		
	</div>


	<label for="exampleInputEmail1">{{Request::segment(2)}} Image</label>
	<input class="active" type="file" name="img_name" enctype="multipart/form-data" required multiple>
	<br><br>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script src="{{ asset('js/dropzone.js') }}"></script>


<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
  $('.summernote').summernote();
});
    </script>
@endsection