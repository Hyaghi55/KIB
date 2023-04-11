<!DOCTYPE html>
<html>
<head>


  <title>Welcome To KIB</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('main_site/css/main.css') }}">

<link href="https://fonts.googleapis.com/css?family=Amiri&display=swap" rel="stylesheet">
  <link href="{{ asset('main_site/css/JiSlider.css') }}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ asset('main_site/css/round_icons.css')}}">
  <style type="text/css">
    .bg-light {
    background-color: rgba(0, 0, 0, 0) !important;
}

  </style>
</head>

   @if (Session::get('locale')=="ar")
<body style="height:100vh;font-family: 'Amiri', serif !important;">
  @else
  <body style="height:100vh;">
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
 <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
  <div class="row">
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

   @if (Session::get('locale')=="en")

  <div class="collapse navbar-collapse col-lg-9"  id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
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
     <div class="col-lg-1 offset-lg-2">
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

              <div dir="rtl" class="collapse navbar-collapse col-lg-9 offset-lg-2"  id="navbarNav">
     <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
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
<section id="content" style="height:100vh;">
  <div class="row">
  <div class="banner-silder">
    @if (Session::get('locale')=="en")
    <div style="width:100%;height:100%" id="JiSlider" class="jislider">
      <ul>




               <li>
          <div class="w3layouts-banner-top">


            <div class="bs-slider-overlay">
              <div class="container">
                <!-- Slide Text Layer -->
                <div class="w3l-slide-text col-lg-9">
                  <h3 style="color:#ffffff;font-size: 28px!important;    letter-spacing: 1px;" data-animation="animated zoomInRight">@lang('Have The Right Insurance')</h3>
                  <p style="font-size:18px;letter-spacing: 1px;" class="aos-init aos-animate" data-aos="fade-down">@lang('To Keep Your Family Safe')</p>
                 {{--  <a  href="services.html" target="_blank" class="button-style" data-animation="animated fadeInDown" data-aos="fade-down">@lang('Get A Qutation')</a> --}}
                </div>
              </div>
            </div>
          </div>
        </li>


         <li>

          <div class="w3layouts-banner-top w3layouts-banner-top2">


            <div class="bs-slider-overlay">
              <div class="container">
                <!-- Slide Text Layer -->
                <div class="w3l-slide-text col-lg-9">
                  <h3 style="    letter-spacing: 1px;" data-animation="animated zoomInRight">@lang('Why You Should Choose ')<span style="color:#202e9c;">@lang('KIB')</span></h3>
                  <p>
  <a style="font-size:18px;color:#ffffff;font-weight:bold;"   role="button" aria-expanded="false" aria-controls="collapseExample">
     <span class="right"></span>
    @lang("reason1")
  </a>
</p>
{{-- <div class="collapse" id="collapseExample1">
  <div class="card card-body" style="background-color: transparent;color: white;">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div>
 --}}

                <p>

  <a style="font-size:18px;color:#ffffff;font-weight:bold"   role="button" aria-expanded="false" aria-controls="collapseExample">
      <span class="right" ></span>
    @lang("reason2")
  </a>
</p>
{{-- <div class="collapse" id="collapseExample2">
  <div class="card card-body" style="background-color: transparent;color: white;">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div> --}}

                <p style="margin-bottom:100px">

  <a style="font-size:18px;color:#ffffff;font-weight:bold"  role="button" aria-expanded="false" aria-controls="collapseExample">
       <span class="right"></span>
    @lang("reason3")
  </a>
</p>
{{-- <div class="collapse" id="collapseExample3">
  <div class="card card-body" style="background-color: transparent;color: white;">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div> --}}
                </div>
              </div>
            </div>
          </div>
        </li>






          <li>

          <div class="w3layouts-banner-top w3layouts-banner-top1">


            <div class="bs-slider-overlay">
              <div class="container">
                <div class="row">
                <!-- Slide Text Layer -->
                <div class="w3l-slide-text col-lg-6">
                   <h3 style="color:#3544ab;" data-animation="animated zoomInRight">@lang('KIB')</h3>
                  <p class="aos-init aos-animate" data-aos="fade-down">@lang('We make your insurance easy')</p>
                  <a href="/services" class="button-style" data-animation="animated fadeInDown" data-aos="fade-down">@lang('View Our Services')</a>
                </div>
                  <div class="w3l-slide-text col-lg-6">
                        <div class='circle-container'>
           <a href='#' class="deg-center"><img style="width: 100px;height: 100px;" {{-- style="border-radius:50%!important"  --}} src="{{ asset('main_site/img/Logo.png') }}"></a>

      @foreach ($services as $key=> $service)
        {{-- expr --}}

      <a href='/service/{{$service->id}}/show' class='deg{{$key}}'><img {{-- style="border-radius:50%!important"  --}} src='{{env('image_storage')}}/{{$service->icon()}}'></a>
      @endforeach

    </div>
                </div>
                </div>

              </div>
            </div>
          </div>
        </li>

