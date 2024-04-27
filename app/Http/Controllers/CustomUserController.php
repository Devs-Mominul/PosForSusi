<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomUserController extends Controller
{
    function profile(){
        return view('customUserprofile.profile');
    }
    function profile_post(Request $request){
        $image=$request->image;
        $extension=$image->extension();
        $imageName = time().'.'.$extension;
        $image->move(public_path('upload/profile'), $imageName);
       CustomUser::find(Auth::guard('customUser')->user()->id)->update([

            'photo'=>$imageName,
        ]);
        return back()->with('success','Customer User  Profile Updated');

    }
    function password_update(Request $request){
        $password=CustomUser::find(Auth::guard('customUser')->id());
     



        if(password_verify($request->current_password,$password->password)){
            CustomUser::find(Auth::guard('customUser')->user()->id)->update([
                'password'=>bcrypt($request->password),

            ]);
            return back()->with('success','Customer User  Password Updated');

        }
        else{
            return back()->with('success','Customer User  Password Does Not Exists');
        }
    }
}
