@extends('frontend.master.post_master')

@section('content')
<div class="container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Updating Room post Details</h4>
                    </div>
                </div>
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
                <form method="POST" action="{{ route('room_update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Post Type</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->post_type}}" name="post_type" placeholder="Location" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Title</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->title}}" name="title" placeholder="Location" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Date</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->date}}" name="date" placeholder="" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">User ID</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->user_id}}" name="user_id" placeholder="Location" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Service Charge</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->s_charge}}" name="s_charge" placeholder="s_charge" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="id" value="{{$list->id}}">
                        <label class="col-sm-12 col-md-2 col-form-label">Hotel Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="{{$list->hotel_name}}" name="hotel_name" placeholder="Hotel Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->address}}" name="address" placeholder="Location" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Price</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="price" value="{{$list->price}}" placeholder="Price" type="numeric">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Room Size</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" placeholder="Guest Count" name="room_size" value="{{$list->room_size}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" placeholder="Description" name="description" value="{{$list->description}}">
                        </div>
                        <div class="col-4 mb-3 ">
                        <h2 class="fw-bold mb-3">Ameneties</h2>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="electricity_rented" name="electricity">
                            <label class="form-check-label" for="electricity_rented">
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
                            <input class="form-check-input" type="checkbox" id="Water_rented" name="water">
                            <label class="form-check-label" for="Water_rented">
                                Water
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="furnished_rented" name="furnished">
                            <label class="form-check-label" for="furnished_rented">
                                Furniture
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="attatched_toilet_rented" name="attached_toilet">
                            <label class="form-check-label" for="attatched_toilet_rented">
                                Attached Toilet
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="hot_water_rented" name="hot_water">
                            <label class="form-check-label" for="hot_water_rented">
                                Geyser
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="ac_rented" name="ac">
                            <label class="form-check-label" for="ac_rented">
                                A.C
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="cabel_tv_rented" name="cable_tv">
                            <label class="form-check-label" for="cabel_tv_rented">
                                Cable Tv
                            </label>
                        </div>

                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="gen_rented" name="generator">
                            <label class="form-check-label" for="gen_rented">
                                Generator
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="wifi_rented" name="wifi">
                            <label class="form-check-label" for="wifi_rented">
                                Wifi
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="laundry_rented" name="laundry">
                            <label class="form-check-label" for="laundry_rented">
                                Laundry
                            </label>
                        </div>
                        <div class="form-check ms-5 mb-2">
                            <input class="form-check-input" type="checkbox" id="lift_rented" name="lift">
                            <label class="form-check-label" for="lift_rented">
                                Lift
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
                    </div>
              
                            <div class="col-md-6 col-sm-12">
                                <div class="custom-control custom-checkbox mb-5">
                                    <input type="text" name="furnished" value="{{$list->furnished}}" class="form-control" id="customCheck5">
                                    <label class="custom-control-label" for="customCheck5">Furnished</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input type="text" name="hot_water" value="{{$list->hot_water}}" class="form-control" id="customCheck6">
                                    <label class="custom-control-label" for="customCheck6">Hot Water</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input type="text" name="ac" value="{{$list->ac}}" class="form-control" id="customCheck7">
                                    <label class="custom-control-label" for="customCheck7">Ac </label>
                                </div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input type="text" name="laundry" value="{{$list->laundry}}" class="form-control" id="customCheck8">
                                    <label class="custom-control-label" for="customCheck8">Laundry </label>
                                </div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input type="text" name="cable_tv" value="{{$list->cable_tv}}" class="form-control" id="customCheck9">
                                    <label class="custom-control-label" for="customCheck9">Cable Tv </label>
                                </div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input type="text" name="attached_varanda" value="{{$list->attached_varanda}}" class="form-control" id="customCheck10">
                                    <label class="custom-control-label" for="customCheck10">Attached Varanda</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input type="text" name="parking" value="{{$list->parking}}" class="form-control" id="customCheck10">
                                    <label class="custom-control-label" for="customCheck10">Parking</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo">
                                <img src="{{ asset('public/uploads/rooms') }}/{{ $list->photo }}" alt="" width="100px">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo1">
                                <img src="{{ asset('public/uploads/rooms') }}/{{ $list->photo1 }}" alt="" width="100px">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo2">
                                <img src="{{ asset('public/uploads/rooms') }}/{{ $list->photo2 }}" alt="" width="100px">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo3">
                                <img src="{{ asset('public/uploads/rooms') }}/{{ $list->photo3 }}" alt="" width="100px">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo4">
                                <img src="{{ asset('public/uploads/rooms') }}/{{ $list->photo4 }}" alt="" width="100px">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo5">
                                <img src="{{ asset('public/uploads/rooms') }}/{{ $list->photo5 }}" alt="" width="100px">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo6">
                                <img src="{{ asset('public/uploads/rooms') }}/{{ $list->photo6 }}" alt="" width="100px">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Youtube Iframe video Link</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->video}}" name="video" placeholder="Pest Link here" type="text">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
