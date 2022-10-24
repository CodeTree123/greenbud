@extends('frontend.master')
@section('content')
   
<section class="breadcrumb-section ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="{{route('checkout')}}" method="POST">
                @csrf
                @if(Auth::user())
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>First Name<span>*</span></p>
                                    <input type="text" name="first_name" value="{{Auth::user()->first_name}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="last_name" value="{{Auth::user()->last_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" required placeholder="Enter Your Address" name="address">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="number" name="phone" value="{{Auth::user()->phone}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="email" value="{{Auth::user()->email}}">
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>First Name<span>*</span></p>
                                            <input type="text" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Last Name<span>*</span></p>
                                            <input type="text" name="last_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Address<span>*</span></p>
                                    <input type="text" required placeholder="Enter Your Address" name="address">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Phone<span>*</span></p>
                                            <input type="number" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="email" name="email">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="checkout__input">
                                    <p>Order notes<span>*</span></p>
                                    <input type="text" name="address" placeholder="Notes about your order, e.g. special notes for delivery.">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="checkout__order">
                                    <h4>Your Order</h4>
                                    <div class="checkout__order__products">Products <span>Total</span></div>
                                    <ul>
                                        @foreach($carts as $cart)
                                        <li>{{$cart->name}} <span>Tk.{{$cart->subtotal}}</span></li>
                                        @endforeach
                                    </ul>
                                    <div class="checkout__order__subtotal">Subtotal <span>Tk.{{Cart::subtotal()}}</span></div>
                                    @php
                                    $total=(float)str_replace(',','',Cart::subtotal());
                                    @endphp
                                    <div class="checkout__order__total">Total <span>Tk. {{$total}}</span></div>
                                    <button type="submit" class="site-btn">PLACE ORDER</button>
                                </div>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection