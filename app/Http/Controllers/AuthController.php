<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\catagory_info;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{

    //
    public function register(Request $request){
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=> 'required|email|unique:users',
            'email'=> 'required|',
            'password'=> 'required',
            'cpassword'=> 'required|same:password',

        ]);
        $user = User::create([
            'role_id' => $request->role_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password'=>Hash::make($request['password']),
            'created_at'   =>Carbon::now()
        ]);
        if($user){
            return back()->with('success','Registation Successfull');
        }else{
            return back() ->with('fail','Please Check Your Information Properly');
        }
    }

    public function login(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
        // dd($request->all());
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            // return Redirect::index();
            if(auth::User()->role_id == 2){
                return redirect()->route('index');
            }else if(auth::User()->role_id ==1){
                return redirect()->route('admin_index');
            }else{
                return redirect()->back()->with('fail','Invalid Credentials.');
            }
        }
        else{
            return Redirect::back()->with('fail','Please Check Your Information Properly');
        }

    }
    public function change_password(Request $request){
        $request->validate([
            'old_pass'=> 'required|',
            'new_pass'=> 'required',
            'cnew_pass'=> 'required|same:new_pass',
        ]);
         $user = User::where('id','=',$request->user_id)->first();
        if (Hash::check($request->old_pass, $user->password)){
            $user->password = Hash::make($request->new_pass);
            $user->update();
            return back()->with('success','Successfully Changed Password');
        }
        else{
            return back()->with('fail','Old Password Dose Not Matched');
        }



    }


    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }

}
