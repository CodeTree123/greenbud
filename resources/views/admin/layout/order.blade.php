@extends('admin.admin_master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Order List</h1>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCatagory">
        Add Catagory
        </button> -->
    </div>

    @include('admin.include.errors')

    <table class="table text-center align-middle">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Order Number</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Moblie</th>
            <th scope="col">Customer Email</th>
            <th scope="col">Customer Address</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $key=>$order)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$order->id}}</td>
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->address}}</td>
            <td>
            @if($order->order_status == "1")
            <a class="btn btn-sm btn-success" href="{{route('ordre_status',[$order->id])}}" role="button">Confirm</a>
            @else
            <a class="btn btn-sm btn-danger" href="{{route('ordre_status',[$order->id])}}" role="button">Pending</a>
            @endif
            </td>
            <td>
            <button class="btn view_order" value="{{$order->id}}"> View Details</button>
            <button class="btn delete_order" value="{{$order->id}}">Cancel</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>


<!-- Modal for view Order -->
<div class="modal fade" id="viewOrder" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">View Order <span id="order_no"></span></h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table text-center align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Sub Total</th>
                    </tr>
                    </thead>
                    <tbody id="view">

                    </tbody>
                    <tfoot id="total">

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal for delete order -->
<div class="modal fade" id="DeleteOrder" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Order</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('order_delete')}}" method="post">
             @csrf
             @method('delete')
                <div class="mb-3 text-center">
                    <h5 class="text-danger">Are You Sure to Delete This Catagory?</h5>
                </div>
                <input type="text" class="form-control" id="del_order_id" name="deletingId">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes,Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

        $(document).on('click', '.view_order',function(){
            var order_id = $(this).val();
            $("#viewOrder").modal('show');
            $("#order_no").text(order_id);
            $.ajax({
                    type:"GET",
                    url: "/admin/product/order/view/"+order_id,
                    success: function(response){
                        // console.log(response.order);

                        $("#view").html("");
                        $.each(response.order, function (i,item){

                            $("#view").append('\
                                <tr>\
                                    <td>'+item.product_name+'</td>\
                                    <td><img src="/public/uploads/product/'+item.image+'" class="shop_image_view"></td>\
                                    <td>'+item.order_quantity+'</td>\
                                    <td>'+item.sub_total+'</td>\
                                </tr>\
                            ');
                        });
                        $("#total").html("");
                        $("#total").append('\
                            <tr>\
                                <td colspan="4" style="text-align:end">Sub Total</td>\
                                <td >'+response.subtotal+'</td>\
                            </tr>\
                            <tr>\
                                <td colspan="4" style="text-align:end">Total</td>\
                                <td >'+response.order_total+'</td>\
                            </tr>\
                        ');

                    }
                });
        });

        $(document).on('click', '.delete_order',function(){
            var deleteId = $(this).val();
            $("#DeleteOrder").modal('show');
            $('#del_order_id').val(deleteId);
        });

    });
</script>
@endpush
