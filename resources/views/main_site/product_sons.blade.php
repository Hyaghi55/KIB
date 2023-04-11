@extends('layouts.main_layout')

@section('content')
	<div class="row">
    <div class="bg-light border-right col-2 d-none d-lg-block " id="sidebar-wrapper">
      <div class="sidebar-heading">
        <h5 class="medium_font">Choose what Type of product you want:</h5>
      </div>
      <div class="list-group list-group-flush">
      	     @foreach ($products as $product)
        @if ($product->id==$main_service->id)
            <a style="background-color: #3544ab!important;color: white;" href="/product/{{$product->id}}/show" class="list-group-item list-group-item-action bg-light">{{$product->getTitle()}}</a>
              @else
               <a style="color:#495057;" href="/product/{{$product->id}}/show" class="list-group-item list-group-item-action bg-light">{{$product->getTitle()}}</a>
        @endif

        @endforeach
      </div>
    </div>


<div class="bg-light border-right col-2 d-block d-lg-none" id="sidebar-wrapper">
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:#3544ab;color:white;border-color: #3544ab;">Choose what Type of product you want:
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    	@foreach ($products as $product)
      <li style="background-color:#3544ab;"><a style="color: white;" href="/product/{{$product->id}}">{{$product->en_title}}</a></li>
      @endforeach
    </ul>
  </div>
</div>

    <div class="col-lg-10 col-md-12 col-sm-12" id="main" style="background-color:#d6d6d6;">
      <div class="container">
        <div class="row">
        <div class="container-fluid">
                <div class="row">
                   @if(Session::get('locale')=="en")
       <h5 style="margin: 0 auto;" class="text-left">{{$main_service->getDescription()}}</h5>
       @else
       <h5 style="margin: 0 auto;" class="text-right">{{$main_service->getDescription()}}</h5>
       @endif
    </div>
        <div class="row" style="margin-top: 2%;margin-bottom: 2%;">
          @foreach ($main_service->sons as $product)
            {{-- expr --}}

<div class="card small_font" id="service">
  <img style="height:200px;" class="card-img-top img-fluid" src="{{env('image_storage')}}/{{$product->product_cover()}}" alt="Card image">
  <div class="card-body">
      <h5 class="card-title">{{$product->getTitle()}}</h5>
      <p class="card-text">{{ str_limit($product->getDescription(), $limit = 150, $end = '...') }}</p>
      @if ($product->parent_id==0)
     <a href="/product/{{$product->id}}/show" id="service_button" href="#" class="btn btn-primary">@lang('More ...')</a>
      @else
      <a href="/product/{{$product->id}}" id="service_button" href="#" class="btn btn-primary">@lang('More ...')</a>
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
    </div>

     <section id="clients">
<div class="container">
  <div class="row">
    <div id="owl" class=" col-lg-12 owl-carousel">
      @foreach ($main_service->partner as $partner)
      <div class="col-lg-10 client">
        <a target="blank" href="{{$partner->url}}"><img style="width: 100px !important;height: 100px !important;border-radius: 50%;" src="{{env('image_storage')}}/{{$partner->image}}" class="img-responsive item"></a>
        <h5 style="text-align: center;
    margin-left: 36%;
    margin-top: 4%;">{{$partner->title}}</h5>
      </div>
      @endforeach
    </div>
  </div>
 </div>

</section>



@endsection