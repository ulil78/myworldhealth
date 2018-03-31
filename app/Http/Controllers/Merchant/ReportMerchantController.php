<?php

namespace App\Http\Controllers\Merchant;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportMerchantController extends Controller
{
    public function getTransaction()
    {
        return view('merchant/report-transaction/index')->with('page_title', 'Report Transaction | Merchant Center MyWorldHealth.Com');
    }

    public function postTransaction(Request $request)
    {

        $rules = array(
                   'start_date'         => 'required',
                   'end_date'           => 'required',
         );

       $this->validate($request, $rules);

        $department = $request->get('department');
        $start_date = date('Y-m-d' . ' 00:00:00', strtotime($request->get('start_date')));
        $end_date   = date('Y-m-d' . ' 00:00:00', strtotime($request->get('end_date')));
        $status     = $request->get('status');



        if(strlen($department) >= 1 && strlen($status) >= 1){
          $invoices = DB::table('hospitals')
                              ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                              ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                              ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                              ->select('invoices.*',
                                        'hospitals.merchant_id as merchant_id',
                                        'hospital_departments.id as department_id',
                                        'hospital_departments.name as department_name',
                                        'hospital_programs.name as program_name')
                              ->whereBetween('invoices.created_at', [$start_date, $end_date])
                              ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                              ->where('invoices.status', $status)
                              ->where('hospital_departments.id', $department)
                              ->get();


              $cek_condition = 1;
        }elseif(strlen($department) >= 1  && strlen($status) <= 1){
          $invoices = DB::table('hospitals')
                              ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                              ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                              ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                              ->select('invoices.*',
                                        'hospitals.merchant_id as merchant_id',
                                        'hospital_departments.id as department_id',
                                        'hospital_departments.name as department_name',
                                        'hospital_programs.name as program_name')
                              ->whereBetween('invoices.created_at', [$start_date, $end_date])
                              ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                              ->where('hospital_departments.id', $department)
                              ->get();
              $cek_condition = 2;
        }elseif(strlen($status) >= 1 && strlen($department) <= 1 ){
          $invoices = DB::table('hospitals')
                              ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                              ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                              ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                              ->select('invoices.*',
                                        'hospitals.merchant_id as merchant_id',
                                        'hospital_departments.id as department_id',
                                        'hospital_departments.name as department_name',
                                        'hospital_programs.name as program_name')
                              ->whereBetween('invoices.created_at', [$start_date, $end_date])
                              ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                              ->where('invoices.status', $status)
                              ->get();
              $cek_condition = 3;
        }else{
          $invoices = DB::table('hospitals')
                              ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                              ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                              ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                              ->select('invoices.*',
                                        'hospitals.merchant_id as merchant_id',
                                        'hospital_departments.id as department_id',
                                        'hospital_departments.name as department_name',
                                        'hospital_programs.name as program_name')
                              ->whereBetween('invoices.created_at', [$start_date, $end_date])
                              ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                              ->get();
                $cek_condition = 4;
        }


        return view('merchant/report-transaction/show')->with('invoices', $invoices)
                                                       ->with('start_date', $start_date)
                                                       ->with('end_date', $end_date)
                                                       ->with('status', $status)
                                                       ->with('department', $department)
                                                       ->with('cek_condition', $cek_condition)
                                                       ->with('page_title', 'Report Transaction | Merchant Center MyWorldHealth.Com');

    }
}
