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
                            <img class="xzoom zoom_main" id="xzoom-default" src="{{asset('/uploads/offices/'.$list->photo)}}" xoriginal="{{asset('/uploads/offices/'.$list->photo)}}" />
                            @endif <div class="xzoom-thumbs" style="display:flex; margin-top:10px;">

                                @if($list->photo == null)
                                @else
                                <a href="{{asset('/uploads/offices/'.$list->photo)}}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{asset('/uploads/offices/'.$list->photo)}}">
                                </a>
                                @endif

                                @if($list->photo1 == null)
                                @else
                                <a href="{{asset('/uploads/offices/'.$list->photo1) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{asset('/uploads/offices/'.$list->photo1)}}" xpreview="{{ asset('/uploads/offices/'.$list->photo1)}}">
                                </a>
                                @endif

                                @if($list->photo2 == null)
                                @else
                                <a href="{{ asset('/uploads/offices/'.$list->photo2) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/offices/'.$list->photo2) }}">
                                </a>
                                @endif

                                @if($list->photo3 == null)
                                @else
                                <a href="{{ asset('/uploads/offices/'.$list->photo3) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/offices/'.$list->photo3) }}">
                                </a>
                                @endif

                                @if($list->photo4 == null)
                                @else
                                <a href="{{ asset('/uploads/offices/'.$list->photo4) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/offices/'.$list->photo4) }}">
                                </a>
                                @endif

                                @if($list->photo5 == null)
                                @else
                                <a href="{{ asset('/uploads/offices/'.$list->photo5) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/offices/'.$list->photo5) }}">
                                </a>
                                @endif

                                @if($list->photo6 == null)
                                @else
                                <a href="{{ asset('/uploads/offices/'.$list->photo6) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/offices/'.$list->photo6) }}">
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
                    <span> <strong>Floor Size : </strong>{{$list->floor_size}}</span>
                </div>
                <div class=" ">
                    <span> <strong>Floor Level : </strong>{{$list->floor_level}}</span>
                </div>
                <div class=" ">
                    <span> <strong>Decor : </strong>{{$list->interior_condition}}</span>
                </div>
                <div class=" ">
                    <span> <strong>Road Width : </strong>{{$list->road_width}}</span>
                </div>
                <div class=" ">
                    <span> <strong>Available From:</strong> {{$list->date}}</span>
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
                @if($list->electricity == null)
                <div class="d-none">
                    <i class="fas fa-tools">
                    </i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-bolt"></i>
                    </i>
                    <h6>Electricity</h6>

                </div>
                @endif
                @if($list->gas == null)
                <div class="d-none">
                    <i class="fas fa-tools">
                    </i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fa-solid fa-fire"></i>
                    <h6>Gas</h6>

                </div>
                @endif
                @if($list->water == null)
                <div class="d-none">
                    <i class="fas fa-tools">
                    </i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-water">
                    </i>
                    <h6>Water</h6>

                </div>
                @endif
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
                @if($list->fire_safety == null)
                <div class="d-none">
                    <i class="fas fa-chair"></i>
                    <h6>Not available</h6>
                </div>
                @else
                <div class="m-2">
                    <i class="fas fa-door-open"></i>
                    <h6>Fire Exit</h6>
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
