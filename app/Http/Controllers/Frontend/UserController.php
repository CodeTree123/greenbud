<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Building;
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
use App\Models\Payment;
use App\Models\Advertise;
use App\Models\Ghat;
use App\Models\Picnic_Spot;
use Image;
class UserController extends Controller
{
    function index()
    {
        return view('frontend.layouts.service_item');
    }
    function registration()
    {
        return view('frontend.layouts.registration');
    }
    function single_header_added()
    {
        return view('frontend.layouts.single_header_added');
    }
    function header()
    {
        return view('frontend.layouts.header');
    }
    function footer()
    {
        return view('frontend.layouts.footer');
    }
    function faq()
    {
        return view('frontend.layouts.faq');
    }
    function report_contact_us()
    {
        return view('frontend.layouts.report_contact_us');
    }

    function profile()
    {
        $payments = Payment::where('user_id', auth()->id())->get();
        $users = User::where('id', auth()->id())->get();
        $rooms = Room::where('user_id', auth()->id())->get();
        $flats = Flat::where('user_id', auth()->id())->get();
        $buildings = Building::where('user_id', auth()->id())->get();
        $parkings = Parking_Spot::where('user_id', auth()->id())->get();
        $hostels = Hostel::where('user_id', auth()->id())->get();
        $hotels = Hotel::where('user_id', auth()->id())->get();
        $retaurants = Restaurant::where('user_id', auth()->id())->get();
        $offices = Office::where('user_id', auth()->id())->get();
        $shops = Shop::where('user_id', auth()->id())->get();
        $communities = Community_Center::where('user_id', auth()->id())->get();
        $factories = Factory::where('user_id', auth()->id())->get();
        $warehouses = Warehouse::where('user_id', auth()->id())->get();
        $lands = Land::where('user_id', auth()->id())->get();
        $ponds = Pond::where('user_id', auth()->id())->get();
        $ghats = Ghat::where('user_id', auth()->id())->get();
        $swimmings = Swimming_Pool::where('user_id', auth()->id())->get();
        $playgrounds = Play_ground::where('user_id', auth()->id())->get();
        $shootings = Shooting_Spot::where('user_id', auth()->id())->get();
        $picnics = Picnic_Spot::where('user_id', auth()->id())->get();
        $exibutions = Exibution_Center::where('user_id', auth()->id())->get();
        $rooftops = Rooftop::where('user_id', auth()->id())->get();
        $bilboards = Bilboard::where('user_id', auth()->id())->get();


        return view('frontend.layouts.profile', compact('users', 'rooms', 'bilboards', 'ghats', 'buildings', 'communities', 'exibutions', 'factories', 'flats', 'hostels', 'hotels', 'offices', 'playgrounds', 'ponds', 'retaurants', 'rooftops', 'shootings', 'shops', 'swimmings', 'lands', 'warehouses', 'parkings', 'payments', 'picnics'));
    }

