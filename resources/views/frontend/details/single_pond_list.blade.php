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
                            <img class="xzoom zoom_main" id="xzoom-default" src="{{asset('/uploads/ponds/'.$list->photo)}}" xoriginal="{{asset('/uploads/ponds/'.$list->photo)}}" />
                            @endif <div class="xzoom-thumbs" style="display:flex; margin-top:10px;">

                                @if($list->photo == null)
                                @else
                                <a href="{{asset('/uploads/ponds/'.$list->photo)}}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{asset('/uploads/ponds/'.$list->photo)}}">
                                </a>
                                @endif

                                @if($list->photo1 == null)
                                @else
                                <a href="{{asset('/uploads/ponds/'.$list->photo1) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{asset('/uploads/ponds/'.$list->photo1)}}" xpreview="{{ asset('/uploads/ponds/'.$list->photo1)}}">
                                </a>
                                @endif

                                @if($list->photo2 == null)
                                @else
                                <a href="{{ asset('/uploads/ponds/'.$list->photo2) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/ponds/'.$list->photo2) }}">
                                </a>
                                @endif

                                @if($list->photo3 == null)
                                @else
                                <a href="{{ asset('/uploads/ponds/'.$list->photo3) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/ponds/'.$list->photo3) }}">
                                </a>
                                @endif

                                @if($list->photo4 == null)
                                @else
                                <a href="{{ asset('/uploads/ponds/'.$list->photo4) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/ponds/'.$list->photo4) }}">
                                </a>
                                @endif

                                @if($list->photo5 == null)
                                @else
                                <a href="{{ asset('/uploads/ponds/'.$list->photo5) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/ponds/'.$list->photo5) }}">
                                </a>
                                @endif

                                @if($list->photo6 == null)
                                @else
                                <a href="{{ asset('/uploads/ponds/'.$list->photo6) }}">
                                    <img class="xzoom-gallery thumb" width="50" src="{{ asset('/uploads/ponds/'.$list->photo6) }}">
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
                </span>
                <div class=" ">
                    <span> <strong>Post For : </strong>{{$list->post_type}}</span>
                </div>
                <div class=" ">
                    <span> <strong>Pond area : </strong>{{$list->pond_area}}</span>
                </div>
                <div class=" ">
                    <span> <strong>Pond Water Level : </strong>{{$list->water_level}}</span>
                </div>
                <div class=" ">
                    <span> <strong>Road Width : </strong>{{$list->road_width}}</span>
                </div>
                <div class=" ">
                    <span> <strong>Available From:</strong> {{$list->date}}</span>
                </div>
                @if($list->price == null)
                @else
                <div class=" ">
                    <span> <strong>Price :</strong> {{$list->price}} / Month</span>
                </div>
                @endif
                @if($list->y_price == null)
                @else
                <div class=" ">
                    <span> <strong>Price :</strong> {{$list->y_price}}/ Year</span>
                </div>
                @endif

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
        </div>
    </div>
</div>
@endsection
