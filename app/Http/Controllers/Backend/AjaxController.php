<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    //categories
    public function selectFirstCat(Request $request)
    {
        if($request->ajax()){
            $seconds = DB::table('second_categories')->where('first_category_id',$request->first_category_id)->get();
            $data = view('backend/thrid-category/first-cat-select',compact('seconds'))->render();
            return response()->json(['options'=>$data]);
        }
    }

    public function selectSecondCat(Request $request)
    {
        if($request->ajax()){
            $thrids = DB::table('thrid_categories')->where('second_category_id',$request->second_category_id)->get();
            $data = view('backend/fourth-category/second-cat-select',compact('thrids'))->render();
            return response()->json(['options'=>$data]);
        }
    }










}
