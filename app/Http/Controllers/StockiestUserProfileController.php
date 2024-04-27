<?php

namespace App\Http\Controllers;

use App\Models\Stockiest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockiestUserProfileController extends Controller
{
    function profile(){
        return view('StockiestUserProfile.profile');
    }
    function profile_post(Request $request){
        $image=$request->image;
        $extension=$image->extension();
        $imageName = time().'.'.$extension;
        $image->move(public_path('upload/profile'), $imageName);
       Stockiest::find(Auth::guard('stockiest')->user()->id)->update([

            'photo'=>$imageName,
        ]);
        return back()->with('success','Depo User  Profile Updated');

    }
    function password_update(Request $request){
        $password=Stockiest::find(Auth::guard('depo')->id());




        if(password_verify($request->current_password,$password->password)){
            Stockiest::find(Auth::guard('depo')->user()->id)->update([
                'password'=>bcrypt($request->password),

            ]);
            return back()->with('success','depo User  Password Updated');

        }
        else{
            return back()->with('success','depo User  Password Does Not Exists');
        }
    }
}
