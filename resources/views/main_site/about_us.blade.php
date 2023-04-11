@extends('layouts.main_layout')

@section('content')
    <!--/banner-bottom-w3ls-->
    <section class="banner-bottom-w3ls py-md-5 py-4" id="about">
        <div class="container">
            <div class="inner-sec-wthreelayouts py-md-5 py-4">
                <div class="row">
                    
                    <div class="col-lg-6 about-right">
                      {!!$page->getDescription()!!}

                        <!--/about-in-->
                 {{--        <div class="row">
                            <div class="col-lg-6 about-in text-left">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fas fa-anchor"></i>
                                        <h5 class="card-title"> Branch 1</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur elit
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 about-in text-left">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="far fa-map"></i>
                                        <h5 class="card-title"> Branch 2</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur elit
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div> --}}
                        <!--/about-in-->

                    </div>
                    <div class="col-lg-6 about-img">
                        <img src="{{env('image_storage')}}/{{$page->image}}" alt="" class="img-fluid">
                    </div>
                </div>
                <!--/services-grids-->
            {{--     <div class="service-mid-sec mt-lg-5 mt-4">
                    <div class="middle-serve-content py-md-5 py-4">
                        <div class="row middle-grids">
                            <div class="col-lg-4 about-in middle-grid-info text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="far fa-lightbulb"></i>
                                        <h5 class="card-title">What we do</h5>
                                        <p class="card-text">
                                            <ol>
                                                <li>
                                                  Studying the insurance needs of the customer and providing appropriate studies  
                                                </li>
                                                <li>Preparation of the basic requirements and models of the required insurance offers</li>
<li>Studying the insurance  offers  and correspondence companies in order to improve it  to reach to the best level of safety and assurance </li>
<li>Completion of the procedures related to issuance the insurance policies</li>
<li>Daily follow-up of insurance services with all related  parties to guaranteed the best  insurance services</li>
<li>Follow up all claims procedures  from the first moment of the accident</li>
<li>Providing the clients with all analyses reports</li>
<li>Providing the client with the reports and analyzes he needs according to the best international standards</li>
We make your insurance easy

                                            </ol>
                                               


                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 about-in middle-grid-info text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fas fa-signal"></i>
                                        <h5 class="card-title"> Our Strategy</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 about-in middle-grid-info text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="far fa-clone"></i>
                                        <h5 class="card-title"> Our Projects</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!--//services-grids-->
                <!--/progress-->
           
                <!--//progress-->
            </div>
        </div>
    </section>
    <!--//banner-bottom-w3ls-->
@endsection