@foreach ($sliders as $key => $slider)

              <li>
          <div class="w3layouts-banner-top{{$key+4}}" style="background: url({{env('image_storage')}}/{{$slider->media[0]->url}}) no-repeat 0px 0px;background-size: cover;-webkit-background-size: cover;-moz-background-size:cover;-o-background-size: cover;-moz-background-size: cover;">
            <div class="bs-slider-overlay">
              <div class="container">
                <!-- Slide Text Layer -->
                <div class="w3l-slide-text col-lg-6">
                  <h3 style="color:##3544ab" data-animation="animated zoomInRight">{{$slider->getTitle()}}</h3>
                  <p class="aos-init aos-animate" data-aos="fade-down">{{$slider->getsubtitle()}}</p>
                </div>
              </div>
            </div>
          </div>
        </li> --}}
         @endforeach
      </ul>
    </div>


<!-- slider 2 -->

@else
   <div style="width:100%;height:100%" id="JiSlider" class="jislider">
      <ul>

@foreach ($sliders as $key => $slider)

              <li>
          <div class="w3layouts-banner-top{{$key+4}}" style="background: url({{env('image_storage')}}/{{$slider->media[0]->url}}) no-repeat 0px 0px;background-size: cover;-webkit-background-size: cover;-moz-background-size:cover;-o-background-size: cover;-moz-background-size: cover;">
            <div class="bs-slider-overlay">
              <div class="container">
                <!-- Slide Text Layer -->
                <div class="w3l-slide-text col-lg-6">
                  <h3 style="color:#3544ab" data-animation="animated zoomInRight">{{$slider->getTitle()}}</h3>
                  <p class="aos-init aos-animate" data-aos="fade-down">{{$slider->getsubtitle()}}</p>
                </div>
              </div>
            </div>
          </div>
        </li> --}}
         @endforeach
 <li>



            <div dir="rtl" style="text-align:right;" class="w3layouts-banner-top w3layouts-banner-top1">
            <div class="bs-slider-overlay">
              <div class="container">
                <div class="row">
                <!-- Slide Text Layer -->
                <div class="w3l-slide-text col-lg-6">
                   <h3 style="color:#3544ab;    letter-spacing: 1px;" data-animation="animated zoomInRight">@lang('KIB')</h3>
                  <p class="aos-init aos-animate" data-aos="fade-down">@lang('We make your insurance easy')</p>
                  <a href="/services" class="button-style" data-animation="animated fadeInDown" data-aos="fade-down">@lang('View Our Services')</a>
                </div>
                  <div class="w3l-slide-text col-lg-6">
                        <div class='circle-container'>
           <a href='#' class="deg-center"><img style="width: 100px;height: 100px;" {{-- style="border-radius:50%!important"  --}} src="{{ asset('main_site/img/Logo.png') }}"></a>

      @foreach ($services as $key=> $service)
        {{-- expr --}}

      <a href='/service/{{$service->id}}/show' class='deg{{$key}}'><img {{-- style="border-radius:50%!important"  --}} src='{{env('image_storage')}}/{{$service->icon()}}'></a>
      @endforeach

    </div>
                </div>
                </div>

              </div>
            </div>
          </div>
        </li>



         <li>




            <div dir="rtl" style="text-align: right;" class="w3layouts-banner-top w3layouts-banner-top2">
            <div class="bs-slider-overlay">
              <div class="container">
                <!-- Slide Text Layer -->
                <div class="w3l-slide-text col-lg-7">
                  <h3 style="    letter-spacing: 1px;" data-animation="animated zoomInRight">@lang('Why You Should Choose ')<span style="color:#202e9c">@lang('KIB')</span></h3>
                  <p>
  <a style="font-size:18px;color:#ffffff;font-weight:bold;    letter-spacing: 1px;" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
     <span class="right"></span>
    @lang("reason1")
  </a>
