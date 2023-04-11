@extends('layouts.admin_layout')
@section('styles')
    <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">


     {{-- <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
	
{{-- <form class="container" action="/sendnotify" method="POST"  enctype="multipart/form-data"> --}}
  {{-- @csrf --}}
  <div class="container">
	  <div class="form-group">
    <label for="exampleInputEmail1">Notification title</label>
    <input name="title" class="form-control"  id="title" required>
    
  </div>
       <div class="form-group">
    <label for="exampleInputEmail1">Notification body</label>
    <textarea name="body" rows="5" class="form-control"  id="body" required></textarea>
  </div>

    <div class="form-group">
    <button id="submitclick"  class="btn btn-success"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Send Notification</button>
    </div>
     </div>
{{-- </form> --}}
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

 {{--  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script> --}}



<script type="text/javascript" src="{{ asset('main_site/js/push.js')}}">
</script>
<script type="text/javascript" src="{{ asset('main_site/js/push.min.js')}}">
</script>
<script src="https://www.gstatic.com/firebasejs/6.2.4/firebase-app.js"></script>





<script type="text/javascript">




       function not_send() {

        var title = $('#title').val();

        var body = $('#body').val();
    // body...
  
     $.ajax({        
            type : 'POST',
            url : "https://fcm.googleapis.com/fcm/send",
            headers : {
           Authorization : 'key=AIzaSyBE17OESDR3s5CcEVa6YxU96qLAirkn0Uw'
            },
            contentType : 'application/json',
            dataType: 'json',
            data: JSON.stringify({"to": "/topics/allUsers", "notification": {"title":title,"body":body}}),
            success : function(response) {

                   $.ajax({        
            type : 'POST',
            url : "/api/notification/create",
            contentType : 'application/json',
            dataType: 'json',
            data: JSON.stringify({"title":title,"body":body}),
            success : function(response) {

              var notification=response.data;

                console.log(notification);
                var notification_id=notification.id;
                       $.ajax({        
            type : 'POST',
            url : "/api/notification/create_to_users",
            contentType : 'application/json',
            dataType: 'json',
            data: JSON.stringify({"notification_id":notification_id}),
            success : function(response) {
              var notification=response.data;
                console.log(notification);
                window.location.replace("https://khouryinsurance.com/admin/notification/index");
            },
            error : function(xhr, status, error) {
                console.log(xhr.error);                   
            }
        });
            },
            error : function(xhr, status, error) {
                console.log(xhr.error);                   
            }
        });
          
            },
            error : function(xhr, status, error) {
                console.log(xhr.error);                   
            }
        });
       }



  $(document).ready(function() {

 $("#submitclick").click(function(){
     not_send();
    });
 });





</script>