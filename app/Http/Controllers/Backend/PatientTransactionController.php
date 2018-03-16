<?php

namespace App\Http\Controllers\Backend;
use App\Diagnostic;
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = DB::table('diagnostics')
                        ->join('invoices', 'invoices.id', '=', 'diagnostics.invoice_id')
                        ->join('hospital_programs', 'hospital_programs.id', '=', 'invoices.hospital_program_id')
                        ->select('diagnostics.name as patient_name', 'invoices.order_id as order_id',
                                  'hospital_programs.name as program', 'invoices.start_date as start_date',
                                  'invoices.end_date as end_date', 'diagnostics.id as diagnostics_id')
                       ->orderBy('diagnostics.name')
                       ->get();

        return view('backend/patient-transaction/index')->with('patients', $patients)
                                            ->with('page_title', 'Patient Transactions | Admin Center MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $patient = DB::table('diagnostics')
                      ->join('invoices', 'invoices.id', '=', 'diagnostics.invoice_id')
                      ->join('hospital_programs', 'hospital_programs.id', '=', 'invoices.hospital_program_id')
                      ->select('diagnostics.name as patient_name', 'invoices.order_id as order_id',
                                'hospital_programs.name as program', 'invoices.start_date as start_date',
                                'invoices.user_id as user_id', 'invoices.total_amount as total_amount',
                                'invoices.end_date as end_date', 'diagnostics.id as diagnostics_id')
                     ->orderBy('diagnostics.name')
                     ->where('diagnostics.id', $id)
                     ->first();
        return view('backend/patient-transaction/show')->with('patient', $patient)
                                           ->with('page_title', 'Patient Detail | Admin Center MyWorldHealth.Com');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
