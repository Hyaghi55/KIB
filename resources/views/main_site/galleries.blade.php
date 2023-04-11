@extends('layouts.main_layout')

@section('content')
    <section class="banner-bottom-w3ls bg-light py-md-5 py-4">
        <div class="container">
            <div class="inner-sec-wthreelayouts py-md-5 py-4">
                <h2 class="tittle text-center mb-lg-5 mb-3">
                    @lang('Galleries')</h2>
                <!--/services-grids-->
                <div class="service-mid-sec mt-lg-5 mt-4">
                      
                    <div class="middle-serve-content">
                      
                            {{-- expr --}}
                     
                        <div class="row middle-grids">
                            @foreach ($galleries as $gallery)
                            
                            <div class="col-lg-4 about-in middle-grid-info text-center">
                                <div class="card img">
                                    <a href="/gallery/{{$gallery->id}}">
                                    <div class="card-body img">
                                        <img src="{{env('image_storage')}}/{{$gallery->media[0]->url}}" alt="" class="img-fluid corner">
                                        <h5 style="color: #3544ab;" class="card-title">{{$gallery->getTitle()}}</h5>
                                    </div>
                                     </a>
                                </div>
                            </div>
                       
                              @endforeach
                        </div>
                      
                    </div>

                </div>
                <!--//services-grids-->
            </div>
        </div>
    </section>


@endsection