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
   <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
	<div class="col-6">
<form  class="container" action='/admin/{{Request::segment(2)}}/update/{{$news->id}}' method="POST" enctype="multipart/form-data">
	@csrf

			<div class="form-group">
		<label for="exampleInputEmail1">{{Request::segment(2)}} en_Title</label>
		<input name="en_title" class="form-control"  id="comment" required value="{{$news->en_title}}">
		
	</div>

				<div class="form-group">
		<label for="exampleInputEmail1">{{Request::segment(2)}} ar_Title</label>
		<input name="ar_title" class="form-control"  id="comment" required value="{{$news->ar_title}}">
		
	</div>


            <div class="form-group">
    <label for="exampleInputEmail1">{{Request::segment(2)}} en_body</label>
    <textarea name="en_body" rows="5" class="form-control summernote"  id="comment" required>{{$news->en_body}}</textarea>
    
  </div>


          <div class="form-group">
    <label for="exampleInputEmail1">{{Request::segment(2)}} ar_body</label>
    <textarea name="ar_body" rows="5" class="form-control summernote"  id="comment" required>{{$news->ar_body}}</textarea>
    
  </div>

	<button  type="submit" class="btn btn-primary"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Update {{Request::segment(2)}}</button>
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


<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
  $('.summernote').summernote();
});
</script>
@endsection