    function user_edit($id)
    {
        $list = User::findOrFail($id);
        return view('frontend.user.user_edit', compact('list'));
    }
    function user_update(Request $request)
    {
        $auth_image = User::findOrFail($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone1' => $request->phone1,
            'address' => $request->address,
            'nationality' => $request->nationality,
            'date_of_birth' => $request->date_of_birth,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'gender' => $request->gender,
        ]);
        if ($request->hasFile('photo')) {
            $photo = $request->photo;
            $photoName = $request->id . '.' . $photo->getClientOriginalExtension();
            if (User::findOrFail($request->id)) {
                image::make($photo)->resize(1000, 1000)->save(base_path("public/uploads/registers/" . $photoName), 100);
                User::findOrFail($request->id)->update([
                    'photo' => $photoName,
                ]);
            } else {
                (base_path("/uploads/auths/" . $photoName));
                Image::make($photo)->resize(1000, 1000)->save(base_path("/uploads/registers/" . $photoName), 100);
            }
        }
        return redirect()->route('profile')->with('success', 'User information have been successfully Updated.');
    }

    public function user_room_edit($id)
    {
        $list = Room::findOrFail($id);
        return view('user.room.single_room_list', compact('list'));
    }
    public function user_bilboard_edit($id)
    {
        $list = Bilboard::findOrFail($id);
        return view('user.bilboard.single_bilboard_list', compact('list'));
    }
    public function user_building_edit($id)
    {
        $list = Building::findOrFail($id);
        return view('user.building.single_building_list', compact('list'));
    }
    public function user_community_edit($id)
    {
        $list = Community_Center::findOrFail($id);
        return view('user.community.single_community_list', compact('list'));
    }
    public function user_exhibution_edit($id)
    {
        $list = Exibution_Center::findOrFail($id);
        return view('user.exhibution.single_exhibution_list', compact('list'));
    }
    public function user_factory_edit($id)
    {
        $list = Factory::findOrFail($id);
        return view('user.factory.single_factory_list', compact('list'));
    }
    public function user_flat_edit($id)
    {
        $list = Flat::findOrFail($id);
        return view('user.flat.single_flat_list', compact('list'));
    }
    public function user_hostel_edit($id)
    {
        $list = Hostel::findOrFail($id);
        return view('user.hostel.single_hostel_list', compact('list'));
    }
    public function user_hotel_edit($id)
    {
        $list = Hotel::findOrFail($id);
        return view('user.hotel.single_hotel_list', compact('list'));
    }
    public function user_office_edit($id)
    {
        $list = Office::findOrFail($id);
        return view('user.office.single_office_list', compact('list'));
    }
    public function user_playground_edit($id)
    {
        $list = Play_ground::findOrFail($id);
        return view('user.playground.single_playground_list', compact('list'));
    }
    public function user_pond_edit($id)
    {
        $list = Pond::findOrFail($id);
        return view('user.pond.single_pond_list', compact('list'));
    }
    public function user_resort_edit($id)
    {
        $list = Restaurant::findOrFail($id);
        return view('user.resort.single_resort_list', compact('list'));
    }
    public function user_rooftop_edit($id)
    {
        $list = Rooftop::findOrFail($id);
        return view('user.rooftop.single_rooftop_list', compact('list'));
    }
    public function user_shooting_edit($id)
    {
        $list = Shooting_Spot::findOrFail($id);
        return view('user.shooting.single_shooting_list', compact('list'));
    }
    public function user_shop_edit($id)
    {
        $list = Shop::findOrFail($id);
        return view('user.shop.single_shop_list', compact('list'));
    }
    public function user_swimming_edit($id)
    {
        $list = Swimming_Pool::findOrFail($id);
        return view('user.swimming.single_swimming_list', compact('list'));
    }
    public function user_land_edit($id)
    {
        $list = Land::findOrFail($id);
        return view('user.land.single_land_list', compact('list'));
    }
    public function user_warehouse_edit($id)
    {
        $list = Warehouse::findOrFail($id);
        return view('user.warehouse.single_warehouse_list', compact('list'));
    }
    public function user_parking_edit($id)
    {
        $list = Parking_Spot::findOrFail($id);
        return view('user.garage.single_parking_list', compact('list'));
    }
    function room()
    {
        $lists = Room::all();
        return view('frontend.layouts.room', compact('lists'));
    }
    function flat()
    {
        $lists = Flat::all();
        return view('frontend.layouts.flat', compact('lists'));
    }
    function building()
    {
        $lists = Building::all();
        return view('frontend.layouts.building', compact('lists'));
    }
    function parking()
    {
        $lists = Parking_Spot::all();
        return view('frontend.layouts.parking', compact('lists'));
    }
    function hotel()
    {
        $lists = Hotel::all();
        return view('frontend.layouts.hotel', compact('lists'));
    }
    function hostel()
    {
        $lists = Hostel::all();
        return view('frontend.layouts.hostel', compact('lists'));
    }
    function resort()
    {
        $lists = Restaurant::all();
        return view('frontend.layouts.resort', compact('lists'));
    }
    function office()
    {
        $lists = Office::all();
        return view('frontend.layouts.office', compact('lists'));
    }
    function shop()
    {
        $lists = Shop::all();
        return view('frontend.layouts.shop', compact('lists'));
    }
    function community_hall()
    {
        $lists = Community_Center::all();
        return view('frontend.layouts.community_hall', compact('lists'));
    }
    function factory()
    {
        $lists = Factory::all();
        return view('frontend.layouts.factory', compact('lists'));
    }
    function warehouse()
    {
        $lists = Warehouse::all();
        return view('frontend.layouts.warehouse', compact('lists'));
    }
    function land()
    {
        $lists = Land::all();
        return view('frontend.layouts.land', compact('lists'));
    }
    function pond()
    {
        $lists = Pond::all();
        return view('frontend.layouts.pond', compact('lists'));
    }
    function swimming_pool()
    {
        $lists = Swimming_Pool::all();
        return view('frontend.layouts.swimming_pool', compact('lists'));
    }
    function playground()
    {
        $lists = Play_ground::all();
        return view('frontend.layouts.playground', compact('lists'));
    }
    function shooting_spot()
    {
        $lists = Shooting_Spot::all();
        return view('frontend.layouts.shooting_spot', compact('lists'));
    }
    function exhibition_center()
    {
        $lists = Exibution_Center::all();
        return view('frontend.layouts.exhibition_center', compact('lists'));
    }
    function rooftop()
    {
        $lists = Rooftop::all();
        return view('frontend.layouts.rooftop', compact('lists'));
    }
    function bilboard()
    {
        $lists = Bilboard::all();
        return view('frontend.layouts.bilboard', compact('lists'));
    }
    function login_form()
    {
        return view('frontend.layouts.login_form');
    }
    function single_pg()
    {
        return view('frontend.layouts.single_pg');
    }
    function my_shortlist()
    {
        return view('frontend.layouts.my_shortlist');
    }
    function slider_section()
    {
        $rooms = Room::all();
        return view('frontend.layouts.include.slider_section', compact('rooms'));
    }


    function picnic_spot()
    {
        $lists = Room::all();
        return view('frontend.layouts.picnic_spot', compact('lists'));
    }
    function ghat()
    {
        $lists = Room::all();
        return view('frontend.layouts.ghat', compact('lists'));
    }
    function package()
    {
        return view('frontend.layouts.package');
    }
}
