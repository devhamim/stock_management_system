<?php

namespace App\Http\Controllers;

use App\Models\kachamal;
use App\Models\purchase;
use App\Models\seller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class purchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = purchase::orderBy('id', 'DESC')->get();

        $uniquepurchase = $purchases->unique('seller_id');
        return view('backend.content.purchase.index', [
            'purchases'=>$purchases,
            'uniquepurchase'=>$uniquepurchase,
        ]);
    }

    // purchase_details
    function purchase_details($seller_id){
        $purchases = purchase::where('seller_id', $seller_id)->get();
        return view('backend.content.purchase.details', [
            'purchases'=>$purchases,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kachamals = kachamal::all();
        $sellers = seller::all();
        return view('backend.content.purchase.add', [
            'sellers'=>$sellers,
            'kachamals'=>$kachamals,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);
        purchase::insert([
            'purchase_id'=>'purc-'.rand(10000000,99999999),
            'product_id'=>$request->product_id,
            'seller_id'=>$request->seller_id,
            'purchase_date'=>$request->purchase_date,
            'weight'=>$request->weight,
            'rate'=>$request->rate,
            'paid'=>$request->paid,
            'created_at'=>Carbon::now(),
        ]);
        Alert::success('Success', 'Sale Successfully');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sellers = seller::all();
        $purchases = purchase::find($id);
        return view('backend.content.purchase.edit', [
            'purchases'=>$purchases,
            'sellers'=>$sellers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        purchase::where('id',$request->purchase_id)->update([
            'name'=>$request->name,
            'seller_id'=>$request->seller_id,
            'purchase_date'=>$request->purchase_date,
            'weight'=>$request->weight,
            'rate'=>$request->rate,
            'paid'=>$request->paid,
        ]);
        Alert::success('Success', 'Purchase Update Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        purchase::find($id)->delete();
        Alert::error('Delete', 'Purchase Delete Successfully');
        return back();
    }

}
