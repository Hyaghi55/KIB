<!DOCTYPE html>

<html>
<head>
  <title>Welcome To KIB</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css">





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
</head>
<body>
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
   <div class="container-fluid">
     @if (Session::get('locale')=="en")
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
   
    <div class="collapse navbar-collapse col-11" id="navbarResponsive">
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
     <div dir="rtl" class="collapse navbar-collapse col-11" id="navbarResponsive">
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
    <div class="alert alert-success">


                  @if (Session::get('locale')=="en")
                <h6 class="text-left">{{ session()->get('success') }}</h6>
                @else
                  <h6 class="text-right">{{ session()->get('success') }}</h6>
                  @endif
        
    </div>
@endif

</body>

<footer class="page-footer font-small blue pt-4" style="background-color:#3544ab;color:white">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-12 col-lg-3 mt-md-0 mt-3" style="margin-left:5%">

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
        <div class="col-md-12 col-lg-3 mb-md-0 mb-3" style="margin-left:5%">

            <!-- Links -->
            <h5 class="text-uppercase">@lang('Links')</h5>


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
          <div class="col-md-12 col-lg-3 mb-md-0 mb-3" style="margin-left:5%">

            <!-- Links -->
            <div class="row">
                  <h5 class="text-uppercase">@lang('Contact us')</h5>
            </div>


            <div class="row">
           <div class="mapouter"><div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.99394132202!2d36.313586414586744!3d33.52754315264602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1518e6e5c377c23d%3A0x72e8071356c2e5c2!2sIbn+Al+Haytham+Park!5e0!3m2!1sen!2sid!4v1559386770886!5m2!1sen!2sid" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe><a href="https://www.emojilib.com">emojilib.com</a></div><style>.mapouter{position:relative;text-align:right;height:200px;width:250px;}.gmap_canvas {overflow:hidden;background:none!important;height:200px;width:250px;}</style></div>

          </div>

          <div class="row">
            <p id="email">
              email@gmail.com
            </p>
          </div>

          <div class="row">
            <p id="phone">
              +96300000000
            </p>
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
        start: 2,
        reverse: true
      }).addClass('ff')
    })
  </script>

    <script>
    $(document).ready(function () {

                    var href = window.location.href;
                    $('nav a').each(function ($this, i) {
                        console.log(href.indexOf($(this).attr('href')))
                        if (href.indexOf($(this).attr('href')) >5) {
                            $(this).addClass('active');
                        } else {
                            $(this).removeClass('active');
                        }
                    });



  




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
</html>
