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
<form  class="container" action='/admin/about/update/{{$aboutus->id}}' method="POST" enctype="multipart/form-data">
  @csrf

        <div class="form-group">
    <label for="exampleInputEmail1">about us Description</label>
    <textarea name="description" class="form-control" rows="5" id="comment" required>{{$aboutus->description}}</textarea>
    
  </div>


        <div class="form-group">
    <label for="exampleInputEmail1">about us address</label>
    <input name="address" class="form-control"  id="comment" required value="{{$aboutus->address}}">
    
  </div>


  <div id="us2" style="width: 500px; height: 400px;"></div>

       <div class="form-group">
    <label for="exampleInputEmail1">lat</label>
    <input name="lat" class="form-control" id="lat" required value="{{$aboutus->lat}}">
    
  </div>

       <div class="form-group">
    <label for="exampleInputEmail1">lang</label>
    <input name="lang" class="form-control"  id="lang" required value="{{$aboutus->lang}}">
    
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


<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
<script src="{{ asset('js/locationpicker.jquery.js') }}"></script>


  <script type="text/javascript">
    $('#us2').locationpicker(

    {
enableAutocomplete: true,
    enableReverseGeocode: true,
  radius: 0,
  inputBinding: {
    latitudeInput: $('#lat'),
    longitudeInput: $('#lang'),
    radiusInput: $('#us2-radius'),

  },
  onchanged: function (currentLocation, radius, isMarkerDropped) {
        var addressComponents = $(this).locationpicker('map').location.addressComponents;
    console.log(currentLocation);  //latlon  
    updateControls(addressComponents); //Data
    }

});

function updateControls(addressComponents) {
  console.log(addressComponents);
}
  </script>
@endsection


</body>

</html>
