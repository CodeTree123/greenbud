@extends('frontend.master')
@section('content')
    <div id="page-content">
        <!--MainContent-->
        <div id="MainContent" class="main-content" role="main">
            <div class="container">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
            
                <div class="tabs-listing">
                    <ul class="nav nav-tabs product-tabs mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link tablink {{request()->is('profile') ? 'active' : ''}}" href="{{url('/profile')}}" role="tab" aria-controls="pills-home" aria-selected="true">Profile Information </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tablink {{request()->is('change_password') ? 'active' : ''}}" href="{{url('/change_password')}}" role="tab" aria-controls="pills-profile" aria-selected="false">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tablink {{request()->is('my_order') ? 'active' : ''}}" href="{{url('/my_order')}}" role="tab" aria-controls="pills-contact" aria-selected="false">View My Order</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane {{request()->is('profile') ? 'active' : ''}}" id="{{url('/profile')}}" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div  class=" ">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <td>{{$user->first_name." ".$user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Email</th>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Phone</th>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane {{request()->is('change_password') ? 'active' : ''}}" id="{{url('/change_password')}}" role="tabpanel" aria-labelledby="pills-profile-tab">
                       <div class="contact-form  pt-0">
                            <div class="container">
                            <form method="post" action="{{route('change_password')}}" id="new-review-form" class="new-review-form">
                        @csrf
                            <input type="hidden" class="form-control" name="user_id" value="{{$user->id}}">
                            <div class="my-3 ">
                                <label class="spr-form-label" for="old_password">Old Password</label>
                                <input class="spr-form-input spr-form-input-text " id="old_password" type="password" name="old_pass" value="" placeholder="Enter Your Old Password">
                                <span class="text-danger mt-3">@error('old_pass') {{$message}} @enderror</span>
                            </div>
                            <div class="my-3 ">
                                <label class="spr-form-label" for="new_password">New Password</label>
                                <input class="spr-form-input spr-form-input-text " id="new_password" type="password" name="new_pass" value="" placeholder="Enter Your New Password">
                                <span class="text-danger mt-3">@error('new_pass') {{$message}} @enderror</span>
                            </div>
                            <div class="my-3 ">
                                <label class="spr-form-label" for="confirm_new_password">Confirm New Password</label>
                                <input class="spr-form-input spr-form-input-text " id="confirm_new_password" type="password" name="cnew_pass" value="" placeholder="Enter Your Confirm New Password">
                                <span class="text-danger mt-3">@error('cnew_pass') {{$message}} @enderror</span>
                            </div>

                            <input type="submit" class=" btn btn-primary text-white" value="Confirm">
                        </form>
                            </div>
                       </div>
                    </div>
                    <div class="tab-pane {{request()->is('my_order') ? 'active' : ''}}" id="{{url('/my_order')}}" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="wishlist-table table-content table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="product-price text-center alt-font">Order No.</th>
                                                <th class="stock-status text-center alt-font">Order Status</th>
                                                <th class="product-subtotal text-center alt-font">Details</th>
                                                <th class="product-subtotal text-center alt-font">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td class="product-price text-center"><span class="amount">{{$order->id}}</span></td>
                                                <td class="stock text-center">
                                                    @if($order->order_status == 0)
                                                    <span class="">Peinding</span>
                                                    @else
                                                    <span class="">Delivered</span>
                                                    @endif
                                                </td>
                                                <td class="product-subtotal text-center">
                                                    <button type="button" class="btn btn-small view_order" value="{{$order->id}}">View</button>
                                                </td>
                                                <td class="product-subtotal text-center">
                                                    <button type="button" class="btn btn-small delete_order" value="{{$order->id}}" {{$order->order_status == 0 ? '' :'disabled'}}>Cancel</button>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                            </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!-- Modal for view Order -->
<div class="modal fade" id="viewOrder" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">View Order <span id="order_no"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table text-center align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Product</th>
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
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Modal for delete order -->
<div class="modal fade" id="DeleteOrder" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('my_order_delete')}}" method="post">
             @csrf
             @method('delete')
                <div class="mb-3 text-center">
                    <h5 class="text-danger">Are You Sure to Delete This Order?</h5>
                </div>
                <input type="text" class="form-control" id="del_order_id" name="deletingId">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes,Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('script')    
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
                    url: "/product/order/view/"+order_id,
                    success: function(response){
                        console.log("hello");

                        $("#view").html("");
                        $.each(response.order, function (i,item){

                            $("#view").append('\
                                <tr>\
                                    <td>'+item.product_name+'</td>\
                                    <td><img src="public/uploads/product/'+item.image+'" class="shop_image_view" width="200"></td>\
                                    <td>'+item.order_quantity+'</td>\
                                    <td>'+item.sub_total+'</td>\
                                </tr>\
                            ');
                        });
                        $("#total").html("");
                        $("#total").append('\
                            <tr>\
                                <td colspan="3" style="text-align:end">Sub Total</td>\
                                <td >'+response.subtotal+'</td>\
                            </tr>\
                            <tr>\
                                <td colspan="3" style="text-align:end">Total</td>\
                                <td >'+response.subtotal+'</td>\
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