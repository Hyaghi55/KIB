<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=11" />
  <title>Welcome To KIB</title>


{{-- <style type="text/css">
	
	nav.navbar.navbar-expand-lg.navbar-light.bg-light.static-top {

    display: block;
    margin: 0px;
    position: fixed;
    width: 100%;
    z-index: 100;
    background: #00000000;
    border-radius: 0px;
    color: white;
}

</style> --}}


  <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie9.min.css" rel="stylesheet">
<link rel="manifest" href="{{request()->root()}}/public/manifest.json">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css">


<link href="https://fonts.googleapis.com/css?family=Amiri&display=swap" rel="stylesheet">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('main_site/css/main.css') }}">

  <link href="{{ asset('main_site/css/JiSlider.css') }}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ asset('main_site/css/round_icons.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js.map"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js.map"></script>


<script src="https://www.gstatic.com/firebasejs/6.3.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.3.0/firebase-messaging.js"></script>
<script src="{{ asset('main_site/js/firebase-messaging-sw.js') }}"></script>
</head>

   @if (Session::get('locale')=="ar")
<body style="font-family: 'Amiri', serif !important;    letter-spacing:0px!important;">
  @else
   <body>
    @endif
   <div id="loader">
    <img src="{{ asset('main_site/img/logo.gif') }}" width="10%">
  </div>
  <script type="text/javascript">
    var loader=document.getElementById("loader");
    window.addEventListener("load",function() {
      loader.style.height = '100px';
      loader.style.width = '100px';
      loader.style.borderRadius = '50%';
      loader.style.visibility = 'hidden';
    });
  </script>
<section id="navbar">
  <header>



    
{{--     <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
   <div class="container-fluid">
     @if (Session::get('locale')=="en")
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
   
    <div class="collapse navbar-collapse col-8" id="navbarResponsive">
     <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">@lang("Home")
                <span class="sr-only">(current)</span>
              </a>
        </li>

            <li class="nav-item">
          <a class="nav-link" href="/aboutus">@lang("About us")</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/services">@lang("Services")</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/products">@lang("Buy Insurance")</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="/galleries">@lang("Galleries")</a>
        </li>

          <li class="nav-item">
          <a class="nav-link" href="/news">@lang("News")</a>
        </li>

     

        <li class="nav-item">
          <a class="nav-link" href="/contact">@lang("Contact us")</a>
        </li>
        @if (Auth::check())
           <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> {{Auth::user()->name}} </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="/account">@lang('My account')</a>
          <a class="dropdown-item" href="/logout">@lang('Log out')</a>
        </div>
      </li>
      @else
      <li class="nav-item">
          <a class="nav-link" href="/user/login">@lang('Login')</a>
        </li>
        @endif
        @if (Session::get('locale')=="ar")
          <li class="nav-item">
          <a class="nav-link" href="/lang/en">EN</a>
        </li>
        @else
         <li class="nav-item">
          <a class="nav-link" href="/lang/ar">عربي</a>
        </li>
        @endif
      </ul>
    </div>

    <div class="col-1">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('main_site/img/Logo.png') }}" class="rounded-circle img-responsive" style="width:60px;height:60px">
        </a>
        </div>
    @else
          <div class="col-1">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('main_site/img/Logo.png') }}" class="rounded-circle img-responsive" style="width:60px;height:60px">
        </a>
        </div>
     <div dir="rtl" class="collapse navbar-collapse col-8" id="navbarResponsive">
     <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">@lang("Home")
                <span class="sr-only">(current)</span>
              </a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="/aboutus">@lang("About us")</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/services">@lang("Services")</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/products">@lang("Buy Insurance")</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="/galleries">@lang("Galleries")</a>
        </li>

          <li class="nav-item">
          <a class="nav-link" href="/news">@lang("News")</a>
        </li>

        

        <li class="nav-item">
          <a class="nav-link" href="/contact">@lang("Contact us")</a>
        </li>
        @if (Auth::check())
           <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> {{Auth::user()->name}} </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="/account">@lang('My account')</a>
          <a class="dropdown-item" href="/logout">@lang('Log out')</a>
        </div>
      </li>
      @else
      <li class="nav-item">
          <a class="nav-link" href="/user/login">@lang('Login')</a>
        </li>
        @endif
        @if (Session::get('locale')=="ar")
          <li class="nav-item">
          <a class="nav-link" href="/lang/en">EN</a>
        </li>
        @else
         <li class="nav-item">
          <a class="nav-link" href="/lang/ar">عربي</a>
        </li>
        @endif
      </ul>
    </div>

    @endif
   </div>
   </nav> --}}



    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
  <div class="row">
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

 
   @if (Session::get('locale')=="en")
 
  <div  class="collapse navbar-collapse col-lg-11"  id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">@lang("Home")
                <span class="sr-only">(current)</span>
              </a>
        </li>

         <li class="nav-item">
          <a class="nav-link" href="/aboutus">@lang("About us")</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/services">@lang("Services")</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/products">@lang("Buy Insurance")</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="/galleries">@lang("Galleries")</a>
        </li>

          <li class="nav-item">
          <a class="nav-link" href="/news">@lang("News")</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/contact">@lang("Contact us")</a>
        </li>
        @if (Auth::check())
           <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> {{Auth::user()->name}} </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="/account">@lang('My account')</a>
          <a class="dropdown-item" href="/notifications">@lang('notifications')</a>
          <a class="dropdown-item" href="/logout">@lang('Log out')</a>
        </div>
      </li>
      @else
      <li class="nav-item">
          <a class="nav-link" href="/user/login">@lang('Login')</a>
        </li>
        @endif
          @if (Session::get('locale')=="ar")
          <li class="nav-item">
          <a class="nav-link" href="/lang/en">EN</a>
        </li>
        @else
         <li class="nav-item">
          <a class="nav-link" href="/lang/ar">عربي</a>
        </li>
        @endif
        @if (Auth::check())
          {{-- expr --}}
        
        <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                @if (Auth::user()->notifications_unseen!=null)
                <span class="badge badge-danger badge-counter">{{Auth::user()->notifications_unseen->count()}}</span>
                @else
                  <span class="badge badge-danger badge-counter">0</span>
                @endif
               
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>

                @foreach (Auth::user()->notifications as $notification)
                  {{-- expr --}}
                
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{$notification->created_at->format('h:i A')}}</div>
                   {{$notification->title}}
                  </div>
                </a>
                @endforeach
                <a class="dropdown-item text-center small text-gray-500" href="/notifications">Show All Alerts</a>
              </div>
            </li>
            @endif
      </ul>
  </div>
    <div style="left: 41%;" class="col-lg-1">
     <a class="navbar-brand" href="#">
        <img src="{{ asset('main_site/img/Logo.png') }}" class="rounded-circle img-responsive" style="width:60px;height:60px">
        </a>
 </div>
