<?php

namespace App\Http\Controllers;

use App\Mail\Order_Information_Mail;
use App\Models\order;
use App\Models\product;
use App\Models\suborder;
use App\Models\User;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;

class CartController extends Controller
{
    public function addtocart($id)
    {
        $product = product::find($id);
        $cart = Cart::add([
            'id' => $id,
            'name' => $product->product_name,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 0,
            'options' => ['image' => $product->m_image,]
        ]);
        return redirect()->back()->with('suceess', 'Product Added to the Cart');
    }

    public function updatecart(Request $request)
    {
        Cart::update($request->rowId, $request->u_qty);

        return redirect()->back()->with('suceess', 'Updated the Cart product');
    }

    public function cartdelete($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('suceess', 'product Removed From the Cart');
    }
    public function checkout(Request $request)
    {

        $carts = Cart::content();

        $cart_count = Cart::count();
        //        $subtotal=Cart::SubTotal();
        $total = Cart::Total();

        //    dd($request->all(),$total,$cart_count);
        if (Auth::user()) {
            $order = order::create([
                'user_id' => auth()->user()->id,
                'address' => $request->address_1,
                'notes' => $request->order_note,
                'total_items' => $cart_count,
                'total_price' => $total,
            ]);
            //        dd($order);
            foreach ($carts as $cart) {
                $suborder = suborder::create([
                    'user_id' => auth()->user()->id,
                    'order_id' => $order->id,
                    'product_id' => $cart->id,
                    'product_name' => $cart->name,
                    'image' => $cart->options->image,
                    'order_quantity' => $cart->qty,
                    'sub_total' => $cart->subtotal,

                ]);
            }
            Cart::destroy();
            return redirect()->route('index')->with('massage', 'order has been placed');
        } else {
            $suborder[]="";
            $str_pass='abcdefghijklmnopqrstuvwxyz0123456789';
            $pass_shuffle=str_shuffle($str_pass);
            $pass=substr($pass_shuffle,0,8);
            // dd($pass);
            $user = User::create([
                'role_id' => 2,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password'=>Hash::make($pass)
            ]);

            $order = order::create([
                'user_id' => $user->id,
                'address' => $request->address,
                'notes' => $request->order_note,
                'total_items' => $cart_count,
                'total_price' => $total,
            ]);
            //        dd($order);
            foreach ($carts as $cart) {
                $suborder = suborder::create([
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'product_id' => $cart->id,
                    'product_name' => $cart->name,
                    'image' => $cart->options->image,
                    'order_quantity' => $cart->qty,
                    'sub_total' => $cart->subtotal,

                ]);
            }
            Cart::destroy();

            $mailData = [
                'title' => 'Welcome to the websity',
                'email' => $request->email,
                'password' => $pass,
            ];
            $orderData=[
                'title'=>'Order Information',
                'name'=>$user->first_name.' '.$user->last_name,
                'email'=>$user->email,
                'phone' =>$user->phone,
                'address'=>$order->address,
            ];
            // dd($orderData);

            Mail::to($request->email)->send(new UserMail($mailData));
            Mail::to('sales@greenbudwater.com.bd')->cc('accounts@greenbudwater.com.bd','najmul@greenbudwater.com.bd')->send(new Order_Information_Mail($orderData));
            return redirect()->route('index')->with('massage', 'order has been placed');
        }
    }
}
