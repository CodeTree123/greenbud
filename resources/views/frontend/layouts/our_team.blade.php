@extends('frontend.master')
@section('content')
<section>
    <div class="py-3 bg-success shadow">
        <h1 class="page-title-green text-center text-white">OUR TEAM</h1>
    </div>
    <div class="container">
        <div class="row team_row">
            @foreach($teams as $team)
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 py-2 my-5">
                <div class="team-container shadow mx-auto  p-3">
                    <img src="{{asset('public/uploads/teams/'.$team->image)}}" alt="Team Member" class="team-image img-fluid rounded-top">
                    <div class="team-overlay   d-flex flex-column align-items-center p-2">
                        <div class="team-text ">
                            <h5 class="fw-bolder  text-center">{{$team->name}}</h5>
                            <p class="education fw-bolder text-center mb-0">{{$team->qualification}}</p>
                            <p class="designation fw-bolder text-center mb-0">{{$team->designation}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- <script src="{{asset('assets/js/team.js')}}"></script> -->
@endsection