@else
     <div class="col-lg-1">
     <a class="navbar-brand" href="#">
        <img src="{{ asset('main_site/img/Logo.png') }}" class="rounded-circle img-responsive" style="width:60px;height:60px">
        </a>
 </div>

  

              <div dir="rtl" style="left:60%;"  class="collapse navbar-collapse col-lg-11"  id="navbarNav">



     <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">@lang("Home")
                <span class="sr-only">(current)</span>
              </a>
        </li>

        
         <li class="nav-item">
          <a class="nav-link" href="/aboutus">@lang("About us")</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/services">@lang("Services")</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/products">@lang("Buy Insurance")</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="/galleries">@lang("Galleries")</a>
        </li>

          <li class="nav-item">
          <a class="nav-link" href="/news">@lang("News")</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="/contact">@lang("Contact us")</a>
        </li>
        @if (Auth::check())
           <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> {{Auth::user()->name}} </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="/account">@lang('My account')</a>
          <a class="dropdown-item" href="/notifications">@lang('notifications')</a>
          <a class="dropdown-item" href="/logout">@lang('Log out')</a>
        </div>
      </li>
      @else
      <li class="nav-item">
          <a class="nav-link" href="/user/login">@lang('Login')</a>
        </li>
        @endif
          @if (Session::get('locale')=="ar")
          <li class="nav-item">
          <a class="nav-link" href="/lang/en">EN</a>
        </li>
        @else
         <li class="nav-item">
          <a class="nav-link" href="/lang/ar">عربي</a>
        </li>
        @endif
             @if (Auth::check())
          {{-- expr --}}
        
        <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{Auth::user()->notifications->count()}}</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>

                @foreach (Auth::user()->notifications as $notification)
                  {{-- expr --}}
                
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{$notification->created_at->format('h:i A')}}</div>
                   {{$notification->title}}
                  </div>
                </a>
                @endforeach
                <a class="dropdown-item text-center small text-gray-500" href="/notifications">Show All Alerts</a>
              </div>
            </li>
            @endif
      </ul>
    </div>

    @endif

  </div>
