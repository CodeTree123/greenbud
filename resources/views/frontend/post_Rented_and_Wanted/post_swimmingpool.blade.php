@extends('frontend.master.post_master')

@section('content')

<div class="container  post_container">
    <div class="page-header">
        <div class="row shadow p-4 rounded my-5">
            <div class="col-md-6 col-sm-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Swimming Pool</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <!-- Default Basic Forms Start -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row shadow p-4 rounded my-5  ">

        <div class="col-sm-12 col-md-12 mb-5">
            <select id="choose_post_type" onchange="val()" class="form-select w-50 mx-auto">
                <option value="">Choose Post Type...</option>
                <option value="Rent">Rent</option>
                <option value="Want">Want</option>
            </select>
        </div>
        <div class="col-12" id="Rent" style="display: none;">
            <form method="POST" action="{{ route('post_swimmingpool_rented') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <input id="user_id" type="hidden" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ Auth::user()->id }}" required autocomplete="user_id" autofocus>

                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <input class="form-control" type="hidden" id="post_rent" name="post_type">

                <div class="row">
                    <div class="col-4 mb-3 ">
                        <label for="Swmming_Pool_Rent" class="form-label me-2 fw-bold">Post Title</label>
                        <input name="title" type="text" class="form-control" id="Swmming_Pool_Rent" placeholder="Enter Post Title">
                    </div>
                    <div class=" col-4 mb-3">
                        <label for="date_Rent" class="form-label me-2 fw-bold">Date</label>
                        <input name="date" type="date" class="form-control" id="date_Rent" onfocus="this.showPicker()">
                    </div>
                    <div class=" col-4 mb-3">
                        <label for="phone_Rent" class="form-label me-2 fw-bold">Mobile</label>
                        <select id="phone_Rent" class="form-select" name="phone">
                            <option value="">Choose number</option>
                            @foreach($lists as $list)
                            <option value="{{$list->phone}}">{{$list->phone}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4 mb-3 ">
                        <label for="price_Rent" class="form-label me-2 fw-bold"> Rent Per Day</label>
                        <input name="price" type="number" class="form-control" id="price_Rent" placeholder="Enter Price">
                    </div>


                    <div class="col-4 mb-3 ">
                        <label for="size_Rent" class="form-label me-2 fw-bold">Pool Size</label>
                        <input name="size" type="text" class="form-control" id="size_Rent" placeholder="Enter Pool Size">
                    </div>
                    <div class=" col-4 mb-3">
                        <label for="room_type_Rent" class="form-label me-2 fw-bold">Pool Type</label>
                        <select id="room_type_Rent" class="form-select" name="type">
                            <option selected="">Choose...</option>
                            <option value="in-grown">in-grown</option>
                            <option value="swim">swim</option>
                            <option value="lap">lap</option>
                            <option value="hot tub">hot tub</option>
                        </select>
                    </div>
                    <div class="col-12 mb-3 ">
                        <label for="address_Rent" class="form-label me-2 fw-bold">Address</label>
                        <input name="address" type="text" class="form-control" id="address_Rent" placeholder="Enter Address">
                    </div>
                    <div class="col-12 mb-3 ">
                        <label for="description_Rent" class="form-label me-2 fw-bold">Description</label>
                        <textarea name="description" type="text" class="form-control" id="description_Rent" rows="3" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="col-4 mb-3 ">
                        <h2 class="fw-bold mb-3">Ameneties</h2>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="wifi_rent" name="wifi">
                            <label class="form-check-label" for="wifi_rent">
                                Wifi
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="toilet_rent" name="toilet">
                            <label class="form-check-label" for="toilet_rent">
                                Toilet
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="Change_room_rent" name="change_room">
                            <label class="form-check-label" for="Change_room_rent">
                                Changing Room
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="shed_rent" name="shed">
                            <label class="form-check-label" for="shed_rent">
                                Shed
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="generator_Rent" name="generator">
                            <label class="form-check-label" for="generator_Rent">
                                Genarator
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="laundry_rent" name="laundry">
                            <label class="form-check-label" for="laundry_rent">
                                Laundry
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="parking_rent" name="parking">
                            <label class="form-check-label" for="parking_rent">
                                Parking
                            </label>
                        </div>
                    </div>
                    <div class="col-8">
                        <h2 class="fw-bold mb-3">Gallery Section</h2>
                        <label for="photo_Rent" class="d-block"> Photo 1</label>
                        <div class="input-group mb-3 ">

                            <input type="file" class="form-control" name="photo" id="photo_Rent" placeholder="asd">
                        </div>

                        <label for="photo1_Rent" class="d-block"> Photo 2</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo1" id="photo1_Rent">
                        </div>

                        <label for="photo2_Rent" class="d-block"> Photo 3</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo2" id="photo2_Rent">
                        </div>

                        <label for="photo3_Rent" class="d-block"> Photo 4</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo3" id="photo3_Rent">
                        </div>

                        <label for="photo4_Rent" class="d-block"> Photo 5</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo4" id="photo4_Rent">
                        </div>

                        <label for="photo5_Rent" class="d-block"> Photo 6</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo5" id="photo5_Rent">
                        </div>

                        <label for="photo6_Rent" class="d-block"> Photo 7</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo6" id="photo6_Rent">
                        </div>

                    </div>
                    <div class="col-12 mb-3 ">
                        <label for="video_Rent" class="form-label me-2 fw-bold"> Youtube Link</label>
                        <input type="text" class="form-control" name="video" id="video_Rent" placeholder="  Youtube Link">
                    </div>
                    <button class="btn btn-primary w-25 mx-auto" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-12" id="Want" style="display: none;">
            <form method="POST" action="{{ route('post_swimmingpool_wanted') }}">
                @csrf
                <div class="col-md-6">
                    <input id="user_id" type="hidden" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ Auth::user()->id }}" required autocomplete="user_id" autofocus>

                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <input class="form-control" type="hidden" id="post_want" name="post_type">
                <div class="row">
                    <div class="col-4 mb-3 ">
                        <label for="Swimming_Pool_Want" class="form-label me-2 fw-bold">post Title</label>
                        <input name="title" type="text" class="form-control" id="Swimming_Pool_Want" placeholder="Enter post Title">
                    </div>
                    <div class=" col-4 mb-3">
                        <label for="date_Want" class="form-label me-2 fw-bold">Date</label>
                        <input name="date" type="date" class="form-control" id="date_Want" onfocus="this.showPicker()">
                    </div>
                    <div class=" col-4 mb-3">
                        <label for="phone_Want" class="form-label me-2 fw-bold">Mobile</label>
                        <select id="phone_Want" class="form-select" name="phone">
                            <option value="">Choose number</option>
                            @foreach($lists as $list)
                            <option value="{{$list->phone}}">{{$list->phone}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4 mb-3 ">
                        <label for="price_Want" class="form-label me-2 fw-bold"> Rent Per Day</label>
                        <input name="price" type="number" class="form-control" id="price_Want" placeholder="Enter Price">
                    </div>


                    <div class="col-4 mb-3 ">
                        <label for="size_Want" class="form-label me-2 fw-bold">Pool Size</label>
                        <input name="size" type="text" class="form-control" id="size_Want" placeholder="Enter Pool Size">
                    </div>
                    <div class=" col-4 mb-3">
                        <label for="room_type_Want" class="form-label me-2 fw-bold">Pool Type</label>
                        <select id="room_type_Want" class="form-select" name="type">
                            <option selected="">Choose...</option>
                            <option value="in-grown">in-grown</option>
                            <option value="swim">swim</option>
                            <option value="lap">lap</option>
                            <option value="hot tub">hot tub</option>
                        </select>
                    </div>
                    <div class="col-12 mb-3 ">
                        <label for="address_Want" class="form-label me-2 fw-bold">Address</label>
                        <input name="address" type="text" class="form-control" id="address_Want" placeholder="Enter Address">
                    </div>
                    <div class="col-12 mb-3 ">
                        <label for="description_Want" class="form-label me-2 fw-bold">Description</label>
                        <textarea name="description" type="text" class="form-control" id="description_Want" rows="3" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="col-12 mb-3 ">
                        <h2 class="fw-bold mb-3">Ameneties</h2>
                        <div class="row ms-5 ">
                            <div class="col-2 form-check mb-2we">
                                <input class="form-check-input" type="checkbox" id="wifi_want" name="wifi">
                                <label class="form-check-label" for="wifi_want">
                                    Wifi
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2we">
                                <input class="form-check-input" type="checkbox" id="toilet_want" name="toilet">
                                <label class="form-check-label" for="toilet_want">
                                    Toilet
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2we">
                                <input class="form-check-input" type="checkbox" id="Change_room_want" name="change_room">
                                <label class="form-check-label" for="Change_room_want">
                                    Changing Room
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2we">
                                <input class="form-check-input" type="checkbox" id="shed_want" name="shed">
                                <label class="form-check-label" for="shed_want">
                                    Shed
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2we">
                            <input class="form-check-input" type="checkbox" id="generator_want" name="generator">
                            <label class="form-check-label" for="generator_want">
                                Genarator
                            </label>
                        </div>
                            <div class="col-2 form-check mb-2we">
                                <input class="form-check-input" type="checkbox" id="laundry_want" name="laundry">
                                <label class="form-check-label" for="laundry_want">
                                    Laundry
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2we">
                                <input class="form-check-input" type="checkbox" id="parking_want" name="parking">
                                <label class="form-check-label" for="parking_want">
                                    Parking
                                </label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary w-25 mx-auto" type="submit">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- js -->

<script>
    function val() {
        var choose = document.getElementById('choose_post_type').value;
        var Rent = document.getElementById('Rent');
        var Want = document.getElementById('Want');
        var post = document.getElementById('post_rent');
        var post2 = document.getElementById('post_want');
        if (choose == "Want") {
            Want.style.display = "flex";
            Rent.style.display = "none";

            post2.value = choose;

        } else if (choose == "Rent") {
            Rent.style.display = "flex";
            Want.style.display = "none";

            post.value = choose;
        } else {
            Rent.style.display = "none";
            Want.style.display = "none";
            post.value = choose;

        }

        // console.log(choose);
    }
</script>

@endsection
