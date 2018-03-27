<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class MerchantAjaxController extends Controller
{
    public function selectDepartment(Request $request)
    {
        if($request->ajax()){
            $programs= DB::table('hospital_programs')->where('hospital_department_id',$request->hospital_department_id)->get();
            $data = view('merchant/service/department-select',compact('programs'))->render();
            return response()->json(['options'=>$data]);
        }
    }

}
