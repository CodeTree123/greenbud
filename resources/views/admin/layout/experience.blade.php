@extends('admin.admin_master')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Experiences</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCatagory">
        Add Experience
    </button>
</div>

@include('admin.include.errors')

<table class="table text-center table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach($experiences as $key=>$exp)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <img src="{{asset('public/uploads/experiences/'.$exp->image)}}" alt="" srcset="" width="100" height="100">
            </td>
            <td>{{$exp->description}}</td>
            <td>
                <button class="btn update_cat" value="{{$exp->id}}">Update</button>
                <button class="btn delete_cat" value="{{$exp->id}}">delete</button>
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
                <h5 class="modal-title" id="staticBackdropLabel">Add Experience</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('add_exp')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exp" class="form-label">Image </label>
                        <input type="file" class="form-control" id="exp" name="image" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exp_des" class="form-label">Description </label>
                        <textarea type="text" class="form-control" id="exp_des" name="description" aria-describedby="emailHelp"></textarea>
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
                <h5 class="modal-title" id="staticBackdropLabel">Update Experience</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('exp_update')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <input type="hidden" class="form-control" name="exp_id" value="" id="exp_id">
                    <div class="mb-3">
                        <label for="u_exp" class="form-label">Image </label>
                        <input type="file" class="form-control" id="u_exp" name="image" aria-describedby="emailHelp">
                       <div id="exp_image">

                       </div>
                    </div>
                    <div class="mb-3">
                        <label for="u_description" class="form-label">Description </label>
                        <textarea type="text" class="form-control" id="u_description" name="u_description" rows="5"></textarea>
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
                <h5 class="modal-title-center" id="staticBackdropLabel">Delete Experience</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('exp_delete')}}" method="post">
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
            var exp_id = $(this).val();
            $("#UpdateCatagory").modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/experience/edit/" + exp_id,
                success: function(response) {
                    // console.log(response.cat);
                    $('#exp_id').val(exp_id);
                    $('#u_description').val(response.exp.description);
                    $('#exp_image').html("");
                    $('#exp_image').append('\
                    <img class="mt-3" src="/public/uploads/experiences/'+response.exp.image+'" width="100" height="100">\
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
