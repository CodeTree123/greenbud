@if(Session::has('success'))
    <div class="d-flex justify-content-between align-items-center alert alert-success alert-dismissible fade show test" role="alert" >
        {{Session::get('success')}}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(Session::has('fail'))
    <div class="d-flex justify-content-between align-items-center alert alert-success alert-dismissible fade show test" role="alert">
        {{Session::get('fail')}}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
