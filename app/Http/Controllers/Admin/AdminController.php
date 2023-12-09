<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // admin after login
    public function admin()
    {
        return view('admin.home');
    }

    // admin logout
    public function logout()
    {
        Auth::logout();
        $notification = array('message' => 'You are logged out!', 'alert-type' => 'success');
        return redirect()->route('login')->with($notification);
    }

    // password change
    public function passwordChange(){
        return view('admin.profile.pass_change');
    }
    // password update
    public function passwordUpdate(Request $request){

        // $validated = $request->validate([
        //     'oldpassword' => 'required',
        //     'password' => 'required|min:6|confirmed',
        // ]);

        $old_pass = Auth::user()->password;
        if(Hash::check($old_pass,$request->oldpassword)){

        }else{
            
        }
    }
}
