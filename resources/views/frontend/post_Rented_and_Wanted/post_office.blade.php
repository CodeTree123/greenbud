@extends('frontend.master.post_master')

@section('content')

<div class="container  post_container">
    <div class="page-header">
        <div class="row shadow p-4 rounded my-5">
            <div class="col-md-6 col-sm-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Office</li>
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
        <div class="col-12" id="rent" style="display: none;">
            <form method="POST" action="{{ route('post_office_rented') }}" enctype="multipart/form-data">
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
                        <label for="title_rented" class="form-label me-2 fw-bold">Post Title</label>
                        <input name="title" type="text" class="form-control" id="title_rented" placeholder="Enter Post Title">
                    </div>
                    <div class=" col-4 mb-3">
                        <label for="date_rented" class="form-label me-2 fw-bold">Date</label>
                        <input name="date" type="date" class="form-control" id="date_rented" onfocus="this.showPicker()">
                    </div>
                    <div class=" col-4 mb-3">
                        <label for="phone_rented" class="form-label me-2 fw-bold">Mobile</label>
                        <select id="phone_rented" class="form-select" name="phone">
                            <option value="">Choose number</option>
                            @foreach($lists as $list)
                            <option value="{{$list->phone}}">{{$list->phone}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="price_rented" class="form-label me-2 fw-bold">Rent Per Month</label>
                        <input name="price" type="number" class="form-control" id="price_rented" placeholder="Enter Price">
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="s_charge_rented" class="form-label me-2 fw-bold">Service Charge</label>
                        <input name="s_charge" type="number" class="form-control" id="s_charge_rented" placeholder="Enter Service Charge">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="floor_rented" class="form-label me-2 fw-bold">Floor Level</label>
                        <select id="floor_rented" class="form-select" name="floor_level">
                            <option selected="">Choose...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="15">15+</option>
                        </select>
                    </div>
                    <div class="col-4 mb-3">
                        <label for="interior_rented" class="form-label me-2 fw-bold">Interior Condition</label>
                        <select id="interior_rented" class="form-select" name="interior_condition">
                            <option selected="">Choose...</option>
                            <option value="good">good</option>
                            <option value="moderate">moderate</option>
                            <option value="best">best</option>
                        </select>
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="area_rented" class="form-label me-2 fw-bold">Floor Area</label>
                        <input name="floor_size" type="number" class="form-control" id="area_rented" placeholder="Enter Price">
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="road_width_rented" class="form-label me-2 fw-bold">Road Width</label>
                        <input name="road_width" type="number" class="form-control" id="road_width_rented" placeholder="Enter Road Width">
                    </div>
                    <div class="col-12 mb-3 ">
                        <label for="address_rented" class="form-label me-2 fw-bold">Address</label>
                        <input name="address" type="text" class="form-control" id="address_rented" placeholder="Enter Address">
                    </div>



                    <div class="col-12 mb-3 ">
                        <label for="description_rented" class="form-label me-2 fw-bold">Description</label>
                        <textarea name="description" type="text" class="form-control" id="description_rented" rows="3" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="col-4 mb-3 ">
                        <h2 class="fw-bold mb-3">Ameneties</h2>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="elect_rented" name="electricity">
                            <label class="form-check-label" for="elect_rented">
                                Electricity
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="gas_rented" name="gas">
                            <label class="form-check-label" for="gas_rented">
                                Gas
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="water_rented" name="water">
                            <label class="form-check-label" for="water_rented">
                                Water
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="wifi_rented" name="wifi">
                            <label class="form-check-label" for="wifi_rented">
                                wifi
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="ac_rented" name="ac">
                            <label class="form-check-label" for="ac_rented">
                                A.C
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="lift_rented" name="lift">
                            <label class="form-check-label" for="lift_rented">
                                Lift
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                                <input class="form-check-input" type="checkbox" id="generator_Rent" name="generator">
                                <label class="form-check-label" for="generator_Rent">
                                    Generator
                                </label>
                            </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="fire_safety_rented" name="fire_safety">
                            <label class="form-check-label" for="fire_safety_rented">
                                Fire Exit
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="parking_rented" name="parking">
                            <label class="form-check-label" for="parking_rented">
                                Parking
                            </label>
                        </div>
                    </div>
                    <div class="col-8">
                        <h2 class="fw-bold mb-3">Gallery Section</h2>
                        <label for="photo_rented" class="d-block"> Photo 1</label>
                        <div class="input-group mb-3 ">

                            <input type="file" class="form-control" name="photo" id="photo_rented" placeholder="asd">
                        </div>

                        <label for="photo1_rented" class="d-block"> Photo 2</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo1" id="photo1_rented">
                        </div>

                        <label for="photo2_rented" class="d-block"> Photo 3</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo2" id="photo2_rented">
                        </div>

                        <label for="photo3_rented" class="d-block"> Photo 4</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo3" id="photo3_rented">
                        </div>

                        <label for="photo4_rented" class="d-block"> Photo 5</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo4" id="photo4_rented">
                        </div>

                        <label for="photo5_rented" class="d-block"> Photo 6</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo5" id="photo5_rented">
                        </div>

                        <label for="photo6_rented" class="d-block"> Photo 7</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="photo6" id="photo6_rented">
                        </div>

                    </div>

                    <div class="col-12 mb-3 ">
                        <label for="video_rented" class="form-label me-2 fw-bold"> Youtube Link</label>
                        <input type="text" class="form-control" name="video" id="video_rented" placeholder="  Youtube Link">
                    </div>

                    <button class="btn btn-primary w-25 mx-auto" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-12" id="want" style="display: none;">
            <form method="POST" action="{{ route('post_office_wanted') }}" enctype="multipart/form-data">
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
                        <label for="title_wanted" class="form-label me-2 fw-bold">Post Title</label>
                        <input name="title" type="text" class="form-control" id="title_wanted" placeholder="Enter Post Title">
                    </div>
                    <div class=" col-4 mb-3">
                        <label for="date_wanted" class="form-label me-2 fw-bold">Date</label>
                        <input name="date" type="date" class="form-control" id="date_wanted" onfocus="this.showPicker()">
                    </div>
                    <div class=" col-4 mb-3">
                        <label for="phone_wanted" class="form-label me-2 fw-bold">Mobile</label>
                        <select id="phone_wanted" class="form-select" name="phone">
                            <option value="">Choose number</option>
                            @foreach($lists as $list)
                            <option value="{{$list->phone}}">{{$list->phone}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4 mb-3 ">
                        <label for="price_wanted" class="form-label me-2 fw-bold">Rent Per Month</label>
                        <input name="price" type="number" class="form-control" id="price_wanted" placeholder="Enter Price">
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="s_charge_wanted" class="form-label me-2 fw-bold">Service Charge</label>
                        <input name="s_charge" type="number" class="form-control" id="s_charge_wanted" placeholder="Enter Service Charge">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="floor_wanted" class="form-label me-2 fw-bold">Floor Level</label>
                        <select id="floor_wanted" class="form-select" name="floor_level">
                            <option selected="">Choose...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="15">15+</option>


                        </select>
                    </div>
                    <div class="col-4 mb-3">
                        <label for="interior_wanted" class="form-label me-2 fw-bold">Interior Condition</label>
                        <select id="interior_wanted" class="form-select" name="interior_condition">
                            <option selected="">Choose...</option>
                            <option value="good">good</option>
                            <option value="moderate">moderate</option>
                            <option value="best">best</option>
                        </select>
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="area_wanted" class="form-label me-2 fw-bold">Floor Area</label>
                        <input name="floor_size" type="number" class="form-control" id="area_wanted" placeholder="Enter Price">
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="road_width_wanted" class="form-label me-2 fw-bold">Road Width</label>
                        <input name="road_width" type="number" class="form-control" id="road_width_wanted" placeholder="Enter Road Width">
                    </div>
                    <div class="col-12 mb-3 ">
                        <label for="address_wanted" class="form-label me-2 fw-bold">Address</label>
                        <input name="address" type="text" class="form-control" id="address_wanted" placeholder="Enter Address">
                    </div>



                    <div class="col-12 mb-3 ">
                        <label for="description_wanted" class="form-label me-2 fw-bold">Description</label>
                        <textarea name="description" type="text" class="form-control" id="description_wanted" rows="3" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="col-12 mb-3 ">
                        <h2 class="fw-bold mb-3">Ameneties</h2>
                        <div class="row ms-5 ">
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="elect_wanted" name="electricity">
                                <label class="form-check-label" for="elect_wanted">
                                    Electricity
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="gas_wanted" name="gas">
                                <label class="form-check-label" for="gas_wanted">
                                    Gas
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="water_wanted" name="water">
                                <label class="form-check-label" for="water_wanted">
                                    Water
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="wifi_wanted" name="wifi">
                                <label class="form-check-label" for="wifi_wanted">
                                    wifi
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="ac_wanted" name="ac">
                                <label class="form-check-label" for="ac_wanted">
                                    A.C
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="lift_wanted" name="lift">
                                <label class="form-check-label" for="lift_wanted">
                                    Lift
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="generator_want" name="generator">
                                <label class="form-check-label" for="generator_want">
                                    Generator
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="fire_safety_wanted" name="fire_safety">
                                <label class="form-check-label" for="fire_safety_wanted">
                                    Fire Exit
                                </label>
                            </div>
                            <div class="col-2 form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="parking_wanted" name="parking">
                                <label class="form-check-label" for="parking_wanted">
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
        var rented = document.getElementById('rent');
        var wanted = document.getElementById('want');
        var post = document.getElementById('post_rent');
        var post2 = document.getElementById('post_want');
        if (choose == "Want") {
            wanted.style.display = "flex";
            rented.style.display = "none";

            post2.value = choose;

        } else if (choose == "Rent") {
            rented.style.display = "flex";
            wanted.style.display = "none";

            post.value = choose;
        } else {
            rented.style.display = "none";
            wanted.style.display = "none";
            post.value = choose;

        }

        // console.log(choose);
    }
</script>

@endsection
