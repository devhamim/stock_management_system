<?php

namespace App\Http\Controllers;

use App\Models\seller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class sellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = seller::all();
        return view('backend.content.seller.index', [
            'sellers'=>$sellers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.content.seller.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);

        seller::insert([
            'name'=>$request->name,
            'number'=>$request->number,
            'status'=>$request->status,
            'created_at'=>Carbon::now(),
        ]);
        Alert::success('Success', 'Seller Add Successfully');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sellers = seller::find($id);
        return view('backend.content.seller.edit', [
            'sellers'=>$sellers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        seller::find($id)->update([
            'name'=>$request->name,
            'number'=>$request->number,
            'status'=>$request->status,
        ]);
        Alert::success('Success', 'Seller Update Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        seller::find($id)->delete();
        Alert::error('Delete', 'Seller Delete Successfully');
        return back();
    }
}
