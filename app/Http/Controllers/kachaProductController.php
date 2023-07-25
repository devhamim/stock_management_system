<?php

namespace App\Http\Controllers;

use App\Models\kachamal;
use App\Models\kachaproduct;
use App\Models\purchase;
use App\Models\seller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class kachaProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $purchases = purchase::whereRaw("DATE_FORMAT(purchase_date, '%Y-%m') = ?", [$currentMonth])->get();

        return view('backend.content.kachaproduct.index', [
            'purchases'=>$purchases,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sellers = seller::all();
        $kachaproduct = kachamal::all();
        return view('backend.content.kachaproduct.add', [
            'kachaproduct'=>$kachaproduct,
            'sellers'=>$sellers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // '*'=>'required',
        ]);
        kachaproduct::insert([
            'kacha_id'=>$request->kacha_id,
            'seller_id'=>$request->seller_id,
            'bf'=>$request->bf,
            'weight'=>$request->weight,
            'use'=>$request->use,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // kacha_product_all
    function kacha_product_all(){
        return view('backend.content.kachaproduct.all_report');
    }

    // kacha_product_all_reports
    function kacha_product_all_reports(Request $request){

        $ser_date = date('Y-m', strtotime($request->report_date));
        $purchases = purchase::whereRaw("DATE_FORMAT(purchase_date, '%Y-%m') = ?", [$ser_date])->get();

        return view('backend.content.kachaproduct.all_report', [
            'purchases'=>$purchases,
        ]);
    }
}
