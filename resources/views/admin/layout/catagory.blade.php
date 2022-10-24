@extends('admin.admin_master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Catagory</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCatagory">
        Add Catagory
        </button>
    </div>

    @include('admin.include.errors')

    <table class="table text-center align-middle">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Catagory Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($catagories as $key=>$cat)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$cat->catagory_name}}</td>
      <td>
        @if($cat->catstatus == "1")
        <a class="btn btn-sm btn-success" href="{{route('catagory_status',[$cat->id])}}" role="button">Active</a>
        @else
        <a class="btn btn-sm btn-danger" href="{{route('catagory_status',[$cat->id])}}" role="button">Inactive</a>
        @endif
      </td>
      <td>
        <button class="btn update_cat" value="{{$cat->id}}">Update</button>
        <button class="btn delete_cat" value="{{$cat->id}}">delete</button>
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
                <h5 class="modal-title" id="staticBackdropLabel">Add Catagory</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('catagory_add')}}" method="post" enctype="multipart/form-data">
             @csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="c_status" value="1">
                    <div class="mb-3">
                        <label for="catagory" class="form-label">Catagory Name</label>
                        <input type="text" class="form-control" id="catagory" name="catagory_name" aria-describedby="emailHelp">
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
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Catagory</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('catagory_update')}}" method="post" enctype="multipart/form-data">
             @csrf
             @method('PUT')
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="catagory_id" value="" id="catagory_id">
                    <div class="mb-3">
                        <label for="ucatagory_name" class="form-label">Catagory Name</label>
                        <input type="text" class="form-control" id="ucatagory_name" name="catagory_name" aria-describedby="emailHelp">
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
                <h5 class="modal-title-center" id="staticBackdropLabel">Delete Catagory</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('catagory_delete')}}" method="post">
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
    $(document).ready(function(){

        window.setTimeout(function(){
            $(".test").alert('close');
        },2000);

        $(document).on('click', '.update_cat',function(){
            var update_id = $(this).val();
            $("#UpdateCatagory").modal('show');
            $.ajax({
                    type:"GET",
                    url: "/admin/catagory/edit/"+update_id,
                    success: function(response){
                        // console.log(response.cat);
                        $('#catagory_id').val(update_id);
                        $('#ucatagory_name').val(response.cat.catagory_name);
                    }
                });
        });

        $(document).on('click', '.delete_cat',function(){
            var deleteId = $(this).val();
            $("#DeleteCatagory").modal('show');
            $('#del_cat_id').val(deleteId);
        });

    });
</script>
@endpush
