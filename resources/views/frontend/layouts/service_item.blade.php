@extends('frontend.master.master')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<link rel="stylesheet" href="{{asset('Frontend/assets/css/icon.css')}}">
<!-- <link rel="stylesheet" href="{{asset('Frontend/assets/css/service_item.css')}}">       -->
<div class="row mt-2   service-group-row"> 
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('room')}}">
            <span class="icon-room service_item "></span>
            <br>
            <span class="service_item_name"> Room</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('flat')}}">
            <span class="icon-flat service_item"></span>
            <br>
            <span class="service_item_name"> Flat</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('building')}}">
            <span class="icon-building service_item"></span>
            <br>
            <span class="service_item_name"> Building</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('parking')}}">
            <span class="icon-garage service_item"></span>
            <br>
            <span class="service_item_name"> Garage</span>
        </a>

    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('hotel')}}">
            <span class="icon-hotel service_item"></span>
            <br>
            <span class="service_item_name"> Hotel</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('hostel')}}">
            <span class="icon-hostel service_item"></span>
            <br>
            <span class="service_item_name"> Hostel</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('resort')}}">
            <span class="icon-resort service_item"></span>
            <br>
            <span class="service_item_name"> Resort</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('office')}}">
            <span class="icon-office service_item"></span>
            <br>
            <span class="service_item_name"> Office</span>
        </a>

    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('shop')}}">
            <span class="icon-shop service_item"></span>
            <br>
            <span class="service_item_name"> Shop</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('community_hall')}}">
            <span class="icon-community_hall service_item"></span>
            <br>
            <span class="service_item_name"> Community Hall</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('factory')}}">
            <span class="icon-factory service_item"></span>
            <br>
            <span class="service_item_name"> Factory</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('warehouse')}}">
            <span class="icon-warehouse service_item"></span>
            <br>
            <span class="service_item_name"> Warehouse</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('land')}}">
            <span class="icon-land service_item"></span>
            <br>
            <span class="service_item_name"> Land</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('pond')}}">
            <span class="icon-pond service_item"></span>
            <br>
            <span class="service_item_name"> Pond</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('ghat')}}">
            <span class="icon-ghat service_item"></span>
            <br>
            <span class="service_item_name"> Ghat</span>
        </a>
   
    
    
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('swimming_pool')}}">
            <span class="icon-swimming_pool service_item"></span>
            <br>
            <span class="service_item_name"> Swimming Pool</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('playground')}}">
            <span class="icon-camping service_item"></span>
            <br>
            <span class="service_item_name"> Camp Site</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('shooting_spot')}}">
            <span class="icon-shooting_spot service_item"></span>
            <br>
            <span class="service_item_name"> Shooting Spot</span>
        </a> 
        <a class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('picnic_spot')}}">
            <span class="icon-picnic-spot service_item"></span>
            <br>
            <span class="service_item_name"> Picnic Spot</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('exhibition_center')}}">
            <span class="icon-exhibition_center service_item"></span>
            <br>
            <span class="service_item_name"> Exhibition
                Center</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('rooftop')}}">
            <span class="icon-rooftop service_item"></span>
            <br>
            <span class="service_item_name"> Rooftop</span>
        </a>
    
        <a  class="  col-lg-3 col-md-3 col-small  me-2 pb-3 pt-3 mb-2 main-service text-center " href="{{route('bilboard')}}">
            <span class="icon-bilboard service_item"></span>
            <br>
            <span class="service_item_name"> Bilboard</span>
        </a>
 

</div>
@endsection