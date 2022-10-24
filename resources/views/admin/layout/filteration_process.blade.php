@extends('admin.admin_master')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Filteration Processing Stage</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddProduct">
        Add Process
        </button>
    </div>

   @include('admin.include.errors')

    <div class="table-responsive table-responsive-xl table-responsive-lg table-responsive-md table-responsive-sm">
        <table class="table text-center align-middle">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Catagory Name</th>
                <th scope="col">Stages</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($filter_processes as $key=>$process)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$process->product->product_name}}</td>
                    <td>{{$process->category->catagory_name}}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info v_description" value="{{$process->id}}">
                        View
                        </button>
                    </td>
                    <td style="min-width:270px">
                        <button class="btn update_product" value="{{$process->id}}">Update</button>
                        <button class="btn delete_product" value="{{$process->id}}">delete</button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

<!-- Modal for add Product -->
<div class="modal fade" id="AddProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Filteration Stage</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('filter')}}" method="post" >
             @csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="p_status" value="1">
                    <div class="mb-3">
                      <label for="catagory" class="form-label">Select Catagory Name</label>
                      <select class="form-select" aria-label="Default select example" name="cat_id" id="catagory">
                        @foreach($catagories as $catagory)
                        <option value="{{$catagory->id}}">{{$catagory->catagory_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                        <label for="product" class="form-label">Select Product Name</label>
                        <select class="form-select" aria-label="Default select example" name="product_id" id="product">
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Stage-1" class="form-label">Stage-1</label>
                        <textarea type="text" class="form-control" id="Stage-1" name="Stage_1" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Stage-2" class="form-label">Stage-2</label>
                        <textarea type="text" class="form-control" id="Stage-2" name="Stage_2" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Stage-3" class="form-label">Stage-3</label>
                        <textarea type="text" class="form-control" id="Stage-3" name="Stage_3" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Stage-4" class="form-label">Stage-4</label>
                        <textarea type="text" class="form-control" id="Stage_4" name="Stage_4" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Stage-5" class="form-label">Stage-5</label>
                        <textarea type="text" class="form-control" id="Stage-5" name="Stage_5" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Stage-6" class="form-label">Stage-6</label>
                        <textarea type="text" class="form-control" id="Stage-6" name="Stage_6" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Stage-7" class="form-label">Stage-7</label>
                        <textarea type="text" class="form-control" id="Stage-7" name="Stage_7" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Stage-8" class="form-label">Stage-8</label>
                        <textarea type="text" class="form-control" id="Stage-8" name="Stage_8" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Stage-9" class="form-label">Stage-9</label>
                        <textarea type="text" class="form-control" id="Stage-9" name="Stage_9" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Stage-10" class="form-label">Stage-10</label>
                        <textarea type="text" class="form-control" id="Stage-10" name="Stage_10" rows="5"></textarea>
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

<!-- Modal for update service -->
<div class="modal fade" id="UpdateProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update filteration process Stage</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('filteraion_update')}}" method="post" >
             @csrf
             @method('PUT')
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="process_id" value="" id="process_id">
                    <div class="mb-3">
                      <label for="u_cat_id" class="form-label">Select Catagory Name</label>
                      <select class="form-select" aria-label="Default select example" name="u_cat_id" id="u_cat_id" value="">
                        @foreach($catagories as $catagory)
                        <option value="{{$catagory->id}}">{{$catagory->catagory_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                        <label for="u_product_id" class="form-label">Product Name</label>
                        <select class="form-select" aria-label="Default select example" name="u_product_id" id="u_product_id" value="">
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="mb-3">
                        <label for="u_Stage_1" class="form-label">Stage-1</label>
                        <textarea type="text" class="form-control" id="u_Stage_1" name="u_Stage_1" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="u_Stage_2" class="form-label">Stage-2</label>
                        <textarea type="text" class="form-control" id="u_Stage_2" name="u_Stage_2" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="u_Stage_3" class="form-label">Stage-3</label>
                        <textarea type="text" class="form-control" id="u_Stage_3" name="u_Stage_3" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="u_Stage_4" class="form-label">Stage-4</label>
                        <textarea type="text" class="form-control" id="u_Stage_4" name="u_Stage_4" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="u_Stage_5" class="form-label">Stage-5</label>
                        <textarea type="text" class="form-control" id="u_Stage_5" name="u_Stage_5" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="u_Stage_6" class="form-label">Stage-6</label>
                        <textarea type="text" class="form-control" id="u_Stage_6" name="u_Stage_6" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="u_Stage_7" class="form-label">Stage-7</label>
                        <textarea type="text" class="form-control" id="u_Stage_7" name="u_Stage_7" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="u_Stage_8" class="form-label">Stage-8</label>
                        <textarea type="text" class="form-control" id="u_Stage_8" name="u_Stage_8" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="u_Stage_9" class="form-label">Stage-9</label>
                        <textarea type="text" class="form-control" id="u_Stage_9" name="u_Stage_9" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="u_Stage_10" class="form-label">Stage-10</label>
                        <textarea type="text" class="form-control" id="u_Stage_10" name="u_Stage_10" rows="5"></textarea>
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

<!-- Modal for delete service -->
<div class="modal fade" id="DeleteProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('process_delete')}}" method="post">
             @csrf
             @method('delete')
                <div class="mb-3 text-center">
                    <h5 class="text-danger">Are You Sure to Delete This Service?</h5>
                </div>
                <input type="hidden" class="form-control" id="del_pro_id" name="deletingId">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes,Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- Modal to View Images of Product -->
<div class="modal fade" id="view_image_modal" tabindex="-1" aria-labelledby="view_image_modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="view_image_modal">Product Images</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <div class="row" id="test">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal to View Description of Product -->
<div class="modal fade" id="view_product_description" tabindex="-1" aria-labelledby="view_product_description" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="view_product_description">Product Description</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="test2">

            </div>
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

        $(document).on('click', '.update_product',function(){
            var update_id = $(this).val();
            $("#UpdateProduct").modal('show');
            $.ajax({
                    type:"GET",
                    url: "/admin/product/filteraion/edit/"+update_id,
                    success: function(response){
                        console.log(response.serv);
                        $('#process_id').val(update_id);
                        $('#u_cat_id').val(response.serv.cat_id);
                        $('#u_product_id').val(response.serv.product_id);
                        $('#u_Stage_1').val(response.serv.Stage_1);
                        $('#u_Stage_2').val(response.serv.Stage_2);
                        $('#u_Stage_3').val(response.serv.Stage_3);
                        $('#u_Stage_4').val(response.serv.Stage_4);
                        $('#u_Stage_5').val(response.serv.Stage_5);
                        $('#u_Stage_6').val(response.serv.Stage_6);
                        $('#u_Stage_7').val(response.serv.Stage_7);
                        $('#u_Stage_8').val(response.serv.Stage_8);
                        $('#u_Stage_9').val(response.serv.Stage_9);
                        $('#u_Stage_10').val(response.serv.Stage_10);

                    }
                });
        });

        $(document).on('click', '.delete_product',function(){
            var deleteId = $(this).val();
            $("#DeleteProduct").modal('show');
            $('#del_pro_id').val(deleteId);
        });


        $(document).on('click', '.v_description',function(){
            var proId = $(this).val();
            $("#view_product_description").modal('show');
            $.ajax({
                    type:"GET",
                    url: "/admin/product/filteraion/"+proId,
                    success: function(response){
                        // console.log(response.des);

                        $("#test2").html("");

                        $("#test2").append('\
                                <p>Stage 1: '+response.des.Stage_1+'</p>\
                                <p>Stage 2: '+response.des.Stage_2+'</p>\
                                <p>Stage 3: '+response.des.Stage_3+'</p>\
                                <p>Stage 4: '+response.des.Stage_4+'</p>\
                                <p>Stage 5: '+response.des.Stage_5+'</p>\
                                <p>Stage 6: '+response.des.Stage_6+'</p>\
                                <p>Stage 7: '+response.des.Stage_7+'</p>\
                                <p>Stage 8: '+response.des.Stage_8+'</p>\
                                <p>Stage 9: '+response.des.Stage_9+'</p>\
                                <p>Stage 10: '+response.des.Stage_10+'</p>\
                        ');
                    }
                });
        });

    });
</script>
@endpush
