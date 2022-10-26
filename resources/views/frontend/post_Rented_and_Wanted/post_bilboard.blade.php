@extends('frontend.master.post_master')

@section('content')

<div class="container  post_container">
    <div class="page-header">
        <div class="row shadow p-4 rounded my-5">
            <div class="col-md-6 col-sm-12">

                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Billboard</li>
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
                <option value="Rented">Rented</option>
                <option value="Wanted">Wanted</option>
            </select>
        </div>
        <div class="col-12" id="rented" style="display: none;">
            <form action="{{route('post_bilboard_rented')}}" method="POST">
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
                        <label for="billboard_rented" class="form-label me-2 fw-bold">Post Title</label>
                        <input name="title" type="text" class="form-control" id="billboard_rented" placeholder="Enter Post Title">
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
                        <label for="price_rented" class="form-label me-2 fw-bold"> Rent Per Month</label>
                        <input name="price" type="number" class="form-control" id="price_rented" placeholder="Enter Price">
                    </div>


                    <div class="col-4 mb-3 ">
                        <label for="size_rented" class="form-label me-2 fw-bold">Billboard Size</label>
                        <input name="size" type="text" class="form-control" id="size_rented" placeholder="Enter Billboard Size">
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="height_rented" class="form-label me-2 fw-bold">Billboard Height</label>
                        <input name="hieght" type="text" class="form-control" id="height_rented" placeholder="Enter Billboard Height">
                    </div>
                    <div class=" col-4 mb-3">
                        <label for="type_rented" class="form-label me-2 fw-bold">Billboard Type</label>
                        <select id="type_rented" class="form-select" name="type">
                            <option selected="">Choose...</option>
                            <option value="bulletin">bulletin</option>
                            <option value="painted">painted</option>
                            <option value="Mobile">Mobile</option>
                            <option value="classic">classic</option>
                        </select>
                    </div>
                    <div class="col-8 mb-3 ">
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
                            <input class="form-check-input" type="checkbox" id="electricity_rented" name="electricity">
                            <label class="form-check-label" for="electricity_rented">
                                Electricity
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
                        <label for="video_rented" class="form-label me-2 fw-bold"> Youtube Iframe Link</label>
                        <input type="text" class="form-control" name="video" id="video_rented" placeholder="  Youtube  Iframe Link">
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
        <div class="col-12" id="wanted" style="display: none;">
            <form action="{{route('post_bilboard_wanted')}}" method="POST">
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
                        <label for="billboard_wanted" class="form-label me-2 fw-bold">Post Title</label>
                        <input name="title" type="text" class="form-control" id="billboard_wanted" placeholder="Enter Post Title">
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
                        <label for="price_wanted" class="form-label me-2 fw-bold"> Rent Per Month</label>
                        <input name="price" type="number" class="form-control" id="price_wanted" placeholder="Enter Price">
                    </div>


                    <div class="col-4 mb-3 ">
                        <label for="size_wanted" class="form-label me-2 fw-bold">Billboard Size</label>
                        <input name="size" type="text" class="form-control" id="size_wanted" placeholder="Enter Billboard Size">
                    </div>
                    <div class="col-4 mb-3 ">
                        <label for="height_wanted" class="form-label me-2 fw-bold">Billboard Height</label>
                        <input name="hieght" type="text" class="form-control" id="height_wanted" placeholder="Enter Billboard Height">
                    </div>
                    <div class=" col-4 mb-3">
                        <label for="type_wanted" class="form-label me-2 fw-bold">Billboard Type</label>
                        <select id="type_wanted" class="form-select" name="type">
                            <option selected="">Choose...</option>
                            <option value="bulletin">bulletin</option>
                            <option value="painted">painted</option>
                            <option value="Mobile">Mobile</option>
                            <option value="classic">classic</option>
                        </select>
                    </div>
                    <div class="col-8 mb-3 ">
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
                            <div class="form-check ms-5 mb-2">
                                <input class="form-check-input" type="checkbox" id="electricity_wanted" name="electricity">
                                <label class="form-check-label" for="electricity_wanted">
                                    Electricity
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
        var rented = document.getElementById('rented');
        var wanted = document.getElementById('wanted');
        var post = document.getElementById('post_rent');
        var post2 = document.getElementById('post_want');
        if (choose == "Wanted") {
            wanted.style.display = "flex";
            rented.style.display = "none";

            post2.value = choose;

        } else if (choose == "Rented") {
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