</nav>
  </header>
</section>
<div class="container">
  <div class="row">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
</div>


@if (Session::get('locale')=="ar")
 <section dir="rtl" id="content">
<style type="text/css">
  
  label
  {
    float: right;
  }
</style>
  @yield('content')
</section>
@else
 <section dir="ltr" id="content">

  @yield('content')
</section>
@endif


                          @if(session()->has('success'))
                          <div class="container">
                            
                          
    <div class="alert alert-success">


                  @if (Session::get('locale')=="en")
                <h6 class="text-left">{{ session()->get('success') }}</h6>
                @else
                  <h6 class="text-right">{{ session()->get('success') }}</h6>
                  @endif
        
    </div>
    </div>
@endif

</body>

<footer class="page-footer font-small blue pt-4" style="background-color:#3544ab;color:white">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        @if (Session::get('locale')=="ar")
        <div dir="rtl" class="col-md-12 col-lg-3 mt-md-0 mt-3" style="margin-left:5%;direction:rtl!important;text-align: -webkit-auto;">
          @else
          <div class="col-md-12 col-lg-3 mt-md-0 mt-3" style="margin-left:5%">
          @endif


          <!-- Content -->
          <div class="row" style="margin-bottom:5%">
          <h5 class="text-uppercase">@lang('About us')</h5>
          </div>

      {{--     <div class="row" style="margin-bottom:5%">
            <img src="{{ asset('main_site/img/Logo.png') }}" class="rounded-circle img-responsive" style="width:60px;height:60px">
          </div> --}}

          <div class="row" style="margin-bottom:5%">
                      <p>@lang('Khouri Insurance Brokerage Office is specialized in insurance studies and consultations. We seek through our consultations and studies to ensure that customers receive the best insurance services in addition to the follow-up to any inquiries required by individuals and groups in all insurance fields')
</p>
          </div>
        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        @if (Session::get('locale')=="ar")
        <div dir="rtl" class="col-md-12 col-lg-3 mb-md-0 mb-3" style="margin-left:5%;direction:rtl!important;text-align: -webkit-auto;">
          @else
          <div class="col-md-12 col-lg-3 mb-md-0 mb-3" style="margin-left:5%">
          @endif

            <!-- Links -->
             @if (Session::get('locale')=="ar")
            <h5 style="text-align: -webkit-auto;" class="text-uppercase">@lang('Links')</h5>
            @else
            <h5 class="text-uppercase">@lang('Links')</h5>
            @endif


            <ul class="list-unstyled">
              <li>
                <a href="/" style="color: white;display:flex;margin-bottom:3%;font-weight:bold;">@lang('Home')</a>
              </li>
              <li>
                <a href="/services" style="color: white;display:flex;margin-bottom:3%;font-weight:bold;">@lang('Services')</a>
              </li>
              <li>
                <a href="/products" style="color: white;display:flex;margin-bottom:3%;font-weight:bold;">@lang('Buy Insurance')</a>
              </li>
              <li>
                <a href="/galleries" style="color: white;display:flex;margin-bottom:3%;font-weight:bold;">@lang('Galleries')</a>
              </li>

               <li>
                <a href="/news" style="color: white;display:flex;margin-bottom:3%;font-weight:bold;">@lang('News')</a>
              </li>
              <li>
                <a href="/aboutus" style="color: white;display:flex;margin-bottom:3%;font-weight:bold;">@lang('About us')</a>
              </li>

              <li>
                <a href="contact" style="color: white;display:flex;margin-bottom:3%;font-weight:bold;">@lang('Contact us')</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
           @if (Session::get('locale')=="ar")
          <div dir="rtl" class="col-md-12 col-lg-3 mb-md-0 mb-3" style="margin-left:5%;direction:rtl!important;text-align: -webkit-auto;">
            @else
            <div class="col-md-12 col-lg-3 mb-md-0 mb-3" style="margin-left:5%">
            @endif

            <!-- Links -->
            <div class="row">
                  <h5 class="text-uppercase">@lang('Contact us')</h5>
            </div>


            <div class="row">
           <div class="mapouter"><div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.987055473199!2d36.31597801520131!3d33.52772218075193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDMxJzM5LjgiTiAzNsKwMTknMDUuNCJF!5e0!3m2!1sen!2sus!4v1559850822811!5m2!1sen!2sus" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe><a href="https://www.emojilib.com">emojilib.com</a></div><style>.mapouter{position:relative;text-align:right;height:200px;width:250px;}.gmap_canvas {overflow:hidden;background:none!important;height:200px;width:250px;}</style></div>

          </div>

          <div class="row">
                                              <a style="color: white" id="email" href="mailto:info@khouryinsurance.com">info@khouryinsurance.com


