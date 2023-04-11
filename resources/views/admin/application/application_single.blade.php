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
<div class="container">

<div class="row">
	<h2 style="color:#3544ab">Your application Details</h2>
</div>
<div class="row">
  <div class="form-group col-6">
    <label for="email">Applicant Full name </label>
    <input name="fname_en" class="form-control" id="email" type="text" value="{{$application->applicant_name_en}}" disabled>
  </div>
  <div class="form-group col-6">
    <label for="pwd">الاسم الكامل</label>
 <input name="fname_ar" class="form-control" id="email" type="text" value="{{$application->applicant_name_ar}}" disabled>
  </div>


     <div class="form-group col-6">
    <label for="pwd">Birthdate</label>
    <input name="birthdate"  class="form-control" id="pwd" type="text" value="{{$application->birthdate}}" disabled>
  </div>

    <div class="form-group col-6">
    <label for="pwd">Service Name</label>
    <input name="service_name_en" class="form-control" id="pwd" type="text" value="{{$application->service->en_title}}" disabled>
  </div>

   <div class="form-group col-6">
    <label for="pwd">اسم الخدمة</label>
    <input name="service_name_ar" class="form-control" id="pwd" type="text" value="{{$application->service->ar_title}}" disabled>
  </div>


  <div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">nationality</label>
    <input name="nationality" class="form-control" id="pwd" type="text" value="{{$application->nationality}}" disabled>
  </div>


    <div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">@lang('national id')</label>
    <input name="national_id" class="form-control" id="pwd" type="text" value="{{$application->national_id}}" disabled>
  </div>

<div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">@lang('martial_status')</label>
    <input name="martial_status" class="form-control" id="pwd" type="text" value="{{$application->martial_status}}" disabled>
  </div>

<div class="form-group col-lg-4 col-sm-12">
    <label for="pwd">@lang('work')</label>
    <input name="work" class="form-control" id="pwd" type="text" value="{{$application->work}}" disabled>
  </div>
  @foreach ($application->options as $option)
  	{{-- expr --}}

   <div class="form-group col-6">
    <label for="email">{{$option->title}}</label>
    <input name="{{$option->attr}}" class="form-control" id="email" type="text" value="{{$option->app_option->option_value}}" disabled>
  </div>
    @endforeach


     <div class="form-group col-6">
    <label for="pwd">Code</label>
    <input name="birthdate"  class="form-control" id="pwd" type="text" value="{{$application->code}}" disabled>
  </div>

      <div class="form-group col-6">
    <label for="pwd">Cost</label>
    <input name="birthdate"  class="form-control" id="pwd" type="text" value="{{$application->cost}}" disabled>
  </div>

</div>
<div class="row">
	<a class="btn btn-primary" href="/admin/application/print/{{$application->id}}">Print</a>
</div>
</div>


<!---------------------->



 




@endsection


    @section('scripts')
   <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all applications-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- application level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- application level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script src="{{ asset('js/dropzone.js') }}"></script>

    <script type="text/javascript">
      $(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})
    </script>

    <script type="text/javascript" src="{{ asset('main_site/js/options.js') }}"></script>
<script type="text/javascript">
  $('#main_service').on('change', '', function (e) {
get_sub_service();
});
    $('#sub_service').on('change', '', function (e) {
get_options();
});
  
document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("printThis"));
}

function printElement(elem, append, delimiter) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    if (append !== true) {
        $printSection.innerHTML = "";
    }

    else if (append === true) {
        if (typeof (delimiter) === "string") {
            $printSection.innerHTML += delimiter;
        }
        else if (typeof (delimiter) === "object") {
            $printSection.appendChild(delimiter);
        }
    }

    $printSection.appendChild(domClone);
}​

</script>
@endsection