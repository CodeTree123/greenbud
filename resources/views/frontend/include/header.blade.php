<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">

    <button type="button" class="hamburger_close btn-close float-end" aria-label="Close"></button>
    <div class="humberger__menu__logo">
        <a href="/"><img src="{{asset('assets/img/company/logo_one.png')}}" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="{{route('shopping_cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{ count($carts) }}</span></a></li>
        </ul>

    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__auth">
            @if(Auth::user())
            <div class="dropdown">
                <p class="top_header_dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->email}}
                </p>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('profile')}}">My Profile</a></li>
                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>

                </ul>
            </div>
            @else

            <a href="{{route('login_view')}}"><i class="fa fa-user"></i> Login</a>
            @endif
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="/">Home</a></li>
            <li>
                <a href="#">View Products</a>
                    <ul class="header__menu__dropdown" id="test">
                        @foreach($categories as $category)
                        @if($category->id < 4) 
                        <li>
                            <a href="{{route('shop_grid',$category->id)}}"> {{$category->catagory_name}}</a>
                        </li>
                        @else
                        <li>
                            <a href="{{route('shop_details',$category->id)}}"> {{$category->catagory_name}}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
            </li>
            <li>
                <a href="#">About</a>
                <ul class="header__menu__dropdown" id="test">
                    <li><a href="{{route('about_us')}}">Know About Us</a></li>
                    <li><a href="{{route('our_team')}}">Our Team</a></li>
                    <li><a href="{{route('our_other_concerns')}}">Our Other Concerns</a></li>
                </ul>
            </li>
            <li><a href="{{route('experiences')}}">Experiences</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="https://www.facebook.com/greenbudwater"><i class="fa fa-facebook"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> water@greenbudbd.com</li> 
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="https://www.facebook.com/greenbudwater"><i class="fa fa-facebook"></i></a>
                        </div>

                        <div class="header__top__right__auth">
                            @if(Auth::user()) <div class="dropdown">
                                <p class="top_header_dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{Auth::user()->email}}
                                </p>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('profile')}}">My Profile</a></li>
                                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>

                                </ul>
                            </div>
                            @else

                            <a href="{{route('login_view')}}"><i class="fa fa-user"></i> Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="/"><img src="{{asset('assets/img/company/logo_one.png ')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="#">Products</a>
                            <ul class="header__menu__dropdown" id="test">
                                @foreach($categories as $category)
                                @if($category->id < 4) <li>
                                    <a href="{{route('shop_grid',$category->id)}}"> {{$category->catagory_name}}</a>
                        </li>
                        @else
                        <li>
                            <a href="{{route('shop_details',$category->id)}}"> {{$category->catagory_name}}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    </li>
                    <li><a href="#">About</a>
                        <ul class="header__menu__dropdown">
                            <li><a href="{{route('about_us')}}">Know About Us</a></li>
                            <li><a href="{{route('our_team')}}">Our Team</a></li>
                            <li><a href="{{route('our_other_concerns')}}">Our Other Concerns</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('experiences')}}">Experiences</a></li>
                    <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2">
                <div class="header__cart d-lg-block d-md-none d-sm-none d-xs-none d-none">
                    <ul>
                        <li><a href="{{route('shopping_cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{ count($carts) }}</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

<script>
    const body = document.querySelector("body");
    const hamburger_close = document.querySelector(".hamburger_close");
    const humberger_menu_overlay = document.querySelector(".humberger__menu__overlay");
    const humberger_menu_wrapper = document.querySelector(".humberger__menu__wrapper");

    hamburger_close.addEventListener('click', function() {
        humberger_menu_wrapper.classList.remove("show__humberger__menu__wrapper");
        humberger_menu_overlay.classList.remove("active");
        body.classList.remove("over_hid");

    });
</script>