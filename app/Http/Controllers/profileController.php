<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    //profile view
    public function profile(){
        return view('backend.content.profile.index');
    }

    // profile_add
    function profile_add(){
        return view('backend.content.profile.add');
    }
}
