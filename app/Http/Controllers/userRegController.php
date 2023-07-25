<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Image;

class userRegController extends Controller
{
    //user_reg
    function user_reg(Request $request){
       $request->validate([
        'name'=>'required',
        'email'=>'required',
        'password'=>'required',
       ]);

    $userid = User::insertGetId([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'address'=>$request->address,
        'is_admin'=>$request->is_admin,
        'password'=>bcrypt($request->password),
        'created_at'=>Carbon::now(),
    ]);

    if($request->image != ''){
        $img = $request->image;
        $extension = $img->getClientOriginalExtension();
        $file_name = $userid.'-'.$request->name.'.'.$extension;
        Image::make($img)->save(public_path('uplode/profile/'.$file_name));

        User::find($userid)->update([
            'image'=>$file_name,
        ]);
    }


    Alert::success('Success', 'User Add Successfully');
    return back();
    }
}
