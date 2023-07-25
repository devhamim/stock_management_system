<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\pakamal;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $products = product::whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$currentMonth])->get();

        // $products = product::all();
        return view('backend.content.product.index', [
            'products'=>$products,
        ]);
    }

     // product_all
     function product_all(){
        return view('backend.content.product.all_report');
    }

    // product_all_reports
    function product_all_reports(Request $request){

        $ser_date = date('Y-m', strtotime($request->report_date));
        $products = product::whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$ser_date])->get();

        return view('backend.content.product.all_report', [
            'products'=>$products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = pakamal::all();
       return view('backend.content.product.add', [
        'products'=>$products,
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

        product::insert([
            'paka_id'=>$request->paka_id,
            'bf'=>$request->bf,
            'production'=>$request->production,
            'sell'=>$request->sell,
            'created_at'=>Carbon::now(),
        ]);
        Alert::success('Success', 'Product Add Successfully');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product_id = pakamal::all();
        $products = product::find($id);
        return view('backend.content.product.edit', [
            'products'=>$products,
            'product_id'=>$product_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        product::find($request->product_id)->update([
            'paka_id'=>$request->paka_id,
            'bf'=>$request->bf,
            'production'=>$request->production,
            'sell'=>$request->sell,
            'status'=>$request->status,
        ]);

        Alert::success('Success', 'Product Update Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $imgs = product::where('id', $id)->first()->image;
        $imgs_del = public_path('uplode/product/'. $imgs);
        unlink($imgs_del);

        product::find($id)->delete();
        Alert::error('Delete', 'Product Delete Successfully');
        return back();
    }
}
