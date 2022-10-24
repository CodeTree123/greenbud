@extends('frontend.master')
@section('content')


<!-- Breadcrumb Section Begin -->
<!-- <section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/breadcrumb.jpg')}}"> -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{url('/public/uploads/product/'.$cart->options->image)}}" alt="" width="100">
                                    <h5>{{$cart->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    TK. {{$cart->price}}
                                </td>

                                <td class="shoping__cart__quantity   ">
                                    <form action="{{route('cart.update')}}" class="d-flex  mx-5" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="{{$cart->rowId}}" name="rowId">
                                        <input type="number" class="quantity " id="exampleInputEmail1" value="{{ $cart->qty }}" min="1" max="5" name="u_qty">
                                        <button type="submit" class="btn btn-success mx-3">
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="shoping__cart__total">
                                    TK. {{$cart->subtotal}}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{route('cartdelete',$cart->rowId )}}"> <span class="icon_close"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{route('index')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <!-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <!-- <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>Tk. {{Cart::subtotal()}}</span></li>
                        @php
                        $total=(float)str_replace(',','',Cart::subtotal());
                        @endphp
                        <li>Total <span>Tk. {{$total}}</span></li>
                    </ul>
                    <a href="{{route('checkout_view')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection
