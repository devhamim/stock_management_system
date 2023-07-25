<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = customer::orderBy('id','DESC')->get();
        return view('backend.content.customer.index', [
            'customers'=>$customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.content.customer.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);

        customer::insert([
            'name'=>$request->name,
            'number'=>$request->number,
            'status'=>$request->status,
            'created_at'=>Carbon::now(),
        ]);
        Alert::success('Success', 'Customer Add Successfully');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = customer::find($id);
        return view('backend.content.customer.edit', [
            'customers'=>$customers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        customer::where('id',$request->customer_id)->update([
            'name'=>$request->name,
            'number'=>$request->number,
            'status'=>$request->status,
        ]);
        Alert::success('Success', 'Customer Update Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        customer::find($id)->delete();
        Alert::error('Delete', 'Customer Delete Successfully');
        return back();

    }
}
