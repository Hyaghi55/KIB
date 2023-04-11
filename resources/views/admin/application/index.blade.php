    @extends('layouts.admin_layout')
@section('styles')
    <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this application -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endsection
    @section('content')
    <div id="content-wrapper">





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
                    <th style="width:10%;">#</th>
                    <th >applicant english name </th>
                    <th style="width:20%;">applicant arabic name </th>
                    <th style="width:20%">service</th>
                    <th style="width:20%">type</th>
                    <th style="width:20%">nationality</th>
                    <th>national_id</th>
                    <th>martial_status</th>
                    <th>work</th>
                    <th>cost</th>
                    <th>payment</th>
                    <th>user</th>
                    <th>birthdate</th>
                    <th>code</th>
                    <th>application date</th>
                     <th>Operations</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($applications as $application)
                  <tr>
                    <td style="width:10%">{{$application->id }}</td>
                    <td style="width:20%">{{$application->applicant_name_en}}</td>
                    <td style="width:20%">{{$application->applicant_name_ar}}</td>
                    {{-- <td>{{$application->applicant_name_ar}}</td> --}}
                    <td style="width:20%">{{$application->service->en_title}}</td>
                    <td style="width:20%">{{$application->service->type}}</td>
                    <td>{{$application->nationality}}</td>
                    <td>{{$application->national_id}}</td>
                    <td>{{$application->martial_status}}</td>
                    <td>{{$application->work}}</td>
                    <td>{{$application->cost}}</td>
                    @if ($application->paid=='1')
                    	<td>Paid</td>
                    	@else
                    	<td>Not Paid</td>
                    @endif
                    @if ($application->user!=null)
                     <td>{{$application->user->name}}</td>
                     @else
                     <td>Deleted</td>
                    @endif
                    
                     <td>{{$application->birthdate}}</td>
                      <td>{{$application->code}}</td>
                       <td>{{$application->date}}</td>
                    <td style="width: 17%;"><div class="container">
                      <div  class="row"><a style="margin-left:1%" href="/admin/{{Request::segment(2)}}/{{$application->id}}"><button class="btn btn-primary" aria-hidden="true">View App details</button></a>
                        <a  style="margin-left:1%;color:rgba(204, 0, 0, 1);" onclick="return confirm('Are you sure you want to delete this bank')" href="/admin/{{Request::segment(2)}}/delete/{{$application->id}}"><button class="btn btn-danger" aria-hidden="true">Delete</button></a>
                      </div>
                      </div>
                    <div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>



      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © KIB 2019</span>
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
    <script src="{{ asset('js/dropzone.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script type="text/javascript">
  $(".js-example-tokenizer").select2({
tags: true,
tokenSeparators: [',', ' ']
})
</script>

@endsection
