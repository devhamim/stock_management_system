<?php

namespace App\Http\Controllers;

use App\Models\kachamal;
use App\Models\pakamal;
use Illuminate\Http\Request;

class godaunstockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kachamal = kachamal::all();
        $pakamal = pakamal::all();
        return view('backend.content.godaun_stock.index', [
            'kachamal'=>$kachamal,
            'pakamal'=>$pakamal,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.content.godaun_stock.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->category == 1){
            kachamal::insert([
                'name'=>$request->name,
            ]);
            return back();
        }
        else{
            pakamal::insert([
                'name'=>$request->name,
            ]);
            return back();
        }
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
    public function destroy(Request $request, string $id)
    {
        if($request->kacha_id){
            kachamal::find($id)->delete();
        }
        else{
            pakamal::find($id)->delete();
        }
        return back();
    }
}
