@extends('frontend.master.post_master')

@section('content')

<div class="container post_container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="d-flex bd-highlight ">
                    <div class="col-md-6 col-sm-12">
                        <div class="p-2 flex-shrink-1 bd-highlight">
                            <a class="btn btn-primary " href="{{route('change_password_form')}}" class="breadcrumb-item active" aria-current="page">Change Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
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
            <form method="POST" action="{{ route('user_update') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <input type="hidden" name="id" value="{{ $list->id}}">

                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">User name</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" value="{{$list->name}}" name="name" placeholder="Location" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" value="{{$list->email}}" name="email" placeholder="Email" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Mobile Number</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" value="{{$list->phone}}" name="phone" placeholder="Mobile" type="text" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Additional Mobile Number</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" value="{{$list->phone1}}" name="phone1" placeholder="Additional Mobile" type="number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" value="{{$list->address}}" name="address" placeholder="Location" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nationality</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="nationality" value="{{$list->nationality}}" placeholder="nationality" type="numeric">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Date of birth</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" placeholder="Birth Date" name="date_of_birth" value="{{$list->date_of_birth}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Father Name</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" placeholder="Father name" name="father_name" value="{{$list->father_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Mother Name</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="text" class="form-control" placeholder="mother name" name="mother_name" value="{{$list->mother_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Gender</label>
                    <div class="col-sm-12 col-md-10">

                        <select class="form-select" name="gender" aria-label="Default select example">
                            <option>{{$list->gender}}</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">

                    <div class="form-group form-float">
                        <div class="card">

                            <div class="body">
                                <input type="file" class="dropify" name="photo">
                                <img src="{{ asset('public/uploads/registers') }}/{{ $list->photo }}" width="100px" alt="">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
            <!-- Default Basic Forms End -->
        </div>
        <!-- js -->
    </div>
</div>
@endsection
