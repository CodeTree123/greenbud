@extends('frontend.master.post_master')

@section('content')

<div class="container  post_container">
    <div class="page-header">
        <div class="row shadow p-4 rounded my-5">
            <div class="col-md-6 col-sm-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Camp Site</li>
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
            <form method="POST" action="{{ route('post_playground_rented') }}" enctype="multipart/form-data">
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
                        <label for="title_Want" class="form-label me-2 fw-bold">Camp Site Name</label>
                        <input name="title" type="text" class="form-control" id="title_Rent" placeholder="Enter Camp Site Name">
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
                        <label for="area_Rent" class="form-label me-2 fw-bold">Camp area</label>
                        <input name="area" type="number" class="form-control" id="area_Rent" placeholder="Enter Camp area">
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="address_Rent" class="form-label me-2 fw-bold">Address</label>
                        <input name="address" type="text" class="form-control" id="address_Rent" placeholder="Enter Address">
                    </div>
                    <div class="col-12 mb-3 ">
                        <label for="description_Rent" class="form-label me-2 fw-bold"> Description </label>
                        <textarea name="description" type="text" class="form-control" id="description_Rent" rows="3" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="col-4 mb-3 ">
                        <h2 class="fw-bold mb-3">Ameneties</h2>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="shed_Rent" name="shed">
                            <label class="form-check-label" for="shed_Rent">
                                Shed
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="change_room_Rent" name="change_room">
                            <label class="form-check-label" for="change_room_Rent">
                                Changing Room
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="Toilet_Rent" name="toilet">
                            <label class="form-check-label" for="Toilet_Rent">
                                Toilet
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="sports_Rent" name="sports">
                            <label class="form-check-label" for="sports_Rent">
                                sports Failities
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="Gym_Rent" name="gym">
                            <label class="form-check-label" for="Gym_Rent">
                                Gym
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="generator_Rent" name="generator">
                            <label class="form-check-label" for="generator_Rent">
                                Genarator
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="Parking_Rent" name="parking">
                            <label class="form-check-label" for="Parking_Rent">
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
                        <label for="video_Rent" class="form-label me-2 fw-bold"> Youtube Iframe Link</label>
                        <input type="text" class="form-control" name="video" id="video_Rent" placeholder="  Youtube  Iframe Link">
                    </div>
                    <div class="col-12 mb-3">
                        <a href="https://www.youtube.com/watch?v=FAY1K2aUg5g" target="_blank" class="link-info mx-auto" style="text-decoration: underline;">
                            If you don't know how to get iframe link from your youtube video, then click here to get help
                        </a>
                    </div>

                    <button class="btn btn-primary w-25 mx-auto" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-12" id="Want" style="display: none;">
            <form method="POST" action="{{ route('post_playground_wanted') }}">
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
                    <div class="row">
                        <div class="col-4 mb-3 ">
                            <label for="title_Want" class="form-label me-2 fw-bold">Camp Site Name</label>
                            <input name="title" type="text" class="form-control" id="title_Want" placeholder="Enter Camp Site Name">
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
                            <label for="area_Want" class="form-label me-2 fw-bold">Camp area</label>
                            <input name="area" type="number" class="form-control" id="area_Want" placeholder="Enter Camp area">
                        </div>
                        <div class="col-4 mb-3 ">
                            <label for="address_Want" class="form-label me-2 fw-bold">Address</label>
                            <input name="address" type="text" class="form-control" id="address_Want" placeholder="Enter Address">
                        </div>
                        <div class="col-12 mb-3 ">
                            <label for="description_Want" class="form-label me-2 fw-bold"> Description </label>
                            <textarea name="description" type="text" class="form-control" id="description_Want" rows="3" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="col-12 mb-3 ">
                            <h2 class="fw-bold mb-3">Ameneties</h2>
                            <div class="row ms-5 ">
                                <div class="col-2 form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="shed_Want" name="shed">
                                    <label class="form-check-label" for="shed_Want">
                                        Shed
                                    </label>
                                </div>
                                <div class="col-2 form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="change_room_Want" name="change_room">
                                    <label class="form-check-label" for="change_room_Want">
                                        Changing Room
                                    </label>
                                </div>
                                <div class="col-2 form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="Toilet_Want" name="toilet">
                                    <label class="form-check-label" for="Toilet_Want">
                                        Toilet
                                    </label>
                                </div>
                                <div class="col-2 form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="sports_Want" name="sports">
                                    <label class="form-check-label" for="sports_Want">
                                        sports Failities
                                    </label>
                                </div>
                                <div class="col-2 form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="Gym_Want" name="gym">
                                    <label class="form-check-label" for="Gym_Want">
                                        Gym
                                    </label>
                                </div>
                                <div class="col-2 form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="generator_Want" name="generator">
                                    <label class="form-check-label" for="generator_Want">
                                        Genarator
                                    </label>
                                </div>
                                <div class="col-2 form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="Parking_Want" name="parking">
                                    <label class="form-check-label" for="Parking_Want">
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
