<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catagory_info;
use App\Models\experience;
use App\Models\filter_process;
use App\Models\product;
use App\Models\order;
use App\Models\suborder;
use App\Models\team;
use File;
use Image;

class AdminController extends Controller
{


    // Catagory
    public function catagory()
    {
        $catagories = catagory_info::all();
        return view('admin.layout.catagory', compact('catagories'));
    }

    public function catagory_add(Request $request)
    {
        // dd($request->all());
        catagory_info::create([
            'catagory_name' => $request->catagory_name,
            'catstatus' => $request->c_status,
        ]);

        return back()->with('success', 'Catagory information have been successfully Added.');
    }

    public function catagory_edit($id)
    {
        $catagory = catagory_info::find($id);
        return response()->json([
            'status' => 200,
            'cat' => $catagory,
        ]);
    }

    public function catagory_update(Request $request)
    {

        catagory_info::find($request->catagory_id)->update([
            'catagory_name' => $request->catagory_name,
        ]);

        return back()->with('success', 'Catagory information have been successfully Updated.');
    }

    public function catagory_delete(Request $request)
    {

        $del_catagory_info = catagory_info::find($request->deletingId);

        $del_catagory_info->delete();
        return back()->with('success', 'Catagory information have been successfully Deleted.');
    }

    public function catagory_status($id)
    {
        $getStatus = catagory_info::find($id);
        // dd($getStatus);
        if ($getStatus->catstatus == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        if ($status == 1) {
            catagory_info::where('id', '=', $id)->update(['catstatus' => $status]);
        } else {
            catagory_info::where('id', '=', $id)->update(['catstatus' => $status]);
        }
        return back();
    }

    //Product
    public function product()
    {
        $catagories = catagory_info::all();
        $products = product::all();
        return view('admin.layout.product', compact('products', 'catagories'));
    }

    public function product_add(Request $request)
    {
        //        dd($request->all());
        $filename = '';
        $filename1 = '';
        $filename_others[] = '';
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            if ($file->isValid()) {
                $filename = "product" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                Image::make($file->getRealPath())->resize(1000, 1000)->save(base_path("public/uploads/product/" . $filename), 100);
                //                $file->storeAs('product',$filename);
            }
        }

        if ($request->hasFile('catalog_image')) {
            $file1 = $request->file('catalog_image');
            if ($file1->isValid()) {
                $filename1 = "product" . date('Ymdhms') . rand(1, 100) . '.' . $file1->getClientOriginalExtension();
                Image::make($file1->getRealPath())->resize(1000, 1000)->save(base_path("public/uploads/product/" . $filename1), 100);
                //                $file->storeAs('product',$filename);
            }
        }

        if ($request->hasFile('images')) {
            $file_others = $request->file('images');
            // dd("hello",$file_others);
            foreach ($file_others as $file_other) {
                if ($file_other->isValid()) {
                    $filename_other = "other_pro" . date('Ymdhms') . rand(1, 100) . '.' . $file_other->getClientOriginalExtension();
                    Image::make($file_other->getRealPath())->resize(1000, 1000)->save(base_path("public/uploads/product/" . $filename_other), 100);
                    $filename_others[] = $filename_other;
                    //                $file->storeAs('product',$filename);
                }
            }
        }
        if ($filename_others[0] == null) {
            $test = array_shift($filename_others);
        }
        $filename_others = implode(',', $filename_others);

        product::create([
            'cat_id' => $request->cat_id,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'm_image' => $filename,
            'catalog_image' => $filename1,
            'other_images' => $filename_others,
            'prostatus' => $request->p_status,
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return back();
    }

    public function product_edit($id)
    {
        $product = product::find($id);
        return response()->json([
            'status' => 200,
            'pro' => $product,
        ]);
    }

    public function product_update(Request $request)
    {
        $pro_id = product::find($request->product_id);
        $filename = $pro_id->m_image;
        $filename1 = $pro_id->catalog_image;
        $filename_others[] = '';
        if ($request->hasFile('product_image')) {
            $destination = 'uploads/product/' . $pro_id->m_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('product_image');
            if ($file->isValid()) {
                $filename = "product" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                Image::make($file->getRealPath())->resize(1000, 1000)->save(base_path("public/uploads/product/" . $filename), 100);
            }
        }

        if ($request->hasFile('catalog_image')) {
            $destination = 'uploads/product/' . $pro_id->catalog_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('catalog_image');
            if ($file->isValid()) {
                $filename1 = "product" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                Image::make($file->getRealPath())->resize(1000, 1000)->save(base_path("public/uploads/product/" . $filename), 100);
            }
        }

        if ($request->hasFile('images')) {
            $others = $pro_id->other_images;
            $others = explode(',', $others);
            // dd($others);
            foreach ($others as $other) {
                $destination = 'uploads/product/' . $other;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }

            $file_others = $request->file('images');
            // dd("hello",$file_others);
            foreach ($file_others as $file_other) {
                if ($file_other->isValid()) {
                    $filename_other = "other_pro" . date('Ymdhms') . rand(1, 100) . '.' . $file_other->getClientOriginalExtension();
                    Image::make($file_other->getRealPath())->resize(1000, 1000)->save(base_path("public/uploads/product/" . $filename_other), 100);
                    $filename_others[] = $filename_other;
                    //                $file->storeAs('product',$filename);
                }
            }
        }

        if ($filename_others[0] == null) {
            $test = array_shift($filename_others);
        }
        $filename_others = implode(',', $filename_others);

        product::find($request->product_id)->update([
            'cat_id' => $request->u_cat_id,
            'product_name' => $request->u_product_name,
            'description' => $request->u_description,
            'price' => $request->u_price,
            'catalog_image' => $filename1,
            'm_image' => $filename,
            'other_images' => $filename_others,
        ]);

        return back()->with('success', 'Product information have been successfully Updated.');
    }

    public function product_delete(Request $request)
    {

        $del_product_info = product::find($request->deletingId);
        // dd($del_product_info);
        $del_product_info->delete();

        return back()->with('success', 'Product information have been successfully Deleted.');
    }

    public function product_status($id)
    {
        $getStatus = product::find($id);

        if ($getStatus->prostatus == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        if ($status == 1) {
            product::where('id', '=', $id)->update(['prostatus' => $status]);
        } else {
            product::where('id', '=', $id)->update(['prostatus' => $status]);
        }
        return back();
    }


    public function product_img($id)
    {
        $pro = product::where('id', '=', $id)->first();
        $images = $pro->m_image . ',' . $pro->other_images;
        $images = explode(',', $images);
        return response()->json([
            'status' => 200,
            'all_image' => $images,
        ]);
    }

    public function product_description($id)
    {
        $des = product::where('id', '=', $id)->first()->description;
        return response()->json([
            'status' => 200,
            'des' => $des,
        ]);
    }
    public function filteraion_description($id)
    {
        $des = filter_process::where('id', '=', $id)->first();
        // dd($des);
        return response()->json([
            'status' => 200,
            'des' => $des,
        ]);
    }

    public function order_list()
    {
        $orders = order::Join('users', 'orders.user_id', '=', 'users.id')->get(['orders.*', 'users.first_name', 'users.last_name', 'users.email', 'users.phone']);
        // dd($orders);
        return view('admin.layout.order', compact('orders'));
    }

    public function admin_order_view($id)
    {
        $order = suborder::where('order_id', '=', $id)->get();
        $order_total = order::where('id', '=', $id)->first()->total_price;
        $subtotal = $order->sum('sub_total');
        return response()->json([
            'status' => 200,
            'order' => $order,
            'order_total' => $order_total,
            'subtotal' => $subtotal,
        ]);
    }

    public function ordre_status($id)
    {

        $getStatus = order::find($id);
        // dd($getStatus);
        if ($getStatus->order_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        if ($status == 1) {
            order::where('id', '=', $id)->update(['order_status' => $status]);
        } else {
            order::where('id', '=', $id)->update(['order_status' => $status]);
        }
        return back();
    }
    public function order_delete(Request $request)
    {
        $order_id = order::find($request->deletingId);
        $order_id->delete();

        $suborder = suborder::where('order_id', $request->deletingId);
        $suborder->delete();
        return back()->with('success', 'Order have been successfully Deleted.');
    }
    public function filter_view()
    {
        $catagories = catagory_info::all();
        $products = product::all();
        $filter_processes = filter_process::all();
        return view('admin.layout.filteration_process', compact('catagories', 'products', 'filter_processes'));
    }
    public function filter(Request $request)
    {
        $process = filter_process::create([
            'cat_id' => $request->cat_id,
            'product_id' => $request->product_id,
            'Stage_1' => $request->Stage_1,
            'Stage_2' => $request->Stage_2,
            'Stage_3' => $request->Stage_3,
            'Stage_4' => $request->Stage_4,
            'Stage_5' => $request->Stage_5,
            'Stage_6' => $request->Stage_6,
            'Stage_7' => $request->Stage_7,
            'Stage_8' => $request->Stage_8,
            'Stage_9' => $request->Stage_9,
            'Stage_10' => $request->Stage_10,
        ]);
        return back()->with('success', 'Filteration Process have been successfully Added.');
    }


    public function filteraion_edit($id)
    {
        $serv = filter_process::find($id);
        // dd($serv);
        return response()->json([
            'status' => 200,
            'serv' => $serv,
        ]);
    }
    public function filteraion_update(Request $request)
    {
        filter_process::find($request->process_id)->update([
            'cat_id' => $request->u_cat_id,
            'product_id' => $request->u_product_id,
            'Stage_1' => $request->u_Stage_1,
            'Stage_2' => $request->u_Stage_2,
            'Stage_3' => $request->u_Stage_3,
            'Stage_4' => $request->u_Stage_4,
            'Stage_5' => $request->u_Stage_5,
            'Stage_6' => $request->u_Stage_6,
            'Stage_7' => $request->u_Stage_7,
            'Stage_8' => $request->u_Stage_8,
            'Stage_9' => $request->u_Stage_9,
            'Stage_10' => $request->u_Stage_10,
        ]);

        return back()->with('success', 'Filteration Process have been successfully Added.');
    }
    public function process_delete(Request $request)
    {

        $del_process_info = filter_process::find($request->deletingId);
        $del_process_info->delete();

        return back()->with('success', 'Process information have been successfully Deleted.');
    }





    public function experience_list()
    {
        $experiences = experience::all();
        return view('admin.layout.experience', compact('experiences'));
    }

    public function add_exp(Request $request)
    {

        $filename = '';

        if ($request->hasFile('image')) {
            // dd('hello');
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = "experience" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                Image::make($file->getRealPath())->resize(600, 800)->save(base_path("public/uploads/experiences/" . $filename), 100);
                //                $file->storeAs('product',$filename);
            }
        }

        experience::create([
            'image' => $filename,
            'description' => $request->description
        ]);
        session()->flash('success', 'Experience Added Successfully !');
        return back();
    }
    public function exp_edit($id)
    {
        $exp = team::find($id);
        // dd($exp);
        return response()->json([
            'status' => 200,
            'exp' => $exp
        ]);
    }
    public function exp_update(Request $request)
    {
        $exp_id = experience::find($request->exp_id);
        // dd($exp_id);
        $filename = $exp_id->image;

        if ($request->hasFile('image')) {
            $destination = 'public/uploads/experiences/' . $exp_id->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = "team" . date('Ymdhms') . '-' . $file->getClientOriginalExtension();
                Image::make($file->getRealPath())->resize(600, 800)->save(base_path("public/uploads/experiences/" . $filename), 100);
            }
        }
        team::find($request->exp_id)->update([
            'image' => $filename,
            'description' => $request->u_description
        ]);
        return back()->with('success', 'Experiences information have been successfully Updated.');
    }
    public function exp_delete(Request $request)
    {
        $del_exp_info = experience::find($request->deletingId);
        $del_exp_info->delete();
        return back()->with('success', 'experiences information have been successfully Deleted.');
    }












    public function team_list()
    {
        $teams = team::all();
        return view('admin.layout.team', compact('teams'));
    }

    public function add_team(Request $request)
    {

        $filename = '';

        if ($request->hasFile('image')) {
            // dd('hello');
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = "teams" . date('Ymdhms') . '-' . $file->getClientOriginalExtension();
                Image::make($file->getRealPath())->resize(600, 800)->save(base_path("public/uploads/teams/" . $filename), 100);
                //                $file->storeAs('product',$filename);
            }
        }

        team::create([
            'name' => $request->name,
            'qualification' => $request->qualification,
            'designation' => $request->qualification,
            'image' => $filename,
        ]);
        session()->flash('success', 'Team member Added Successfully !');
        return back();
    }
    public function team_edit($id)
    {
        $team = team::find($id);
        // dd($exp);
        return response()->json([
            'status' => 200,
            'team' => $team
        ]);
    }
    public function team_update(Request $request)
    {
        $team_id = team::find($request->team_id);
        // dd($team_id);
        $filename = $team_id->image;

        if ($request->hasFile('image')) {
            $destination = 'uploads/teams/' . $team_id->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = "team" . date('Ymdhms') . '-' . $file->getClientOriginalExtension();
                Image::make($file->getRealPath())->resize(600, 800)->save(base_path("public/uploads/teams/" . $filename), 100);
            }
        }
        team::find($request->team_id)->update([
            'name' => $request->u_name,
            'qualification' => $request->u_qualification,
            'designation' => $request->u_designation,
            'image' => $filename,
        ]);
        return back()->with('success', 'Team member information have been successfully Updated.');
    }
    public function team_delete(Request $request)
    {
        $del_team_info = team::find($request->deletingId);
        $del_team_info->delete();
        return back()->with('success', 'Team member information have been successfully Deleted.');
    }
}
