<?php

namespace App\Http\Controllers;

use App\Models\catagory_info;
use App\Models\experience;
use App\Models\filter_process;
use App\Models\order;
use App\Models\product;
use App\Models\suborder;
use App\Models\team;
use App\Models\User;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class FrontendController extends Controller
{
    function index()
    {
        $categories = catagory_info::all();
        $carts = Cart::content();
        $products_1 = product::where('cat_id', '=', 1)->get();
        $products_2 = product::where('cat_id', '=', 2)->get();
        $products_3 = product::where('cat_id', '=', 3)->get();
        $cat_1 = catagory_info::find(1);
        $cat_2 = catagory_info::find(2);
        $cat_3 = catagory_info::find(3);
        // dd($products);
        return view('frontend.layouts.index', compact('categories', 'carts', 'products_1', 'products_2', 'products_3', 'cat_1', 'cat_2', 'cat_3'));
    }
    public function admin_index()
    {
        return view('admin.layout.admin_index');
    }
    function login_view()
    {
        $carts = Cart::content();
        $categories = catagory_info::all();
        return view('frontend.layouts.login', compact('categories', 'carts'));
    }

    function registration()
    {
        $categories = catagory_info::all();
        $carts = Cart::content();
        return view('frontend.layouts.registration', compact('carts', 'categories'));
    }

    function shop_details($id)
    {
        $carts = Cart::content();
        $categories = catagory_info::all();
        $products = product::where('cat_id', $id)->get();
        $filters = filter_process::where('cat_id', $id)->get();
        $descriptions[] = "";
        if ($products != null) {
            foreach ($products as $product) {
                $descriptions = $product->description;
                $descriptions = explode("\r\n", $descriptions);
                if (($key = array_search("", $descriptions)) !== false) {
                    unset($descriptions[$key]);
                }
            }
        }

        if ($products != null) {
            return view('frontend.layouts.shop_details', compact('products', 'categories', 'carts', 'descriptions', 'filters'));
        } else {
            return back();
        }
    }

    function shop_grid($id)
    {
        $carts = Cart::content();
        $categories = catagory_info::all();
        $products = product::where('cat_id', $id)->get();
        return view('frontend.layouts.shop_grid', compact('products', 'categories', 'carts'));
    }

    function shop_grid_details($id)
    {
        $carts = Cart::content();
        $categories = catagory_info::all();
        $products = product::where('id', $id)->get();
        $filters = filter_process::where('product_id', $id)->get();

        $descriptions[] = "";
        if ($products != null) {
            foreach ($products as $product) {
                $descriptions = $product->description;
                $descriptions = explode("\r\n", $descriptions);
                if (($key = array_search("", $descriptions)) !== false) {
                    unset($descriptions[$key]);
                }
            }
        }

        if ($products != null) {
            return view('frontend.layouts.shop_details', compact('products', 'categories', 'carts', 'descriptions', 'filters'));
        } else {
            return back();
        }
    }

    function shopping_cart()
    {
        $categories = catagory_info::all();
        $carts = Cart::content();
        return view('frontend.layouts.shopping_cart', compact('carts', 'categories'));
    }

    function contact()
    {
        $categories = catagory_info::all();
        $carts = Cart::content();
        return view('frontend.layouts.contact', compact('carts', 'categories'));
    }

    function checkout()
    {
        $categories = catagory_info::all();
        $carts = Cart::content();
        // dd($carts);
        return view('frontend.layouts.checkout', compact('carts', 'categories'));
    }
    function our_team()
    {
        $categories = catagory_info::all();
        $carts = Cart::content();
        $teams = team::all();
        return view('frontend.layouts.our_team', compact('carts', 'categories', 'teams'));
    }
    function our_other_concerns()
    {
        $categories = catagory_info::all();
        $carts = Cart::content();
        return view('frontend.layouts.our_other_concerns', compact('carts', 'categories'));
    }
    function about_us()
    {
        $categories = catagory_info::all();
        $carts = Cart::content();
        return view('frontend.layouts.about_us', compact('carts', 'categories'));
    }
    function profile()
    {
        $user = User::where('id', '=', auth()->id())->first();
        $orders = order::where('user_id', '=', $user)->get();
        $categories = catagory_info::all();
        $carts = Cart::content();
        return view('frontend.layouts.profile', compact('carts', 'categories', 'user', 'orders'));
    }

    public function my_order_delete(Request $request)
    {
        $order_id = order::where('id', '=', $request->deletingId)->where('user_id', '=', auth()->id());
        $order_id->delete();

        $suborder = suborder::where('order_id', $request->deletingId)->where('user_id', '=', auth()->id());
        $suborder->delete();
        return back()->with('success', 'Order have been successfully Deleted.');
    }
    public function change_password()
    {
        $categories = catagory_info::all();
        $carts = Cart::content();
        $user = User::where('id', '=', auth()->id())->first();
        $orders = order::Join('suborders', 'orders.id', '=', 'suborders.order_id')->where('orders.user_id', '=', auth()->id())->get(['orders.*', 'suborders.*']);
        return view('frontend.layouts.profile', compact('carts', 'categories', 'user', 'orders'));
    }
    public function my_order_list()
    {
        $categories = catagory_info::all();
        $carts = Cart::content();
        $user = User::where('id', '=', auth()->id())->first();
        $orders = order::where('orders.user_id', '=', auth()->id())->get();
        return view('frontend.layouts.profile', compact('carts', 'categories', 'user', 'orders'));
    }
    public function experiences()
    {
        $categories = catagory_info::all();
        $carts = Cart::content();
        $exps = experience::paginate(1);

        return view('frontend.layouts.experiences', compact('carts', 'categories', 'exps'));
    }
    public function order_view($id)
    {
        $order = suborder::where('order_id', '=', $id)->get();
        $order_total = order::where('id', '=', $id)->first()->total_price;
        $subtotal = $order->sum('sub_total');
        $vat = round($order_total - $subtotal, 2);
        // dd($order_total,$subtotal,$vat);
        return response()->json([
            'status' => 200,
            'order' => $order,
            'order_total' => $order_total,
            'subtotal' => $subtotal,
            'vat' => $vat,
        ]);
    }
}
