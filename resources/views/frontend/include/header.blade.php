<div class="body">
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start" tab-index="-1" id="sidebar" aria-labelledby="sidebar-label">
        <div class="offcanvas-header">
            <a href="{{route('index')}}">
                <img src="{{asset('Frontend/assets/img/header/toletx_logo.png')}}" alt="..." width="100" class="logo1">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="input-group mt-3 mb-3">
                <form action="" method="get" class="d-flex my-2">
                    <input class="typeahead main_search form-control" type="search" name="query" placeholder="Search" aria-label="Search" id="autocomplete">
                    <div class="input-group-append">
                        <button type="submit" class="btn  btn-lg btn2 btn-search-offcanvas" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="list-group">
                <a href="{{route('package')}}" class="list-group-item list-group-item-action " aria-current="true">
                    Package Information
                </a>
                <a href="{{route('my_shortlist')}}" class="list-group-item list-group-item-action">My Shortlist</a>
            </div>
            <div class="form-check form-switch d-flex align-items-center mt-3">
                <label class="form-check-label lite-mode" id="mode_indicator" for="liteSwitch">Lite Mode</label>
                <input class="form-check-input ms-3 mode-switch" onclick="changeStatus()" type="checkbox" id="liteSwitch">
            </div>
            <script>
                function myFunction() {
                    var x = document.getElementById("mode_indicator");
                    if (x.innerHTML === "Dark Mode") {
                        x.innerHTML = "Lite Mode";
                    } else if (x.innerHTML === "Lite Mode") {
                        x.innerHTML = "Dark Mode";
                    }
                }
                var liteSwitch = document.getElementById("liteSwitch");
                var fullbody = document.body;
                if (localStorage.getItem('dark_switch_activated') === null) {
                    localStorage.setItem('dark_switch_activated', "false");
                }
                checkStatus()

                function checkStatus() {
                    if (localStorage.getItem('dark_switch_activated') === "true") {
                        liteSwitch.checked = true;
                        fullbody.setAttribute("data-theme", "lite");
                    } else {}
                }

                function changeStatus() {
                    if (localStorage.getItem('dark_switch_activated') === "true") {
                        localStorage.setItem('dark_switch_activated', "false");
                        fullbody.removeAttribute("data-theme");
                    } else {
                        localStorage.setItem('dark_switch_activated', "true");
                        fullbody.setAttribute("data-theme", "lite");
                    }
                }
            </script>
        </div>
    </div>
    <style>
        .icon-hamburger_with_search {
            font-weight: bold !important;
        }

        .icon-hamburger_with_search,
        .notification-icon,
        .setting-icon {
            color: #fff;
        }
    </style>
    <!-- offcanvas end-->
    <div class=" container-fluid">
        <div class="  row px-4 px-xs align-items-center bg-dark  justify-content-lg-between justify-content-md-between justify-content-sm-between  justify-content-xs-between justify-content-between">

            <a href="#sidebar" class="col-lg-1 col-md-1 col-sm-1 col-1   mt-2  " data-bs-toggle="offcanvas" role="button" aria-controlls="sidebar">
                <i class="  fas  h3 icon-hamburger_with_search"></i>
            </a>
            <div class="col-lg-2 col-md-2 col-sm-3 col-3">
                <a class="navbar-brand" href="{{route('index')}}">
                    <img src="{{asset('Frontend/assets/img/header/toletx_logo.png')}}" alt="..." class="logo">
                </a>
                <h6 class=" logo_text  py-2" >সমগ্র বাংলাদেশ ভাড়া দিন  </h6>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3 my-1 searchZ">
                <form action="" method="GET">

                    <div class="input-group ">
                        <input name="query" type="search" class="typeahead main_search form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button type="submit" class="btn  btn-lg btn2 btn-search-offcanvas" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            @if(Auth::user())
            <!-- Notification -->
            <div class="col-lg-1  col-md-1 col-sm-1 col-2 dropdown ">
                <button class="btn bell px-lg-0 px-md-0 px-sm-0 px-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="Dropstart">
                    <i class="far fa-bell notification-icon "></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Lorem ipsum dolor sit amet.</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="#">Lorem ipsum dolor sit amet.</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="#">Lorem ipsum dolor sit amet.</a></li>
                    <hr>
                </ul>
            </div>
            <!-- Settings -->
            <div class="col-lg-1  col-md-1 col-sm-1 col-2 dropdown ps-0 ">
                <button class="btn setting px-lg-0 px-md-0 px-sm-0 px-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (auth()->user()->photo == null )
                    @if(auth()->user()->gender == 'Male' )
                    <img src="{{asset('/man-dummy.png') }}" class="rounded-circle mx-auto img-img" alt="" srcset="" width="32" height="32">
                    @else
                    <img src="{{asset('/dummy-female.jpg') }}" class="rounded-circle mx-auto img-img" alt="" srcset="" width="32" height="32">
                    @endif
                    @else
                    <img src="{{asset('/uploads/registers') }}/{{(Auth::user()->photo)}}" class="rounded-circle mx-auto img-img" alt="" srcset="" width="32" height="32">
                    @endif
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{route('profile')}}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div>
            <!-- Button trigger modal -->
            <div class="col-lg-1  col-md-1 col-sm-1 col-2 post">
                <button type="button" id="post_your_ad" class=" btn btn-primary btnr" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-plus white-text"></i>
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content  post-modal">
                        <div class="modal-header text-center">
                            <h5 class="modal-title " id="exampleModalLabel">Choose a Service</h5>
                            <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <link rel="stylesheet" href="{{asset('Frontend/assets/css/icon.css')}}">
                            <div class="row m-0 mt-2  justify-content-center service-group-row">
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_room')}}">
                                    <span class="icon-room service_item "></span>
                                    <br>
                                    <span class="service_item_name"> Room</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_flat')}}">
                                    <span class="icon-flat service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Flat</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_building')}}">
                                    <span class="icon-building service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Building</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_parking_spot')}}">
                                    <span class="icon-garage service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Garage</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_hotel')}}">
                                    <span class="icon-hotel service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Hotel</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_hostel')}}">
                                    <span class="icon-hostel service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Hostel</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_resort')}}">
                                    <span class="icon-resort service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Resort</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_office')}}">
                                    <span class="icon-office service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Office</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_shop')}}">
                                    <span class="icon-shop service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Shop</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_community')}}">
                                    <span class="icon-community_hall service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Community Hall</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_factory')}}">
                                    <span class="icon-factory service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Factory</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_warehouse')}}">
                                    <span class="icon-warehouse service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Warehouse</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_land')}}">
                                    <span class="icon-land service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Land</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_pond')}}">
                                    <span class="icon-pond service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Pond</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_ghat')}}">
                                    <span class="icon-ghat service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Ghat</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_swimmingpool')}}">
                                    <span class="icon-swimming_pool service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Swimming Pool</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_playground')}}">
                                    <span class="icon-camping service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Camp Site</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_shooting')}}">
                                    <span class="icon-shooting_spot service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Shooting Spot</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_picnic')}}">
                                    <span class="icon-picnic-spot service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Picnic Spot</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_exhibution')}}">
                                    <span class="icon-exhibition_center service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Exhibition
                                        Center</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_rooftop')}}">
                                    <span class="icon-rooftop service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Rooftop</span>
                                </a>
                                <a class="  col-lg-3 col-md-3 col-sm-3 col-3 col-small p-0 me-2 mb-2    text-center" href="{{route('post_bilboard')}}">
                                    <span class="icon-bilboard service_item"></span>
                                    <br>
                                    <span class="service_item_name"> Bilboard</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <!-- Button trigger modal -->
            <div class="col-md-2 col-2">
                <button type="button" id="post_your_ad" class="btn btn-primary btn-toggole-modal">

                  <i class="fa-solid fa-plus"></i>
                </button>

                <!-- Unauthorised Toast Message -->
                <div class="position-fixed top-3 end-0 p-sm-3 p-2" style="z-index: 11">
                    <div id="liveToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex p-3 toast-background">
                            <div class="toast-body">
                                <h1  class="font-weight-bold"><a href="{{url('/#login')}}"> <i class="fa-solid fa-circle-exclamation me-3"></i>  Please login </a></h1>
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <!-- <div class="toast-header">
                            <h1 class="me-auto text-center">Please Login </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div> -->
                    </div>
                </div>
            </div>

            <script>
                var toastTrigger = document.getElementById('post_your_ad')
                var toastLiveExample = document.getElementById('liveToast')
                if (toastTrigger) {
                    toastTrigger.addEventListener('click', function() {
                        var toast = new bootstrap.Toast(toastLiveExample)
                        toast.show()
                    })
                }
            </script>




        </div>


        @endif

    </div>

</div>
<hr>
</div>


<!-- auto complete search script -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtjcjqWnCY8tLp5e7qSjlZ7WNs8zGEPcg&libraries=places&callback=initAutocomplete" async defer></script>

<script>
    let autocomplete;

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('autocomplete'), {
                types: ['establishment'],
                componentRestrictions: {
                    'country': ['AU']
                },
                fields: ['name']
            });
    }
</script>
