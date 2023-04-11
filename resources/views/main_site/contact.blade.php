@extends('layouts.main_layout')
@section('content')
<section class="banner-bottom-w3ls pt-lg-5 pt-md-3 pt-3">
        <div class="inner-sec-wthreelayouts pt-md-5 pt-md-3 pt-3">
            <h2 class="tittle text-center mb-md-5 mb-4">@lang('Get In Touch')</h2>
            <div class="container">
                <div class="address row mb-5">
                    <div class="col-lg-4 address-grid-w3l">
                        <div class="row address-info">
                            <div class="col-md-3 address-left text-center">
                                <i class="far fa-map"></i>
                            </div>
                            <div class="col-md-9 address-right text-left">
                                <h6 class="ad-info text-uppercase mb-2">@lang('address')</h6>
                                <p id="address1"> @lang('address-det')

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 address-grid-w3l">
                        <div class="row address-info">
                            <div class="col-md-3 address-left text-center">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="col-md-9 address-right text-left">
                                <h6 class="ad-info text-uppercase mb-2">@lang('email')</h6>
                                {{-- <p id="email1"> --}}
                                    <a id="email1" href="mailto:info@khouryinsurance.com">info@khouryinsurance.com


</a>
                               {{--  </p> --}}
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 address-grid-w3l">
                        <div class="row address-info">
                            <div class="col-md-3 address-left text-center">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="col-md-9 address-right text-left">
                                <h6 class="ad-info text-uppercase mb-2">@lang('phone')</h6>
                                <p dir="ltr" id="phone1">+963-969-876-543</p>

                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 map">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.987055473199!2d36.31597801520131!3d33.52772218075193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDMxJzM5LjgiTiAzNsKwMTknMDUuNCJF!5e0!3m2!1sen!2sus!4v1559850822811!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div>
                    <div class="col-md-6 main_grid_contact">
                           @if (Session::get('locale')=="en")
                               <h4 class="mb-4 text-left">@lang('Send us a message')</h4><br>
                               @else
                               <h4 class="mb-4 text-right">@lang('Send us a message')</h4><br>
                            @endif
                        <div class="form">
                         
                            <form method="post" action="{{ route('contactus.store') }}">
                             {{--    <form method="post" action="#"> --}}
                                @csrf
                                <div class="form-group">
                                    <label class="my-2">@lang('Name')</label>
                                    <input class="form-control" type="text" name="name" placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <label>@lang('Email')</label>
                                    <input class="form-control" type="email" name="email" placeholder="" required="">
                                </div>
                        <div class="form-group">
  <label for="comment">@lang('Comment')</label>
  <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
</div>

                                          <div class="form-group">
    <label for="exampleInputEmail1">type</label>
    <select name="type" class="form-control">
      <option disabled>Select  type</option>
      <option value="enquiry">@lang('enquiry')</option>
      <option value="complaint">@lang('complaint')</option>

    </select>
    
  </div>


                                          <div class="form-group">
    <label for="exampleInputEmail1">Service</label>
    <select name="service_id" class="form-control">
      <option disabled>Select  service</option>
      @foreach ($services as $service)
         <option value="{{$service->getTitle()}}/ {{$service->type}}">{{$service->getTitle()}}/ @lang($service->type)</option>
      @endforeach
    </select>
    
  </div>

                                <div class="input-group1">
                                    <input class="form-control" type="submit" value="@lang('Submit')" style="background-color: #3544ab;
    color: white;">
                                </div>

              </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
{{-- <center>
    <h1>
        Under Construction
    </h1>
    </center> --}}
@endsection