<?php

namespace App\Http\Controllers;

use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = category::all();
        return view('backend.content.category.index', [
            'categorys'=>$categorys,
        ]);
    }

    /**
     * category add
     */
    public function create()
    {
        return view('backend.content.category.add');
    }

    /**
     * category store
     */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);

        if($request->image == ''){
            category::insert([
                'name'=>$request->name,
                'status'=>$request->status,
                'created_at'=>Carbon::now(),
            ]);
        }
        else{
            // category image
            $cat_img = $request->image;
            $extention = $cat_img->getClientOriginalExtension();
            $file_name = Str::lower(str_replace(' ','-',$request->name)).'.'.$extention;
            Image::make($cat_img)->resize(80,80)->save(public_path('/uplode/category/'. $file_name));

            category::insert([
                'image'=>$file_name,
                'name'=>$request->name,
                'status'=>$request->status,
                'created_at'=>Carbon::now(),
            ]);
        }
        Alert::success('Success', 'Category Add Successfully');
        return back();

    }

    // category_delete
    function destroy($id){
        $imgs = category::where('id', $id)->first()->image;
        $imgs_del = public_path('uplode/category/'.$imgs);
        unlink($imgs_del);

        category::find($id)->delete();
        Alert::error('Delete', 'Category Delete Successfully');
        return back();
    }

    // category_edit
    function edit($id){
        $categorys = category::find($id);
        return view('backend.content.category.edit', [
            'categorys'=>$categorys,
        ]);
    }

    // category_update
    function update(Request $request){

        if($request->image == ''){
            category::find($request->category_id)->update([
                'name'=>$request->name,
                'status'=>$request->status,
            ]);
        }
        else{
            $imgs = category::where('id', $request->category_id)->first()->image;
            $imgs_del = public_path('uplode/category/'.$imgs);
            unlink($imgs_del);

            $cat_img = $request->image;
            $extention = $cat_img->getClientOriginalExtension();
            $file_name = Str::lower(str_replace(' ','-',$request->name)).'.'.$extention;
            Image::make($cat_img)->resize(80,80)->save(public_path('/uplode/category/'. $file_name));

            category::find($request->category_id)->update([
                'image'=>$file_name,
                'name'=>$request->name,
                'status'=>$request->status,
            ]);
        }

        Alert::success('Success', 'Category Update Successfully');
        return back();
    }


}
