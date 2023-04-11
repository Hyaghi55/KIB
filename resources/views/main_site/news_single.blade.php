@extends('layouts.main_layout')

@section('content')
<div class="container">

        @if(Session::get('locale')=="en")
	 <div class="row">
	 		<div class="col-md-6">
                     <h1>{{$news->getTitle()}}</h1>
                     @foreach ($news->media as $media1)
                     <img style="width:600px;height:400px" src="{{env('image_storage')}}/{{$media1->url}}" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail">
 @endforeach


                     </div>
                     <div class="col-md-6">
                     <article style="margin-top: 10%;"><p>
                         {!!$news->getBody()!!}
                         </p></article>
                     </div>
                 </div>
                 </div>

                 @else

                  <div dir="rtl" class="row">
            <div class="col-md-6">
                     <h1 class="text-right">{{$news->getTitle()}}</h1>
                     <img style="width:600px;height:400px" src="{{env('image_storage')}}/{{$news->media[0]->url}}" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail">
                     </div>
                     <div class="col-md-6">
                     <article class="text-right" style="margin-top: 10%;"><p>
                         {!!$news->getBody()!!}
                         </p></article>
                     </div>
                 </div>
                 @endif
@endsection
