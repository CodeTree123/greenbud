@extends('frontend.master')
@section('content')
       <section>
        <div class="py-3 bg-success shadow">
            <h1 class="page-title-green text-center text-white" >Our Experiences</h1>
        </div>
        <div class="container my-5">

        @foreach($exps as $exp)
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="text-center mb-2">
                <img src="{{asset('public/uploads/experiences/'.$exp->image)}}" alt="Team Member" class="team-image img-fluid rounded w-75">
            </div>
            <div class="w-75 mb-4 shadow p-3 rounded">
                <p>{{$exp->description}}</p>
            </div>
        </div>
        @endforeach

        </div>
        {{ $exps->links('pagination::bootstrap-4') }}
       </section>
    <script src="{{asset('assets/js/team.js')}}"></script>
@endsection