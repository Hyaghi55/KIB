@extends('layouts.main_layout')

@section('content')
<div class="container" style="margin-bottom: 5%">
	<div class="row">
	<div class="col-6">
		@foreach ($service->media as $img)
		@if ($img->media_type!='quotation')
		<img src="{{env('image_storage')}}/{{$img->url}}" class="img-responsive" style="margin-bottom:5%;height:100%;width:100%">
		@endif
		
		@endforeach
	</div>
	<div class="col-6">
		<p style="font-size: 15pt;">{{$service->getDescription()}}</p>
	</div>
	</div>
	<div class="row">
		<div class="col-6">
			<p style="font-size:18pt;font-weight:bold;text-align: center;">{{$service->getTitle()}}</p>
		</div>
	</div>
	<div class="row">

		 @if (Session::get('locale')=="en")
  <div class="col-lg-3 offset-lg-9">
  	<a href="/application/service/create" class="btn btn-info" style="background-color:#3544ab;color:white;border-color:#3544ab">
  		Get A Quotation
  	</a>
  </div>

@else
    <div style="margin-right:-12%" class="col-lg-12">
  	<a href="/application/service/create" class="btn btn-info" style="background-color:#3544ab;color:white;border-color:#3544ab">
  		التقديم على طلب
  	</a>
  </div>
  @endif
	</div>
</div>
@endsection