</a>
          </div>

          <div class="row">
             @if (Session::get('locale')=="ar")
            <p style="direction: ltr;" id="phone">
              +963-969-876-543
            </p>
            @else
            <p id="phone">
              +963-969-876-543
            </p>
            @endif
          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->

    <!-- Copyright -->

  </footer>

     <div style="background-color:#3544ab" class="footer">
      <div class="container">


      <div class="row" style="margin-left:4%">
        <div class="col-lg-4 col-md-12 col-sm-12">
<i style="color:white;font-size:20px;margin-left:-5%;margin-right:2%" class="fab fa-facebook-square"></i>
<i style="color:white;font-size:20px;" class="fab fa-twitter"></i>
        </div>
      <div class="col-lg-4 col-md-12 col-sm-12" style="color: white">@lang('All Rights Reserved To KIB ©2019')
  </div>
      </div>
      </div>
    </div>
<script type="text/javascript" src="{{ asset('main_site/js/contact.js')}}">
</script>




<script type="text/javascript" src="{{ asset('main_site/js/serviceWorker.min.js')}}">
</script>



<script type="text/javascript" src="{{ asset('main_site/js/push.js')}}">
</script>
<script type="text/javascript" src="{{ asset('main_site/js/push.min.js')}}">
</script>





{{-- 
  <script type="text/javascript">
    
function notification_send() {
  console.log('begin sending');
  //setTimeout(notification_send, 5000);
      $.ajax({
     type: "GET",
     url: '/api/notification/pending',
    //data: "check",
     success: function(response){
      var notifications=response.data;
      console.log('the length of notifications is'+notifications.length);
      for (var i = 0; i < notifications.length; i++) {

            Push.Permission.GRANTED;
          Push.create(notifications[i].title, {
    body: notifications[i].body,
    icon: 'http://khouryinsurance.com/main_site/img/Logo.png',
    timeout: 4000,
    onClick: function () {
        window.focus();
        this.close();
    }
});;
deactivate_not(notifications[i].id);
      }
     }
});
}

function deactivate_not(id) {
        $.ajax({
     type: "GET",
     url: '/api/notification/deactive/'+id,
   //  data: "check",
     success: function(response){
     
     }
});
}

  </script> --}}

<script type="text/javascript">
    $(document).ready(function(){
      social();

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');

        if(value == "all")
        {
            $('.filter').show('1000');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');

        }
    });

    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");



 // if (!("Notification" in window)) {
 //    console.log("This browser does not support desktop notification");
 //  }

 //  // Let's check whether notification permissions have alredy been granted
 //  else if (Notification.permission === "granted") {
 //    // If it's okay let's create a notification
 //    var notification = new Notification("Hi there!");
 //  }

 //  // Otherwise, we need to ask the user for permission
 //  else if (Notification.permission !== 'denied' || Notification.permission === "default") {
 //    Notification.requestPermission(function (permission) {
 //      // If the user accepts, let's create a notification
 //      if (permission === "granted") {
 //        var notification = new Notification("Hi there!");
 //      }
 //    });
 //  }



});

    function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
</script>
<!-- Latest compiled JavaScript -->

<script src="{{ asset('main_site/js/JiSlider.js') }}"></script>
  <script>


    $(window).on('load', function () {
      $('#JiSlider').JiSlider({
        color: '#fff',
        start: 1,
        time:3000,
        auto:true,
        stay:10000,
        reverse: true
      }).addClass('ff')
    })
  </script>

    <script>
    $(document).ready(function () {

      // window.setInterval(notification_send, 3000);

      //               var href = window.location.href;
      //               $('nav a').each(function ($this, i) {
      //                   console.log(href.indexOf($(this).attr('href')))
      //                   if (href.indexOf($(this).attr('href')) >5) {
      //                       $(this).addClass('active');
      //                   } else {
      //                       $(this).removeClass('active');
      //                   }
      //               });



  




    $("#owl").owlCarousel({
                items: 5,
                responsiveClass: true,
                rtl: true,
                mouseDrag: true,
                touchDrag: true,
                loop:false,
                autoplay:true,
                autoplayTimeout:2000,

            });

    });
  </script>
  <script>
    $(window).scroll(function () {
      if ($(document).scrollTop() > 50) {
        $('nav').addClass('shrink');
      } else {
        $('nav').removeClass('shrink');
      }
    });
  </script>

<script>


  // [START get_messaging_object]
  // Retrieve Firebase Messaging object.
  // const messaging = firebase.messaging();
  // [END get_messaging_object]
  // [START set_public_vapid_key]
  // Add the public key generated from the console here.
  messaging.usePublicVapidKey('BHyQi0an9kzNRpK1kTr6mgLpSVPHysfOTTU167ipDjURFfS7oM7_YAT5ZnPcZVeWcRPDO8HAw9B6YV74dKhfOuw');
  // [END set_public_vapid_key]
  // IDs of divs that display Instance ID token UI or request permission UI.
  requestPermission();
  const tokenDivId = 'token_div';
  const permissionDivId = 'permission_div';
  // [START refresh_token]
  // Callback fired if Instance ID token is updated.
  messaging.onTokenRefresh(() => {
    messaging.getToken().then((refreshedToken) => {
      console.log('Token refreshed.');
      // Indicate that the new Instance ID token has not yet been sent to the
      // app server.
      setTokenSentToServer(false);
      // Send Instance ID token to app server.
      sendTokenToServer(refreshedToken);
      // [START_EXCLUDE]
      // Display new Instance ID token and clear UI of all previous messages.
      resetUI();
      // [END_EXCLUDE]
    }).catch((err) => {
      console.log('Unable to retrieve refreshed token ', err);
      showToken('Unable to retrieve refreshed token ', err);
    });
  });
  // [END refresh_token]
  // [START receive_message]
  // Handle incoming messages. Called when:
  // - a message is received while the app has focus
  // - the user clicks on an app notification created by a service worker
  //   `messaging.setBackgroundMessageHandler` handler.
  messaging.onMessage((payload) => {
    console.log('Message received. ', payload);
    // [START_EXCLUDE]
    // Update the UI to include the received message.
    appendMessage("hello");
    // [END_EXCLUDE]
  });
  // [END receive_message]
  function resetUI() {
    clearMessages();
    showToken('loading...');
    // [START get_token]
    // Get Instance ID token. Initially this makes a network call, once retrieved
    // subsequent calls to getToken will return from cache.
    messaging.getToken().then((currentToken) => {
      if (currentToken) {
        sendTokenToServer(currentToken);
        updateUIForPushEnabled(currentToken);
        subscribeTokenToTopic(currentToken,"allUsers");
      } else {
        // Show permission request.
        console.log('No Instance ID token available. Request permission to generate one.');
        // Show permission UI.
        updateUIForPushPermissionRequired();
        setTokenSentToServer(false);
      }
    }).catch((err) => {
      console.log('An error occurred while retrieving token. ', err);
      showToken('Error retrieving Instance ID token. ', err);
      setTokenSentToServer(false);
    });
    // [END get_token]

  }
  function showToken(currentToken) {
    // Show token in console and UI.
    // var tokenElement = document.querySelector('#token');
    // tokenElement.textContent = currentToken;
  }
  // Send the Instance ID token your application server, so that it can:
  // - send messages back to this app
  // - subscribe/unsubscribe the token from topics
  function sendTokenToServer(currentToken) {
    if (!isTokenSentToServer()) {
      console.log('Sending token to server...');
      // TODO(developer): Send the current token to your server.
      setTokenSentToServer(true);
    } else {
      console.log('Token already sent to server so won\'t send it again ' +
          'unless it changes');
    }
  }
  function isTokenSentToServer() {
    return window.localStorage.getItem('sentToServer') === '1';
  }
  function setTokenSentToServer(sent) {
    window.localStorage.setItem('sentToServer', sent ? '1' : '0');
  }
  function showHideDiv(divId, show) {
    // const div = document.querySelector('#' + divId);
    // if (show) {
    //   div.style = 'display: visible';
    // } else {
    //   div.style = 'display: none';
    // }
  }
  function requestPermission() {
    console.log('Requesting permission...');
    // [START request_permission]
    Notification.requestPermission().then((permission) => {
      if (permission === 'granted') {
        console.log('Notification permission granted.');
        // TODO(developer): Retrieve an Instance ID token for use with FCM.
        // [START_EXCLUDE]
        // In many cases once an app has been granted notification permission,
        // it should update its UI reflecting this.
        resetUI();
        // [END_EXCLUDE]
      } else {
        console.log('Unable to get permission to notify.');
      }
    });
    // [END request_permission]
  }
  function deleteToken() {
    // Delete Instance ID token.
    // [START delete_token]
    messaging.getToken().then((currentToken) => {
      messaging.deleteToken(currentToken).then(() => {
        console.log('Token deleted.');
        setTokenSentToServer(false);
        // [START_EXCLUDE]
        // Once token is deleted update UI.
        resetUI();
        // [END_EXCLUDE]
      }).catch((err) => {
        console.log('Unable to delete token. ', err);
      });
      // [END delete_token]
    }).catch((err) => {
      console.log('Error retrieving Instance ID token. ', err);
      showToken('Error retrieving Instance ID token. ', err);
    });
  }
  // Add a message to the messages element.
  function appendMessage(payload) {
    // const messagesElement = document.querySelector('#messages');
    // const dataHeaderELement = document.createElement('h5');
    // const dataElement = document.createElement('pre');
    // dataElement.style = 'overflow-x:hidden;';
    // dataHeaderELement.textContent = 'Received message:';
    // dataElement.textContent = JSON.stringify(payload, null, 2);
    // messagesElement.appendChild(dataHeaderELement);
    // messagesElement.appendChild(dataElement);
  }
  // Clear the messages element of all children.
  function clearMessages() {
    // const messagesElement = document.querySelector('#messages');
    // while (messagesElement.hasChildNodes()) {
    //   messagesElement.removeChild(messagesElement.lastChild);
    // }
  }
  function updateUIForPushEnabled(currentToken) {
    showHideDiv(tokenDivId, true);
    showHideDiv(permissionDivId, false);
    showToken(currentToken);
  }
  function updateUIForPushPermissionRequired() {
    showHideDiv(tokenDivId, false);
    showHideDiv(permissionDivId, true);
  }
  resetUI();


  function subscribeTokenToTopic(token, topic) {
  fetch('https://iid.googleapis.com/iid/v1/'+token+'/rel/topics/'+topic, {
    method: 'POST',
    headers: new Headers({
      'Authorization': 'key=AIzaSyBE17OESDR3s5CcEVa6YxU96qLAirkn0Uw'
    })
  }).then(response => {
    if (response.status < 200 || response.status >= 400) {
      throw 'Error subscribing to topic: '+response.status + ' - ' + response.text();
    }
    console.log('Subscribed to "'+topic+'"');
  }).catch(error => {
    console.error(error);
  })
}
</script>

@if (Auth::check())
<script type="text/javascript">
  function get_notifications() {
    var user_id={{Auth::user()->id}};
    console.log(user_id);
      $.ajax({
     type: "GET",
     url: '/api/users/notifications/'+user_id,
     data: "check",
     success: function(response){
      var notifications=response.data;
      if (notifications!=null) {
        // statement
      
      for (var i = 0; i < notifications.length; i++) {
        Push.create(notifications[i].title, {
    body: notifications[i].body,
    icon: 'https://khouryinsurance.com/main_site/img/Logo.png',
    timeout: 4000,
    link:'https://khouryinsurance.com/user/notifications/'+user_id,
    onClick: function () {
        window.focus();
        this.close();
    }
});
              $.ajax({
     type: "GET",
     url: '/api/notification/delivered/'+notifications[i].notification.id,
     data: "check",
     success: function(response){
      console.log('done making notification seen');
     }
});
      }
      }
     }
});
}

  $(document).ready(function(){
  setTimeout(get_notifications, 100);
});

</script>
@endif


</html>
