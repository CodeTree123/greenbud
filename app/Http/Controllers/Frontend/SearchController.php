<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Flat;
use App\Models\Rooftop;
use App\Models\Room;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class SearchController extends Controller
{
    function building_search(Request $request)
    {
        // Get the search value from the request

        $array = QueryBuilder::for(Building::class)
            ->allowedFilters(['thana', 'title', 'date', 'price', 'parking', 'gas', 'water', 'electricity', 'date', 'building_size', 'fire_exit'])
            ->get();

        // Return the search view with the resluts compacted

        return view('frontend.search.custom_building_search', compact('array'));
    }

    function flat_search(Request $request)
    {
        // Get the search value from the request
        $array = QueryBuilder::for(Flat::class)
            ->allowedFilters([
                'thana', 'address', 'date', 'price', 'attached_toilet', 'kitchen', 'ac', 'wifi', 'parking',
                'cable_tv', 'laundry', 'hot_water', 'gas', 'water', 'electricity', 'guest_count', 'lift', 'furnished', 'flat_size'
            ])
            ->get();

        // Return the search view with the resluts compacted

        return view('frontend.search.custom_flat_search', compact('array'));
    }


    function room_search(Request $request)
    {
        // dd($request->all());
        // Get the search value from the request
        $min_price = 0;
        $max_price = 0;
        $min_size = 0;
        $max_size = 0;
        if ($request->has('min_price')) {
            $min_price = $request->get('min_price');
        }

        if ($request->has('max_price')) {
            $max_price = $request->get('max_price');
        }

        //dd($max_price);
        if ($request->has('min_size')) {
            $min_size = $request->get('min_size');
        }

        if ($request->has('max_size')) {
            $max_size = $request->get('max_size');
        }


        $array = QueryBuilder::for(Room::class)
            ->allowedFilters([
                'address', 'date', 'price','guest_count', 'attached_toilet', 'ac','varanda', 'wifi', 'parking', 'room_size','cable_tv','hot_water','gas', 'water','lift','electricity',
                 'furnished','generator'
                 ])->get();


        // Return the search view with the resluts compacted


        if (($min_price) && ($max_price)) {
            $array->whereBetween('price', [$min_price, $max_price]);
        } elseif (!is_null($min_price)) {
            $array->where('price', '>=', $min_price);
        } elseif (!is_null($max_price)) {
            $array->where('price', '<=', $max_price);
        }

        //room_size

        if (($min_size) && ($max_size)) {
            $array->whereBetween('room_size', [$min_size, $max_size]);
        } elseif (!is_null($min_size)) {
            $array->where('room_size', '>=', $min_size);
        } elseif (!is_null($max_size)) {
            $array->where('room_size', '<=', $max_size);
        }

        // Return the search view with the resluts compacted

        return view('frontend.search.custom_room_search', compact('array'));
    }

    function hotel_search(Request $request)
    {
        // Get the search value from the request
        $array = QueryBuilder::for(Hotel::class)
            ->allowedFilters([
                'thana', 'date', 'price', 'attached_toilet', 'ac', 'wifi', 'parking',
                'cable_tv', 'laundry', 'hot_water', 'sports', 'dining', 'gym', 'fire_exit', 'lift', 'furnished', 'room_size'
            ])
            ->get();

        // Return the search view with the resluts compacted

        return view('frontend.search.custom_hotel_search', compact('array'));
    }
    function bilboard_search(Request $request)
    {
        // Get the search value from the request
        $array = QueryBuilder::for(Bilboard::class)
            ->allowedFilters(['thana', 'electricity', 'date', 'size', 'price'])
            ->get();

        // Return the search view with the resluts compacted

        return view('frontend.search.custom_bilboard_search', compact('array'));
    }


    function exibution_search()
    {

        $array = QueryBuilder::for(Exibution_Center::class)
            ->allowedFilters(['thana', 'date', 'price', 'fire_exit', 'lift', 'toilet', 'parking', 'room_size'])
            ->get();

        return view('frontend.search.custom_exibution_search', compact('array'));
    }

    function pond_search()
    {

        $array = QueryBuilder::for(Pond::class)
            ->allowedFilters(['thana', 'date', 'price', 'pond_area', 'size'])
            ->get();

        return view('frontend.search.custom_pond_search', compact('array'));
    }

    function warehouse_search()
    {
        $array = QueryBuilder::for(Warehouse::class)
            ->allowedFilters(['thana', 'date', 'price', 'floor_level', 'floor_size', 'ac', 'drainage_system', 'fire_safety', 'lift', 'parking', 'gas', 'water', 'electricity'])
            ->get();

        return view('frontend.search.custom_warehouse_search', compact('array'));
    }

    function swimmingpool_search()
    {
        $array = QueryBuilder::for(Swimming_Pool::class)
            ->allowedFilters(['thana', 'date', 'price', 'wifi', 'laundry', 'toilet', 'parking', 'shed', 'change_room', 'size'])
            ->get();

        return view('frontend.search.custom_swimmingpool_search', compact('array'));
    }

    function shop_search()
    {
        $array = QueryBuilder::for(Shop::class)
            ->allowedFilters(['thana', 'date', 'price', 'fire_exit', 'lift', 'gas', 'water', 'electricity', 'parking', 'floor_size'])
            ->get();

        return view('frontend.search.custom_shop_search', compact('array'));
    }

    function shootingspot_search()
    {

        $array = QueryBuilder::for(Shooting_Spot::class)
            ->allowedFilters([
                'thana', 'date', 'price', 'water', 'gas', 'electricity', 'toilet', 'lift', 'change_room',
                'parking', 'size', 'dining'
            ])
            ->get();

        return view('frontend.search.custom_shootingspot_search', compact('array'));
    }

    function ghat_search(Request $request)
    {
        // Get the search value from the request

        $array = QueryBuilder::for(Ghat::class)
            ->allowedFilters(['thana', 'date', 'toilet', 'price', 'parking'])
            ->get();

        // Return the search view with the resluts compacted

        return view('frontend.search.custom_ghat_search', compact('array'));
    }

    function picnic_search(Request $request)
    {
        // Get the search value from the request

        $array = QueryBuilder::for(Picnic_Spot::class)
            ->allowedFilters(['thana', 'date', 'title', 'price', 'shed', 'water', 'gas', 'electricity', 'dining', 'toilet', 'lift', 'parking'])
            ->get();

        // Return the search view with the resluts compacted

        return view('frontend.search.custom_picnic_search', compact('array'));
    }

    function rooftop_search()
    {

        $array = QueryBuilder::for(Rooftop::class)
            ->allowedFilters(['thana', 'date', 'price', 'toilet', 'lift', 'shed', 'parking', 'electricity', 'water', 'floor_area', 'p_protection'])
            ->get();

        return view('frontend.search.custom_rooftop_search', compact('array'));
    }

    function restaurant_search()
    {
        $array = QueryBuilder::for(Restaurant::class)
            ->allowedFilters([
                'thana', 'address', 'date', 'price', 'vehicle_type', 'wifi', 'attached_toilet', 'utilities', 'lift', 'furnished', 'hot_water',
                'laundry', 'ac', 'cable_tv', 'parking', 'dining', 'spa', 'gym', 'sports', 'swimmingpool', 'room_size'
            ])
            ->get();

        return view('frontend.search.custom_restaurant_search', compact('array'));
    }

    function playground_search()
    {

        $array = QueryBuilder::for(Play_ground::class)
            ->allowedFilters([
                'thana', 'date', 'price', 'shed', 'toilet', 'change_room', 'sports',
                'parking', 'gym', 'size'
            ])
            ->get();

        return view('frontend.search.custom_playground_search', compact('array'));
    }

    function office_search()
    {
        $array = QueryBuilder::for(Office::class)
            ->allowedFilters(['thana', 'price', 'date', 'fire_exit', 'lift', 'water', 'gas', 'electricity', 'parking', 'floor_size'])
            ->get();

        return view('frontend.search.custom_office_search', compact('array'));
    }

    function land_search()
    {

        $array = QueryBuilder::for(land::class)
            ->allowedFilters(['thana', 'date', 'size', 'price', 'land_area', 'electricity', 'gas', 'water', 'drainage_system', 'parking'])
            ->get();

        return view('frontend.search.custom_land_search', compact('array'));
    }

    function factory_search()
    {

        $array = QueryBuilder::for(Factory::class)
            ->allowedFilters(['thana', 'date', 'floor_size', 'ac', 'price', 'fire_safety', 'lift', 'parking', 'drainage_system', 'electricity', 'gas', 'water'])
            ->get();

        return view('frontend.search.custom_factory_search', compact('array'));
    }

    function community_search()
    {

        $array = QueryBuilder::for(Community_Center::class)
            ->allowedFilters(['thana', 'date', 'price', 'fire_safety', 'lift', 'ac', 'parking', 'electricity', 'water', 'gas', 'floor_size'])
            ->get();

        return view('frontend.search.custom_community_search', compact('array'));
    }

    function hostel_search(Request $request)
    {
        // Get the search value from the request

        $array = QueryBuilder::for(Hostel::class)
            ->allowedFilters([
                'thana', 'address', 'date', 'title', 'price', 'attached_toilet',
                'ac', 'wifi', 'parking', 'cable_tv', 'laundry', 'hot_water', 'furnished', 'room_size'
            ])
            ->get();

        // Return the search view with the resluts compacted

        return view('frontend.search.custom_hostel_search', compact('array'));
    }

    function parking_spot_search()
    {
        $array = QueryBuilder::for(Parking_Spot::class)
            ->allowedFilters(['address', 'price', 'vehicle_type', 'date'])
            ->get();
        return view('frontend.search.custom_parking_search', compact('array'));
    }
}
