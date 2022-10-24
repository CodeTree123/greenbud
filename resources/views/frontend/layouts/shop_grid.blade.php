@extends('frontend.master')
@section('content')
 

<section class="breadcrumb-section ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text ">
                    <h2>Greenbud Shop</h2>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
            <div class="product__item">
                <div class="product__item__pic set-bg text-center">
                    <a href="{{route('shop_grid_details',$product->id)}}"><img src="{{url('/public/uploads/product/'.$product->m_image)}}" alt="" srcset="" width="300" class="img-fluid"></a>
                    <ul class="product__item__pic__hover">
                        <li><a href="{{route('addtocart',$product->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="{{route('shop_grid_details',$product->id)}}">{{$product-> product_name}}</a></h6>
                    <h5>Tk. {{$product->price}}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>

    </div>
    </div>
    </div>
</section>
<!-- Product Section End -->
@endsection
