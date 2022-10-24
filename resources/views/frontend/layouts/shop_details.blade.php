@extends('frontend.master')
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}">



<!-- Breadcrumb Section Begin -->
<!-- <section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/breadcrumb.jpg ')}}"> -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shop Details</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="product__details__pic">
                    @foreach($products as $product)
                    <div class="slider-for d1 mx-5 px-5">
                        <div>
                            <img class="product__details__pic__item--large img-fluid" src="{{asset('/public/uploads/product/'.$product->m_image)}}" alt="">
                        </div>
                        @php
                        $images = $product->other_images;
                        $images = explode(',',$images);
                        @endphp
                        @foreach($images as $image)
                        <div>
                            <img class="product__details__pic__item--large img-fluid" src="{{asset('/public/uploads/product/'.$image)}}" alt="" >
                        </div>

                        @endforeach
                    </div>
                    <style>
                        .custom_slick .slick-slide {
                            margin: 0 20px;
                        }
                    </style>
                    <div class="slider-nav d2 mx-5 px-5 custom_slick my-4">
                        <div>
                            <img class="product__details__pic__item--large img-fluid" src="{{asset('/public/uploads/product/'.$product->m_image)}}" alt="" >
                        </div>
                        @php
                        $images = $product->other_images;
                        $images = explode(',',$images);
                        @endphp
                        @foreach($images as $image)
                        <div>
                            <img class="product__details__pic__item--large img-fluid" src="{{asset('/public/uploads/product/'.$image)}}" alt="" >
                        </div>
                        @endforeach
                    </div>


                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="product__details__text">


                    <h3>{{$product->category->catagory_name}}</h3>
                    <div class="product__details__price">TK {{$product->price}}</div>
                    <div>
                        <p class="text-primary fw-bold">{{$product->product_name}}</p>
                        @foreach($descriptions as $description)
                        <p class="text-dark ">{{$description}}</p>
                        @endforeach

                    </div>

                    <a href="{{route('addtocart',$product->id)}}" class="primary-btn">ADD TO Cart</a>


                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist" id="product">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Filtration Process</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Filtration Process</h6>
                                <div>
                                    @foreach($filters as $filter)
                                    @if($filter->Stage_1 == null)
                                    @else
                                    <p class="my-2">
                                        <span class="fw-bold">Stage 1: </span>{{$filter->Stage_1}}
                                    </p>
                                    @endif
                                    <br>
                                    @if($filter->Stage_2 == null)
                                    @else
                                    <p class="my-2">
                                        <span class="fw-bold">Stage 2: </span>{{$filter->Stage_2}}
                                    </p>
                                    @endif
                                    <br>
                                    @if($filter->Stage_3 == null)
                                    @else
                                    <p class="my-2">
                                        <span class="fw-bold">Stage 3: </span>{{$filter->Stage_3}}
                                    </p>
                                    @endif
                                    <br>
                                    @if($filter->Stage_4 == null)
                                    @else
                                    <p class="my-2">
                                        <span class="fw-bold">Stage 4: </span>{{$filter->Stage_4}}
                                    </p>
                                    @endif
                                    <br>
                                    @if($filter->Stage_5 == null)
                                    @else
                                    <p class="my-2">
                                        <span class="fw-bold">Stage 5: </span>{{$filter->Stage_5}}
                                    </p>
                                    @endif
                                    <br>
                                    @if($filter->Stage_6 == null)
                                    @else
                                    <p class="my-2">
                                        <span class="fw-bold">Stage 6: </span>{{$filter->Stage_6}}
                                    </p>
                                    @endif
                                    <br>
                                    @if($filter->Stage_7 == null)
                                    @else
                                    <p class="my-2">
                                        <span class="fw-bold">Stage 7: </span>{{$filter->Stage_7}}
                                    </p>
                                    @endif
                                    <br>
                                    @if($filter->Stage_8 == null)
                                    @else
                                    <p class="my-2">
                                        <span class="fw-bold">Stage 8: </span>{{$filter->Stage_8}}
                                    </p>
                                    @endif
                                    <br>
                                    @if($filter->Stage_9 == null)
                                    @else
                                    <p class="my-2">
                                        <span class="fw-bold">Stage 9: </span>{{$filter->Stage_9}}
                                    </p>
                                    @endif
                                    <br>
                                    @if($filter->Stage_10 == null)
                                    @else
                                    <p class="my-2">
                                        <span class="fw-bold">Stage 10: </span>{{$filter->Stage_10}}
                                    </p>
                                    @endif
                                    <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="text-center">
                    <img src="{{asset('/public/uploads/product/'.$product->catalog_image)}}" alt="" class="img-fluid   w-50 ">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/js/slick.js')}}"></script>


<script>
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true, 
        mobileFirst: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        centerMode: true,
        focusOnSelect: true, 
        adaptiveHeight: true, 
        mobileFirst: true

    });
</script>


@endsection
