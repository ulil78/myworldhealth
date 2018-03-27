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

    public function selectDepartmentArrival(Request $request)
    {
        if($request->ajax()){
            $programs= DB::table('hospital_programs')->where('hospital_department_id',$request->hospital_department_id_arrival)->get();
            $data = view('merchant/transfer-arrival-type/department-select',compact('programs'))->render();
            return response()->json(['options'=>$data]);
        }
    }


    public function selectProgramArrival(Request $request)
    {
        if($request->ajax()){
            $transfers= DB::table('transfer_arrivals')->where('hospital_program_id',$request->hospital_program_id_arrival)->get();
            $data = view('merchant/transfer-arrival-type/program-select',compact('transfers'))->render();
            return response()->json(['options'=>$data]);
        }
    }


    public function selectDepartmentReturn(Request $request)
    {
        if($request->ajax()){
            $programs= DB::table('hospital_programs')->where('hospital_department_id',$request->hospital_department_id_return)->get();
            $data = view('merchant/transfer-return-type/department-select',compact('programs'))->render();
            return response()->json(['options'=>$data]);
        }
    }


    public function selectProgramReturn(Request $request)
    {
        if($request->ajax()){
            $transfers= DB::table('transfer_returns')->where('hospital_program_id',$request->hospital_program_id_return)->get();
            $data = view('merchant/transfer-return-type/program-select',compact('transfers'))->render();
            return response()->json(['options'=>$data]);
        }
    }



}
