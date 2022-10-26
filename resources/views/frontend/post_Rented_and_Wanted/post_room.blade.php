@extends('frontend.master.post_master')
@section('content')

<div class="container post_container">
    <div class="page-header">
        <div class="row shadow p-4 rounded my-5">
            <div class="col-md-6 col-sm-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Room</li>
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
            <form method="POST" action="{{ route('post_room_rented') }}" enctype="multipart/form-data">
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
                        <label for="room_name_Rent" class="form-label me-2 fw-bold">Post Title</label>
                        <input name="title" type="text" class="form-control" id="room_name_Rent" placeholder="Enter Post Title">
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
                        <label for="price_Rent" class="form-label me-2 fw-bold">Rent Per Month</label>
                        <input name="price" type="number" class="form-control" id="price_Rent" placeholder="Enter Price">
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="s_charge_Rent" class="form-label me-2 fw-bold">Service Charge</label>
                        <input name="s_charge" type="number" class="form-control" id="s_charge_Rent" placeholder="Enter Service Charge">
                    </div>


                    <div class="col-4 mb-3 ">
                        <label for="room_size_Rent" class="form-label me-2 fw-bold">Room Size</label>
                        <input name="room_size" type="text" class="form-control" id="room_size_Rent" placeholder="Enter Room Size">
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="guest_Rent" class="form-label me-2 fw-bold">Guest Count</label>
                        <input name="guest_count" type="number" class="form-control" id="guest_Rent" placeholder="Enter guest count">
                    </div>
                    <div class="col-8 mb-3 ">
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
                            <input class="form-check-input" type="checkbox" id="electricity_Rent" name="electricity">
                            <label class="form-check-label" for="electricity_Rent">
                                Electricity
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="gas_Rent" name="gas">
                            <label class="form-check-label" for="gas_Rent">
                                Gas
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="Water_Rent" name="water">
                            <label class="form-check-label" for="Water_Rent">
                                Water
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="furnished_Rent" name="furnished">
                            <label class="form-check-label" for="furnished_Rent">
                                Furniture
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="attatched_toilet_Rent" name="attached_toilet">
                            <label class="form-check-label" for="attatched_toilet_Rent">
                                Attached Toilet
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="hot_water_Rent" name="hot_water">
                            <label class="form-check-label" for="hot_water_Rent">
                                Geyser
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="ac_Rent" name="ac">
                            <label class="form-check-label" for="ac_Rent">
                                A.C
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="cabel_tv_Rent" name="cable_tv">
                            <label class="form-check-label" for="cabel_tv_Rent">
                                Cable Tv
                            </label>
                        </div>

                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="gen_Rent" name="generator">
                            <label class="form-check-label" for="gen_Rent">
                                Generator
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="wifi_Rent" name="wifi">
                            <label class="form-check-label" for="wifi_Rent">
                                Wifi
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="laundry_Rent" name="varanda">
                            <label class="form-check-label" for="laundry_Rent">
                                Attached Varanda
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="lift_Rent" name="lift">
                            <label class="form-check-label" for="lift_Rent">
                                Lift
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="parking_Rent" name="parking">
                            <label class="form-check-label" for="parking_Rent">
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
            <form method="POST" action="{{ route('post_room_wanted') }}">
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
                        <label for="room_name_Want" class="form-label me-2 fw-bold">Post Title</label>
                        <input name="title" type="text" class="form-control" id="room_name_Want" placeholder="Enter Post Title">
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
                        <label for="price_Want" class="form-label me-2 fw-bold">Rent Per Month</label>
                        <input name="price" type="number" class="form-control" id="price_Want" placeholder="Enter Price">
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="s_charge_Want" class="form-label me-2 fw-bold">Service Charge</label>
                        <input name="s_charge" type="number" class="form-control" id="s_charge_Want" placeholder="Enter Service Charge">
                    </div>


                    <div class="col-4 mb-3 ">
                        <label for="room_size_Want" class="form-label me-2 fw-bold">Room Size</label>
                        <input name="room_size" type="text" class="form-control" id="room_size_Want" placeholder="Enter Room Size">
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="guest_Want" class="form-label me-2 fw-bold">Guest Count</label>
                        <input name="guest_count" type="number" class="form-control" id="guest_Want" placeholder="Enter guest count">
                    </div>
                    <div class="col-8 mb-3 ">
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
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="electricity_Want" name="electricity">
                                <label class="form-check-label" for="electricity_Want">
                                    Electricity
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="gas_Want" name="gas">
                                <label class="form-check-label" for="gas_Want">
                                    Gas
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="Water_Want" name="water">
                                <label class="form-check-label" for="Water_Want">
                                    Water
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="furnished_Want" name="furnished">
                                <label class="form-check-label" for="furnished_Want">
                                    Furniture
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="attatched_toilet_Want" name="attached_toilet">
                                <label class="form-check-label" for="attatched_toilet_Want">
                                    Attached Toilet
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="hot_water_Want" name="hot_water">
                                <label class="form-check-label" for="hot_water_Want">
                                    Geyser
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="ac_Want" name="ac">
                                <label class="form-check-label" for="ac_Want">
                                    A.C
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="cabel_tv_Want" name="cable_tv">
                                <label class="form-check-label" for="cabel_tv_Want">
                                    Cable Tv
                                </label>
                            </div>

                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="gen_Want" name="generator">
                                <label class="form-check-label" for="gen_Want">
                                    Generator
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="wifi_Want" name="wifi">
                                <label class="form-check-label" for="wifi_Want">
                                    Wifi
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="laundry_Want" name="varanda">
                                <label class="form-check-label" for="laundry_Want">
                                    Attached Varanda
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="lift_Want" name="lift">
                                <label class="form-check-label" for="lift_Want">
                                    Lift
                                </label>
                            </div>

                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="parking_Want" name="parking">
                                <label class="form-check-label" for="parking_Want">
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