</p>
<div class="collapse" id="collapseExample1">
  <div class="card card-body" style="background-color: transparent;color: white;    letter-spacing: 1px;">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div>


                <p>

  <a style="font-size:18px;color:#ffffff;font-weight:bold;    letter-spacing: 1px;" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
      <span class="right" ></span>
    @lang("reason2")
  </a>
</p>
<div class="collapse" id="collapseExample2">
  <div class="card card-body" style="background-color: transparent;color: white;    letter-spacing: 1px;">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div>

                <p style="margin-bottom:100px">

  <a style="font-size:18px;color:#ffffff;font-weight:bold;    letter-spacing: 1px;" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
       <span class="right"></span>
    @lang("reason3")
  </a>
</p>
<div class="collapse" id="collapseExample3">
  <div class="card card-body" style="background-color: transparent;color: white;    letter-spacing: 1px;">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div>
                </div>
              </div>
            </div>
          </div>
        </li>











               <li>

            <div dir="rtl" style="text-align:right;" class="w3layouts-banner-top">

            <div class="bs-slider-overlay">
              <div class="container">
                <!-- Slide Text Layer -->
                <div class="w3l-slide-text col-lg-6">
                  <h3 style="color:#ffffff;font-size: 32px!important;    letter-spacing: 1px;" data-animation="animated zoomInRight">@lang('Have The Right Insurance')</h3>
                  <p style="font-size:18px;    letter-spacing: 1px;" class="aos-init aos-animate" data-aos="fade-down">@lang('To Keep Your Family Safe')</p>
                 {{--  <a  href="services.html" target="_blank" class="button-style" data-animation="animated fadeInDown" data-aos="fade-down">@lang('Get A Qutation')</a> --}}
                </div>
              </div>
            </div>
          </div>
        </li>


      </ul>
    </div>
@endif




  </div>
    </div>


</section>


</body>




<script type="text/javascript">
    $(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');

        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');

        }
    });

              var href = window.location.href;
                    $('nav a').each(function ($this, i) {
                        console.log(href.indexOf($(this).attr('href')))
                        if (href.indexOf($(this).attr('href')) >5) {
                            $(this).addClass('active');
                        } else {
                            $(this).removeClass('active');
                        }
                    });

    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

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

@if (Session::get('locale')=="en")
  <script>


    $(window).on('load', function () {
      $('#JiSlider').JiSlider({
        color: '#fff',
        start: 1,
        time:3000,
        auto:true,
        stay:10000,
        reverse: false
      }).addClass('ff')
    })
  </script>

@else
    <script>

    $(window).on('load', function () {
      $('#JiSlider').JiSlider({
        color: '#fff',
        start: 3,
        time:3000,
        auto:true,
        stay:10000,
        reverse: true
      }).addClass('ff')
    })
  </script>
@endif

    <script>
    $(document).ready(function () {
      $(".dropdown").hover(
        function () {
          $('.dropdown-menu', this).stop(true, true).slideDown("fast");
          $(this).toggleClass('open');
        },
        function () {
          $('.dropdown-menu', this).stop(true, true).slideUp("fast");
          $(this).toggleClass('open');
        }
      );
    });
  </script>
  <!-- //dropdown smooth -->
  <!-- fixed nav -->
  <script>
    $(window).scroll(function () {
      if ($(document).scrollTop() > 50) {
        $('nav').addClass('shrink');
      } else {
        $('nav').removeClass('shrink');
      }
    });
  </script>

<script type="text/javascript">
  $('.collapse').on('show.bs.collapse', function () {
    $('.collapse.in').each(function(){
        $(this).collapse('hide');
    });
  });
</script>
<style type="text/css">
      nav.navbar.navbar-expand-lg.navbar-light.bg-light.static-top {
    display: block;
    margin: 0px;
    position: fixed;
    width: 100%;
    z-index: 100;
    background: #00000000!important;
    border-radius: 0px;
    color: white;
}


.navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
        color: rgb(32, 46, 156);
        font-weight: bold;
}

.navbar-light .navbar-nav .nav-link {
    color: rgb(255, 255, 255);
}

</style>

  @if (Session::get('locale')=="ar")

  <style type="text/css">
    .right:after {
    content: '';
    display: inline-block;
    margin-top: 7px;
    /* margin-left: 0px; */
    margin: 7px!important;
    width: 1em;
    height: 1em;
    border-top: 0.2em solid #202e9c;
    border-right: 0.2em solid #202e9c;
    -moz-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
}
  </style>
@endif
</html>
