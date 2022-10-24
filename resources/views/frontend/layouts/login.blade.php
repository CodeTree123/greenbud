@extends('frontend.master')
@section('content')
<!-- Contact Form Begin -->
<div class="login-form  ">
    <div class="container">
        <div class="login__form__title">
            <h2>Login Form</h2>
        </div>
        <form action="{{route('login')}}" class="" method="POST">
            @csrf
            <div class=" ">
                <div class=" text-center ">
                    <input type="text" placeholder="Your Email" name="email">
                </div>
                <div class=" text-center ">
                    <input type="password" placeholder="Enter Password" name="password">
                </div>
                <div class=" text-center">
                    <button type="submit" class="site-btn">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->

@endsection
