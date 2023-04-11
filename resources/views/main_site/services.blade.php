@extends('layouts.main_layout')

@section('content')
	<div class="row">
    <div class="bg-light border-right col-2 d-none d-lg-block " id="sidebar-wrapper">
      <div class="sidebar-heading">
        <h5 class="medium_font">@lang('Choose what Type of Service you want:')</h5>
      </div>
      <div class="list-group list-group-flush">
      	@foreach ($services as $service)
        <a href="/service/{{$service->id}}/show" class="list-group-item list-group-item-action bg-light">{{$service->etTitle()}}}</a>
        @endforeach
      </div>
    </div>


<div class="bg-light border-right col-2 d-block d-lg-none" id="sidebar-wrapper">
  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:#3544ab;color:white;border-color: #3544ab;">@lang('Choose what Type of Service you want:')
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
  	@foreach ($services as $service)
    <li style="background-color:#3544ab;"><a style="color: white;" href="/service/{{$service->id}}/show">{{$service->etTitle()}}}</a></li>
    @endforeach
  </ul>
  </div>
</div>

<div class="col-lg-10 col-md-12 col-sm-12" id="main" style="background-color:#d6d6d6;">
  <div class="container">
    <div class="row">
      <div class="container-fluid">
      <div class="row" style="margin-top: 2%;margin-bottom: 2%;">
    	 @foreach ($services[0]->sons as $service)
        		{{-- expr --}}
       <div class="card small_font" id="service">
        <img class="card-img-top" src="{{env('image_storage')}}/{{$service->media[0]->url}}" alt="Card image">
        <div class="card-body">
        <h5 class="card-title">{{$service->getTitle()}}</h5>

         @if ($service->parent_id==0)
          <a href="/service/{{$service->id}}/show" id="service_button" href="#" class="btn btn-primary">@lang('More ...')</a>
         @else
          <a href="/service/{{$service->id}}" id="service_button" href="#" class="btn btn-primary">@lang('More ...')</a>
         @endif
        </div>
      </div>
@endforeach
        </div>
      </div>

        </div>


        </div>
</div>
    </div>

    <section id="clients">
<div class="container">
  <div class="row">
    <div id="owl" class=" col-lg-12 owl-carousel">
      @foreach ($partners as $partner)
      <div class="col-lg-10 client">
        <img style="width: 100px !important;height: 100px !important;border-radius: 50%;" src="{{env('image_storage')}}/{{$partner->image}}" class="img-responsive item">
      </div>
      @endforeach
    </div>
  </div>
 </div>

</section>

@endsection
