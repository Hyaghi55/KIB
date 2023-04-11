    @extends('layouts.admin_layout')
@section('styles')
    <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <!-- <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> -->
@endsection
    @section('content')
    <div id="content-wrapper">

      <a style="margin:1%" href="/admin/{{Request::segment(2)}}/create" class="btn btn-success"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Add New {{Request::segment(2)}}</a>






      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active" style="text-transform: capitalize;">{{Request::segment(2)}}</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            {{Request::segment(2)}}</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>username</th>
                    <th>email</th>
                    <th>birthdate</th>
                    <th>City</th>
                    <th>Code</th>
                    <th>Phone</th>
                    <th>role</th>
                    <th>Operations</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->username}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->birthdate}}</td>
                  @if ($user->city!=null)
                  <td>{{$user->city->en_title}}</td>
                  @else
                  <td>Deleted</td>
                  @endif
                  
                  <td>{{$user->code}}</td>
                  <td>0{{$user->mobile}}</td>
                  <td>{{$user->role}}</td>
                    <td style="width: 18%;"><div class="container">
                      <div  class="row"><a style="margin-left:1%" href="/admin/{{Request::segment(2)}}/update/{{$user->id}}"><button class="btn btn-primary" aria-hidden="true">Edit</button></a><a  style="margin-left:1%;color:rgba(204, 0, 0, 1);" onclick="return confirm('Are you sure you want to delete this user')" href="/admin/{{Request::segment(2)}}/delete/{{$user->id}}"><button class="btn btn-danger" aria-hidden="true">Delete</button></a> <a  style="margin-left:1%;color:rgba(204, 0, 0, 1);" href="/admin/{{Request::segment(2)}}/index/{{$user->id}}"></div>
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



      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->
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
  <!-- <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/b-1.5.6/datatables.min.css"/>

  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/b-1.5.6/datatables.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

  <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>




@endsection
