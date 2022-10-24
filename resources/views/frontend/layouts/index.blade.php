@extends('frontend.master')
@section('content')
<section class="hero">
    <div class="container-fluid">
        <div class="row ">

            <div class="col-lg-12 container">
<style>
    .slider_img_container{
        height: 70vh; 
    }
    .slider_img_container img{
        height: 100%; 
        object-fit: contain;
    }
</style>

                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>

                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <div class="slider_img_container">
                               <img src="{{asset('assets/img/company/GREENBUD_PureFlo_Lotus_5.jpg')}}" class="d-block w-100 hero_slide" alt="...">
                            </div>
                    
                            <div class="carousel-caption d-none d-md-block text-white">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <div class="slider_img_container"> 
                                <img src="{{asset('assets/img/company/GREENBUD_PureFlo_Slim_SE_3.jpg')}}" class="d-block w-100 hero_slide" alt="...">
                            </div>
                            <div class="carousel-caption d-none d-md-block text-white">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->


<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{asset('assets/img/company/GREENBUD_PureFlo_S1.jpg ')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{asset('assets/img/company/GREENBUD_PureFlo_S2.jpg  ')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->

<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h6 class="fw-bold mb-3">{{$cat_1->catagory_name}}</h6>
                    <div class="latest-product__slider owl-carousel latest_Products owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-732px, 0px, 0px); transition: all 1.2s ease 0s; width: 2196px;">
                                @foreach($products_1->chunk(3) as $product)
                                <div class="owl-item active" style="width: 366px;">
                                    @foreach($product as $pro)
                                    <div class="latest-prdouct__slider__item">
                                        @if($pro->cat_id == 1)
                                        <a href="{{route('shop_grid_details',$pro->id)}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{url('/public/uploads/product/'.$pro->m_image)}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$pro->product_name}}</h6>
                                                <span>Tk {{$pro->price}}</span>
                                            </div>
                                        </a>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span class="fa fa-angle-left"><span></span></span></button><button type="button" role="presentation" class="owl-next"><span class="fa fa-angle-right"><span></span></span></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h6 class="fw-bold mb-3">{{$cat_2->catagory_name}}</h6>
                    <div class="latest-product__slider owl-carousel top_rated_products owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-1098px, 0px, 0px); transition: all 1.2s ease 0s; width: 2196px;">
                                @foreach($products_2->chunk(3) as $product)
                                <div class="owl-item active" style="width: 366px;">
                                    @foreach($product as $pro)
                                    <div class="latest-prdouct__slider__item">
                                        <a href="{{route('shop_grid_details',$pro->id)}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{url('/public/uploads/product/'.$pro->m_image)}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$pro->product_name}}</h6>
                                                <span>Tk {{$pro->price}}</span>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span class="fa fa-angle-left"><span></span></span></button><button type="button" role="presentation" class="owl-next"><span class="fa fa-angle-right"><span></span></span></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h6 class="fw-bold mb-3">{{$cat_3->catagory_name}}</h6>
                    <div class="latest-product__slider owl-carousel review_products owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-1098px, 0px, 0px); transition: all 1.2s ease 0s; width: 2196px;">
                                @foreach($products_3->chunk(3) as $product)
                                <div class="owl-item cloned" style="width: 366px;">
                                    @foreach($product as $pro)
                                    <div class="latest-prdouct__slider__item">
                                        <a href="{{route('shop_grid_details',$pro->id)}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{url('/public/uploads/product/'.$pro->m_image)}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$pro->product_name}}</h6>
                                                <span>Tk {{$pro->price}}</span>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span class="fa fa-angle-left"><span></span></span></button><button type="button" role="presentation" class="owl-next"><span class="fa fa-angle-right"><span></span></span></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
