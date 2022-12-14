@extends('frontend.master.post_master')

@section('content')
<div class="container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>User Information</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update User Information</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Fillup the Input Fields</h4>
                        <p class="mb-30">Updating User Details</p>
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
                <form method="POST" action="{{ route('parking_spot_update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <input type="hidden" name="id" value="{{$list->id}}">

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">User ID</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->user_id}}" name="user_id" placeholder="Location" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Post Type</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->post_type}}" name="post_type" placeholder="Location" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Title</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->title}}" name="title" placeholder="title" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Date</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->date}}" name="date" placeholder="" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">phone</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->phone}}" name="phone" placeholder="" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->address}}" name="address" placeholder="Location" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Floor Level</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->floor_level}}" name="floor_level" placeholder="Floor Level" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Floor Height</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->floor_height}}" name="floor_height" placeholder="Location" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Vehicle Type</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$list->vehicle_type}}" name="vehicle_type" placeholder="Location" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Price</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="price" value="{{$list->price}}" placeholder="Price" type="numeric">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" placeholder="Description" name="description" value="{{$list->description}}">
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo">
                                <img src="{{ asset('public/uploads/parkings') }}/{{ $list->photo }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo1">
                                <img src="{{ asset('public/uploads/parkings') }}/{{ $list->photo1 }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo2">
                                <img src="{{ asset('public/uploads/parkings') }}/{{ $list->photo2 }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo3">
                                <img src="{{ asset('public/uploads/parkings') }}/{{ $list->photo3 }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo4">
                                <img src="{{ asset('public/uploads/parkings') }}/{{ $list->photo4 }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo5">
                                <img src="{{ asset('public/uploads/parkings') }}/{{ $list->photo5 }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo6">
                                <img src="{{ asset('public/uploads/parkings') }}/{{ $list->photo6 }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Video Link</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" placeholder="Iframe Video Link" name="video" value="{{$list->video}}">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>


                </form>
            </div>
        </div>
    </div>
</div>
@endsection
