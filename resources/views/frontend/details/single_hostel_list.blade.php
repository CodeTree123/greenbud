@extends('frontend.master.post_master')

@section('content')

<div class="main-wrapperX container">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 product-divX ">
            <div class="container  ">
                <!-- default start -->
                <section id="default" class="padding-top0">
                    <div class="row">
                        <div class="xzoom-container">
                            @if($list->photo == null)
                            @else
                            <img class="xzoom zoom_main" id="xzoom-default" src="{{asset('/uploads/hostels/'.$list->photo)}}" xoriginal="{{asset('/uploads/hostels/'.$list->photo)}}" />
                            @endif <div class="xzoom-thumbs" style="display:flex; margin-top:10px;">

                                @if($list->photo == null)
                                @else
                                <a href="{{asset('/uploads/hostels/'.$list->photo)}}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{asset('/uploads/hostels/'.$list->photo)}}">
                                </a>
                                @endif

                                @if($list->photo1 == null)
                                @else
                                <a href="{{asset('/uploads/hostels/'.$list->photo1) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{asset('/uploads/hostels/'.$list->photo1)}}" xpreview="{{ asset('/uploads/hostels/'.$list->photo1)}}">
                                </a>
                                @endif

                                @if($list->photo2 == null)
                                @else
                                <a href="{{ asset('/uploads/hostels/'.$list->photo2) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/hostels/'.$list->photo2) }}">
                                </a>
                                @endif

                                @if($list->photo3 == null)
                                @else
                                <a href="{{ asset('/uploads/hostels/'.$list->photo3) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/hostels/'.$list->photo3) }}">
                                </a>
                                @endif

                                @if($list->photo4 == null)
                                @else
                                <a href="{{ asset('/uploads/hostels/'.$list->photo4) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/hostels/'.$list->photo4) }}">
                                </a>
                                @endif

                                @if($list->photo5 == null)
                                @else
                                <a href="{{ asset('/uploads/hostels/'.$list->photo5) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/hostels/'.$list->photo5) }}">
                                </a>
                                @endif

                                @if($list->photo6 == null)
                                @else
                                <a href="{{ asset('/uploads/hostels/'.$list->photo6) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/hostels/'.$list->photo6) }}">
                                </a>
                                @endif

                            </div>
                        </div>
                        <div class="large-7 column"></div>
                    </div>
                </section>
                <!-- default end -->
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 product-div-right">
            <div>
                <span class="product-name">
                    {{$list->title}}
                </span><br>
                <div class=" ">
                    <span> <strong>Post For : </strong>{{$list->post_type}}</span>
                </div>
                <div class=" ">
                    <span> <strong> Room Size : </strong>{{$list->room_size}}</span>
                </div>
                <div class=" ">
                    <span> <strong> Room Type : </strong>{{$list->room_type}}</span>
                </div>
                <div class=" ">
                    <span> <strong>From:</strong> {{$list->date}}</span>
                </div>
                <div class=" ">
                    <span> <strong>Price:</strong> {{$list->price}} / Month</span>
                </div>
                <div class=" ">
                    <span> <strong>Additional Charge:</strong> {{$list->s_charge}}</span>
                </div>

            </div>
            <br>

            <p class="product-description">
                <span class="fw-bold mb-2">Description:</span> {{$list->description}}
            </p>
            <p class="product-description">
                <span class="fw-bold mb-2">Video Link:</span> {{$list->video}}
            </p>
            <div class="btn-groups d-flex flex-lg-row flex-md-row flex-sm-column flex-column">
                <button type="button" class="btn btn-primary text-white rounded-pill  me-2 mt-2">
                    <i class="fas fa-shopping-cart"></i>
                    Add to My Shortlist
                </button>
                <button type="button" onclick="location.href='tel:{{$list->phone}}'" class="btn btn-dark rounded-pill text-white me-2 mt-sm-2 mt-2">
                    <i class="fas fa-phone"></i>
                    Call
                </button>
            </div>
            <h2 class="amenities">Amenities</h2>
            <div class="icon1 flex-wrap">
                @if($list->lift == null)
                <div class="d-none">
                    <i class="fas fa-elevator"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-elevator"></i>
                    <h6>Lift</h6>
                </div>
                @endif

                @if($list->hot_water == null)
                <div class="d-none">
                    <i class="fas fa-water"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fa-solid fa-bath"></i>
                    <h6>Geyser</h6>
                </div>
                @endif

                @if($list->generator == null)
                <div class="d-none">
                    <i class="fas fa-soap"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fa-solid fa-car-battery"></i>
                    <h6>Generator</h6>
                </div>
                @endif

                @if($list->laundry == null)
                <div class="d-none">
                    <i class="fas fa-soap"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-soap"></i>
                    <h6>Laundry</h6>
                </div>
                @endif

                @if($list->sports == null)
                <div class="d-none">
                    <i class="fas fa-tv"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-tv"></i>
                    <h6>Sports Facilities</h6>
                </div>
                @endif

                @if($list->ac == null)
                <div class="d-none">
                    <i class="fas fa-wind"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-wind"></i>
                    <h6>AC</h6>
                </div>
                @endif


                @if($list->wifi == null)
                <div class="d-none">
                    <i class="fas fa-wifi"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-wifi"></i>
                    <h6>Wifi</h6>
                </div>
                @endif

                @if($list->attached_toilet == null)
                <div class="d-none">
                    <i class="fas fa-toilet"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-toilet"></i>
                    <h6>Attached Toilet</h6>
                </div>
                @endif

                @if($list->gym == null)
                <div class="d-none">
                    <i class="fas fa-video"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-video"></i>
                    <h6>Gym</h6>
                </div>
                @endif
                @if($list->spa == null)
                <div class="d-none">
                    <i class="fas fa-video"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-video"></i>
                    <h6>Spa</h6>
                </div>
                @endif
                @if($list->pool == null)
                <div class="d-none">
                    <i class="fas fa-video"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-video"></i>
                    <h6>Swimming Pool</h6>
                </div>
                @endif
                @if($list->dining == null)
                <div class="d-none">
                    <i class="fas fa-video"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-video"></i>
                    <h6>Dining Facilities</h6>
                </div>
                @endif
                @if($list->furnished == null)
                <div class="d-none">
                    <i class="fas fa-chair"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-chair"></i>
                    <h6>Furnished</h6>
                </div>
                @endif

                @if($list->parking == null)
                <div class="d-none">
                    <i class="fas fa-parking"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-parking"></i>
                    <h6>Parking</h6>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
