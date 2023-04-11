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
    <div id="content-wrapper">

      <a style="margin:1%" href="/admin/{{Request::segment(2)}}/create/{{$parent_id}}" class="btn btn-success"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Add New {{Request::segment(2)}}</a>



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
                    <th>en_title</th>
                    <th>ar_title</th>
                    <th>en_subtitle</th>
                    <th>ar_subtitle</th>
                    <th>en_description</th>
                    <th>ar_description</th>
                    <th>operations</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($product_sons as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                  <td><a href="/admin/media/index/{{$product->id}}/product">{{$product->en_title }}</a></td>
                  <td>{{$product->ar_title}}</td>
                  <td>{{$product->en_subtitle}}</td>
                  <td>{{$product->ar_subtitle}}</td>
                  <td>{{$product->en_description}}</td>
                  <td>{{$product->ar_description}}</td>
                    <td style="width: 18%;"><div class="container">
                      <div  class="row"><a style="margin-left:1%" href="/admin/{{Request::segment(2)}}/update/{{$product->id}}"><button class="btn btn-primary" aria-hidden="true">Edit</button></a><a  style="margin-left:1%;color:rgba(204, 0, 0, 1);" onclick="return confirm('Are you sure you want to delete this product')" href="/admin/{{Request::segment(2)}}/delete/{{$product->id}}"><button class="btn btn-danger" aria-hidden="true">Delete</button></a></div>
                      @if($product->active==1)
                      <a style="margin-left:1%" href="/admin/service/active/{{$product->id}}"><button class="btn btn-danger" aria-hidden="true">Deactivate</button></a>
                      @else
                      <a style="margin-left:1%" href="/admin/service/active/{{$product->id}}"><button class="btn btn-primary" aria-hidden="true">Activate</button></a>
                      @endif
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
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
