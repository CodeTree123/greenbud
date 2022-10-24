@extends('admin.admin_master')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Experiences</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCatagory">
        Add Team Member
    </button>
</div>

@include('admin.include.errors')

<table class="table text-center table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Education Qualification</th>
            <th scope="col">Designation</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach($teams as $key=>$team)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <img src="{{asset('public/uploads/teams/'.$team->image)}}" alt="" srcset="" width="100" height="100">
            </td>
            <td>{{$team->name}}</td>
            <td>{{$team->qualification}}</td>
            <td>{{$team->designation}}</td>
            <td>
                <button class="btn update_cat" value="{{$team->id}}">Update</button>
                <button class="btn delete_cat" value="{{$team->id}}">delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- Modal for add catagory -->
<div class="modal fade" id="AddCatagory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Team Member</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('add_team')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="team_name" class="form-label">Name </label>
                        <input type="text" class="form-control" id="team_name" name="name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="team_qualified" class="form-label">Qualification </label>
                        <input type="text" class="form-control" id="team_qualified" name="qualification" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="team_des" class="form-label">Designation </label>
                        <input type="text" class="form-control" id="team_des" name="designation" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="team" class="form-label">Image </label>
                        <input type="file" class="form-control" id="team" name="image" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for update catagory -->
<div class="modal fade" id="UpdateCatagory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Team Member</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('team_update')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <input type="hidden" class="form-control" name="team_id" value="" id="team_id">
                    <div class="mb-3">
                        <label for="u_name" class="form-label">Name </label>
                        <input type="text" class="form-control" id="u_name" name="u_name">
                    </div>
                    <div class="mb-3">
                        <label for="u_qualification" class="form-label">Qualification </label>
                        <input type="text" class="form-control" id="u_qualification" name="u_qualification">
                    </div>
                    <div class="mb-3">
                        <label for="u_designation" class="form-label">Designation </label>
                        <input type="text" class="form-control" id="u_designation" name="u_designation">
                    </div>
                    <div class="mb-3">
                        <label for="u_team" class="form-label">Image </label>
                        <input type="file" class="form-control" id="u_team" name="image" aria-describedby="emailHelp">
                        <div id="team_image">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal for delete catagory -->
<div class="modal fade" id="DeleteCatagory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-center" id="staticBackdropLabel">Delete Team Member</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('team_delete')}}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" class="form-control" id="del_cat_id" name="deletingId">
                <div class="mb-3 text-center">
                    <h5 class="text-danger">Are You Sure ?</h5>
                </div>
                <div class="modal-footer text-center ">
                    <button type="submit" class="btn btn-success ">Confirm</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@push('custom-scripts')
<script>
    $(document).ready(function() {

        window.setTimeout(function() {
            $(".test").alert('close');
        }, 2000);

        $(document).on('click', '.update_cat', function() {
            var team_id = $(this).val();
            $("#UpdateCatagory").modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/team/edit/" + team_id,
                success: function(response) {
                    // console.log(response.cat);
                    $('#team_id').val(team_id);
                    $('#u_name').val(response.team.name);
                    $('#u_qualification').val(response.team.qualification);
                    $('#u_designation').val(response.team.designation);
                    $('#team_image').html("");
                    $('#team_image').append('\
                    <img class="mt-3" src="/public/uploads/teams/' + response.team.image + '" width="100" height="100">\
                    ');
                }
            });
        });

        $(document).on('click', '.delete_cat', function() {
            var deleteId = $(this).val();
            $("#DeleteCatagory").modal('show');
            $('#del_cat_id').val(deleteId);
        });

    });
</script>
@endpush