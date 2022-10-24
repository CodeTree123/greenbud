@extends('admin.admin_master')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Product</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddProduct">
        Add Product
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
                <th scope="col">Price</th>
                <th scope="col">Catalog</th>
                <th scope="col">Images</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key=>$product)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$product->product_name}}</td>
                <td>{{$product->category->catagory_name}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <img src="{{url('/public/uploads/product/'.$product->catalog_image)}}" alt="" width="30%">
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary v_image" value="{{$product->id}}">
                        View
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-info v_description" value="{{$product->id}}">
                        View
                    </button>
                </td>
                <td>
                    @if($product->prostatus == "1")
                    <a class="btn btn-sm btn-success" href="{{route('product_status',[$product->id])}}" role="button">Active</a>
                    @else
                    <a class="btn btn-sm btn-danger" href="{{route('product_status',[$product->id])}}" role="button">Inactive</a>
                    @endif
                </td>
                <td style="min-width:270px">
                    <button class="btn update_product" value="{{$product->id}}">Update</button>
                    <button class="btn delete_product" value="{{$product->id}}">delete</button>
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
                <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('product_add')}}" method="post" enctype="multipart/form-data">
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
                        <label for="product" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product" name="product_name" aria-describedby="emailHelp">
                    </div>



                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Catalog Image</label>
                        <input class="form-control" type="file" id="formFile" name="catalog_image">
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Main Image</label>
                        <input class="form-control" type="file" id="formFile" name="product_image">
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Other Images</label>
                        <input class="form-control" type="file" id="formFile" name="images[]" multiple>
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
                <h5 class="modal-title" id="staticBackdropLabel">Update Product</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('product_update')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="product_id" value="" id="product_id">
                    <div class="mb-3">
                        <label for="u_cat_id" class="form-label">Select Catagory Name</label>
                        <select class="form-select" aria-label="Default select example" name="u_cat_id" id="u_cat_id" value="">
                            @foreach($catagories as $catagory)
                            <option value="{{$catagory->id}}">{{$catagory->catagory_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="u_product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="u_product_name" name="u_product_name" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="u_description" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="u_description" name="u_description" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="u_price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="u_price" name="u_price">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Catalog Image</label>
                        <input class="form-control" type="file" id="formFile" name="catalog_image">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Main Image</label>
                        <input class="form-control" type="file" id="formFile" name="product_image">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Other Images</label>
                        <input class="form-control" type="file" id="formFile" name="images[]" multiple>
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
            <form action="{{route('product_delete')}}" method="post">
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
            <div class="modal-body">
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

                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, fuga. Dolor pariatur fuga perferendis dolorem tenetur nisi, optio eveniet vero obcaecati. Sint debitis totam sequi sunt provident saepe minima deleniti doloribus ipsam soluta pariatur quas nisi, aliquid hic error, autem quam molestias sapiente quod impedit maxime repudiandae quae tenetur quisquam. Libero quam doloremque expedita ex aspernatur voluptas. Ea quibusdam rem nostrum excepturi facilis consequatur ullam dignissimos ipsa eum, saepe ipsum accusantium possimus velit quod quas mollitia nobis nihil dolorem veniam aliquam. Illo quia repellendus dignissimos tempora eligendi, libero dolore amet cum fugit odit impedit? Vero sed veritatis dolore fuga similique?

            </div>
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

        $(document).on('click', '.update_product', function() {
            var update_id = $(this).val();
            $("#UpdateProduct").modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/product/edit/" + update_id,
                success: function(response) {
                    // console.log(response.serv);
                    $('#product_id').val(update_id);
                    $('#u_cat_id').val(response.pro.cat_id);
                    $('#u_product_name').val(response.pro.product_name);
                    $('#u_description').val(response.pro.description);
                    $('#u_price').val(response.pro.price);
                }
            });
        });

        $(document).on('click', '.delete_product', function() {
            var deleteId = $(this).val();
            $("#DeleteProduct").modal('show');
            $('#del_pro_id').val(deleteId);
        });


        $(document).on('click', '.v_image', function() {
            var proId = $(this).val();
            $("#view_image_modal").modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/product/image/" + proId,
                success: function(response) {
                    // console.log(response.all_image);

                    $("#test").html("");
                    $.each(response.all_image, function(i, item) {

                        $("#test").append('\
                                    <div class="col-3">\
                                        <img class="logo mx-auto" src="/public/uploads/product/' + item + '" alt="" width="100%">\
                                    </div>\
                            ');
                    });
                }
            });
        });

        $(document).on('click', '.v_description', function() {
            var proId = $(this).val();
            $("#view_product_description").modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/product/description/" + proId,
                success: function(response) {
                    // console.log(response.des);

                    $("#test2").html("");

                    $("#test2").append('\
                                <p>' + response.des + '</p>\
                        ');
                }
            });
        });

    });
</script>
@endpush
