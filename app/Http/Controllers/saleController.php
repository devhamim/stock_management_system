<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\customer;
use App\Models\product;
use App\Models\sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class saleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = sale::orderBy('id', 'DESC')->get();
        $uniqueSales = $sales->unique('customer_id');

        return view('backend.content.sale.index', [
            'uniqueSales'=>$uniqueSales,
        ]);
    }

    // sale_details
    function sale_details($customer_id){
        $sales = sale::where('customer_id',$customer_id)->get();
        return view('backend.content.sale.details', [
            'sales'=>$sales,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customes = customer::all();
        $products = product::all();
        return view('backend.content.sale.add', [
            'products'=>$products,
            'customes'=>$customes,
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

        $total_items = product::where('id', $request->product_id)->first()->stock;
        if($total_items <= $request->item){
            Alert::error('Stock', 'Out of Stock');
            return back();
        }
        else{
            sale::insert([
                'sale_id'=>'kazi-'.rand(10000000,99999999),
                'product_id'=>$request->product_id,
                'customer_id'=>$request->customer_id,
                'sale_date'=>$request->sale_date,
                'item'=>$request->item,
                'rate'=>$request->rate,
                'paid'=>$request->paid,
                'created_at'=>Carbon::now(),
            ]);

             product::where('id', $request->product_id)->decrement('stock', $request->item);

            Alert::success('Success', 'Sale Successfully');
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sales = sale::find($id);
        $customers = customer::all();
        $products = product::all();
        return view('backend.content.sale.edit', [
            'sales'=>$sales,
            'products'=>$products,
            'customers'=>$customers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        sale::where('id', $request->sale_id)->update([
            'product_id'=>$request->product_id,
            'customer_id'=>$request->customer_id,
            'sale_date'=>$request->sale_date,
            'item'=>$request->item,
            'rate'=>$request->rate,
            'paid'=>$request->paid,
        ]);
        Alert::success('Success', 'Sale Update Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        sale::find($id)->delete();
        Alert::error('Delete', 'Sale Delete Successfully');
        return back();
    }

}
