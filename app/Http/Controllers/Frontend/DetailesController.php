<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Flat;
use App\Models\Parking_Spot;
use App\Models\Hostel;
use App\Models\Office;
use App\Models\Land;
use App\Models\Community_Center;
use App\Models\Shooting_Spot;
use App\Models\Shop;
use App\Models\Factory;
use App\Models\Warehouse;
use App\Models\Pond;
use App\Models\Swimming_Pool;
use App\Models\Bilboard;
use App\Models\Rooftop;
use App\Models\Restaurant;
use App\Models\Exibution_Center;
use App\Models\Play_ground;
use App\Models\Building;
use App\Models\Ghat;
use App\Models\Picnic_Spot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailesController extends Controller
{
    function room_details($id)
    {
        $list = Room::findOrFail($id);
        return view('frontend.details.single_room_list', compact('list'));
    }
    function building_details($id)
    {
        $list = Building::findOrFail($id);
        return view('frontend.details.single_building_list', compact('list'));
    }
    function picnic_details($id)
    {
        $list = Picnic_spot::findOrFail($id);
        return view('frontend.details.single_picnic_list', compact('list'));
    }
    function ghat_details($id)
    {
        $list = Ghat::findOrFail($id);
        return view('frontend.details.single_ghat_list', compact('list'));
    }
    function hotel_details($id)
    {
        $list = Hotel::findOrFail($id);
        return view('frontend.details.single_hotel_list', compact('list'));
    }
    function flat_details($id)
    {
        $list = Flat::findOrFail($id);
        return view('frontend.details.single_flat_list', compact('list'));
    }
    function parking_details($id)
    {
        $list = Parking_Spot::findOrFail($id);
        return view('frontend.details.single_parking_list', compact('list'));
    }
    function office_details($id)
    {
        $list = Office::findOrFail($id);
        return view('frontend.details.single_office_list', compact('list'));
    }
    function community_details($id)
    {
        $list = Community_Center::findOrFail($id);
        return view('frontend.details.single_community_list', compact('list'));
    }
    function factory_details($id)
    {
        $list = Factory::findOrFail($id);
        return view('frontend.details.single_factory_list', compact('list'));
    }
    function hostel_details($id)
    {
        $list = Hostel::findOrFail($id);
        return view('frontend.details.single_hostel_list', compact('list'));
    }
    function land_details($id)
    {
        $list = Land::findOrFail($id);
        return view('frontend.details.single_land_list', compact('list'));
    }
    function playground_details($id)
    {
        $list = Play_ground::findOrFail($id);
        return view('frontend.details.single_playground_list', compact('list'));
    }
    function restaurant_details($id)
    {
        $list = Restaurant::findOrFail($id);
        return view('frontend.details.single_restaurant_list', compact('list'));
    }
    function rooftop_details($id)
    {
        $list = Rooftop::findOrFail($id);
        return view('frontend.details.single_rooftop_list', compact('list'));
    }
    function shooting_details($id)
    {
        $list = Shooting_Spot::findOrFail($id);
        return view('frontend.details.single_shooting_list', compact('list'));
    }
    function shop_details($id)
    {
        $list = Shop::findOrFail($id);
        return view('frontend.details.single_shop_list', compact('list'));
    }
    function swimmingpool_details($id)
    {
        $list = Swimming_Pool::findOrFail($id);
        return view('frontend.details.single_swimmingpool_list', compact('list'));
    }
    function warehouse_details($id)
    {
        $list = Warehouse::findOrFail($id);
        return view('frontend.details.single_warehouse_list', compact('list'));
    }
    function bilboard_details($id)
    {
        $list = Bilboard::findOrFail($id);
        return view('frontend.details.single_bilboard_list', compact('list'));
    }

    function pond_details($id)
    {
        $list = Pond::findOrFail($id);
        return view('frontend.details.single_pond_list', compact('list'));
    }
    function exibution_details($id)
    {
        $list = Exibution_Center::findOrFail($id);
        return view('frontend.details.single_exibution_list', compact('list'));
    }

    //post edit methode

    public function user_room_edit($id)
    {
        $list = Room::findOrFail($id);
        return view('frontend.update.update_room_list', compact('list'));
    }
    public function user_bilboard_edit($id)
    {
        $list = Bilboard::findOrFail($id);
        return view('frontend.update.update_bilboard_list', compact('list'));
    }
    public function user_building_edit($id)
    {
        $list = Building::findOrFail($id);
        return view('frontend.update.update_building_list', compact('list'));
    }
    public function user_community_edit($id)
    {
        $list = Community_Center::findOrFail($id);
        return view('frontend.update.update_community_list', compact('list'));
    }
    public function user_exhibution_edit($id)
    {
        $list = Exibution_Center::findOrFail($id);
        return view('frontend.update.update_exhibution_list', compact('list'));
    }
    public function user_factory_edit($id)
    {
        $list = Factory::findOrFail($id);
        return view('frontend.update.update_factory_list', compact('list'));
    }
    public function user_flat_edit($id)
    {
        $list = Flat::findOrFail($id);
        return view('frontend.update.update_flat_list', compact('list'));
    }
    public function user_hostel_edit($id)
    {
        $list = Hostel::findOrFail($id);
        return view('frontend.update.update_hostel_list', compact('list'));
    }
    public function user_hotel_edit($id)
    {
        $list = Hotel::findOrFail($id);
        return view('frontend.update.update_hotel_list', compact('list'));
    }
    public function user_office_edit($id)
    {
        $list = Office::findOrFail($id);
        return view('frontend.update.update_office_list', compact('list'));
    }
    public function user_playground_edit($id)
    {
        $list = Play_ground::findOrFail($id);
        return view('frontend.update.update_playground_list', compact('list'));
    }
    public function user_pond_edit($id)
    {
        $list = Pond::findOrFail($id);
        return view('frontend.update.update_pond_list', compact('list'));
    }
    public function user_resort_edit($id)
    {
        $list = Restaurant::findOrFail($id);
        return view('frontend.update.update_resort_list', compact('list'));
    }
    public function user_rooftop_edit($id)
    {
        $list = Rooftop::findOrFail($id);
        return view('frontend.update.update_rooftop_list', compact('list'));
    }
    public function user_shooting_edit($id)
    {
        $list = Shooting_Spot::findOrFail($id);
        return view('frontend.update.update_shooting_list', compact('list'));
    }
    public function user_shop_edit($id)
    {
        $list = Shop::findOrFail($id);
        return view('frontend.update.update_shop_list', compact('list'));
    }
    public function user_swimming_edit($id)
    {
        $list = Swimming_Pool::findOrFail($id);
        return view('frontend.update.update_swimming_list', compact('list'));
    }
    public function user_land_edit($id)
    {
        $list = Land::findOrFail($id);
        return view('frontend.update.update_land_list', compact('list'));
    }
    public function user_warehouse_edit($id)
    {
        $list = Warehouse::findOrFail($id);
        return view('frontend.update.update_warehouse_list', compact('list'));
    }
    public function user_parking_edit($id)
    {
        $list = Parking_Spot::findOrFail($id);
        return view('frontend.update.update_parking_list', compact('list'));
    }
    public function user_picnic_edit($id)
    {
        $list = Parking_Spot::findOrFail($id);
        return view('frontend.update.update_picnic_list', compact('list'));
    }
    public function user_ghat_edit($id)
    {
        $list = Parking_Spot::findOrFail($id);
        return view('frontend.update.update_ghat_list', compact('list'));
    }
}
