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
            {{-- expr --}}

          <h1 style="text-transform: uppercase;" class="h3 mb-2 text-gray-800">{{Request::segment(2)}}</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
               <a style="margin:1%" href="/admin/{{Request::segment(2)}}/create" class="btn btn-success"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Add New {{Request::segment(2)}}</a>  
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>URL</th>
                      <th>value</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($options as $option)
                    <tr>
                      <td>{{$option->title}}</td>
                      <td>{{$option->type}}</td>
                      <td>{{$option->value}}</td>
                         <td style="width: 18%;"><div class="container">
                      <div  class="row"><a style="margin-left:1%" href="/admin/{{Request::segment(2)}}/update/{{$option->id}}"><button class="btn btn-primary" aria-hidden="true">Edit</button></a><a  style="margin-left:1%;color:rgba(204, 0, 0, 1);" onclick="return confirm('Are you sure you want to delete this {{Request::segment(2)}} ')" href="/admin/{{Request::segment(2)}}/delete/{{$option->id}}"><button class="btn btn-danger" aria-hidden="true">Delete</button></a></div>
                      </div>
                    <div>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <!-- /.container-fluid -->
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
</body>

</html>
