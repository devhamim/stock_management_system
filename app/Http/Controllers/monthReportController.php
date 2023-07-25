<?php

namespace App\Http\Controllers;

use App\Models\sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class monthReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $currentMonth = Carbon::now()->format('Y-m');
        $sales = sale::whereRaw("DATE_FORMAT(sale_date, '%Y-%m') = ?", [$currentMonth])->get();

        $monthly_sele = sale::all();
        return view('backend.content.month_report.index', [
            'monthly_sele'=>$monthly_sele,
            'sales'=>$sales,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.content.month_report.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.content.month_report.edit');
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

    // purchase_details_all
    function purchase_details_all(){
        return view('backend.content.month_report.all_report');
    }

    // all_reports
    function all_reports(Request $request){

        $ser_date = date('Y-m', strtotime($request->report_date));
        $sales = sale::whereRaw("DATE_FORMAT(sale_date, '%Y-%m') = ?", [$ser_date])->get();
        
        return view('backend.content.month_report.all_report', [
            'sales'=>$sales,
        ]);
    }

}
