@extends('layouts.main_layout')

@section('content')
	
@foreach ($news as $news1)
    {{-- expr --}}
    <div class="container">
    @if(Session::get('locale')=="en")
        {{-- expr --}}
    
	   <div  class="row" style="margin-top:3%; margin-bottom: 3%;">
                    <div class="col-3">
                        
                    
                     <img style="height: 300px;width:400px;" src="{{env('image_storage')}}/{{$news1->media[0]->url}}" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="width:50%;height:50%">
                     </div>
                     <div class="col-9">
                         
                     
                      <h1>{{$news1->getTitle()}}</h1>
                     <article><p>
                        {!! substr($news1->getBody(), 0, 500) !!}  
                         </p></article>
                     <div class="row">
                              <a style="float:right;" class="btn btn-blog pull-right marginBottom10" href="/news_single/{{$news1->id}}">READ MORE</a> 
                         </div>
                 </div>
           
                </div>
@else

       <div dir="rtl" class="row" style="margin-top:3%; margin-bottom: 3%;">
                    <div class="col-3">
                        
                    
                     <img style="height: 300px;width:400px;" src="{{env('image_storage')}}/{{$news1->media[0]->url}}" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="width:50%;height:50%">
                     </div>
                     <div class="col-9">
                         
                     
                      <h1 class="text-right">{{$news1->getTitle()}}</h1>
                     <article class="text-right"><p>
                             {!! substr($news1->getBody(), 0, 500) !!}  
                         </p></article>
                         <div class="row">
                              <a style="float:left;" class="btn btn-blog pull-right marginBottom10" href="/news_single/{{$news1->id}}">ٌقراءة المزيد</a> 
                         </div>
                
                 </div>
                     
                </div>


@endif
     </div>          
@endforeach                 
@endsection