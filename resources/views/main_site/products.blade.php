@extends('layouts.main_layout')

@section('content')
	<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12" id="main" style="background-color:#d6d6d6;">
      <div class="container">
        <div class="row">
          <div class="container-fluid">
            <div class="row" style="margin-top: 2%;margin-bottom: 2%;">
              @foreach ($products as $product)  	
                <div class="card small_font" id="service">
                 <img class="card-img-top img-fluid" src="{{env('image_storage')}}/{{$product->proudct_cover()}}" alt="Card image">
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
              <div class="card small_font" id="service">
                 
                 <div class="card-body">
                  <h4>@lang('more_soon')</h4>
                 </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection