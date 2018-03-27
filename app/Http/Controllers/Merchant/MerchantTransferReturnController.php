<?php

namespace App\Http\Controllers\Merchant;
use App\TransferReturn;
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerchantTransferReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();
        $transfers = DB::table('hospitals')
                            ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                            ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                            ->join('transfer_returns', 'transfer_returns.hospital_program_id', '=', 'hospital_programs.id')
                            ->select('transfer_returns.*', 'hospitals.merchant_id as merchant_id')
                            ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                            ->get();

        return view('merchant/transfer-return/index')->with('transfers', $transfers)
                                                    ->with('hospital', $hospital)
                                                    ->with('page_title', 'Transfer Return | Admin Center MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();
        $departments = \App\HospitalDepartment::where('hospital_id', $hospital->id)->orderBy('name')->get();

        return view('merchant/transfer-return/create')->with('hospital', $hospital)
                                              ->with('departments', $departments)
                                              ->with('page_title', 'Add Transfer Return| Merchant Center MyWorldHealth.Com');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $rules = array(
                     'hospital_program_id'        => 'required',
                     'name'                       => 'required',

             );

         $this->validate($request, $rules);

         $transfer = new TransferReturn;
         $transfer->hospital_program_id        = $request->get('hospital_program_id');
         $transfer->name                       = $request->get('name');
         $transfer->save();


        return redirect('merchant/transfer-returns');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transfer = TransferReturn::find($id);
        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();
        $departments = \App\HospitalDepartment::where('hospital_id', $hospital->id)->orderBy('name')->get();

        return view('merchant/transfer-return/edit')->with('transfer', $transfer)
                                             ->with('hospital', $hospital)
                                             ->with('departments', $departments)
                                             ->with('page_title', 'Edit Hospital Depatments | Merchant Center MyWorldHealth.Com');

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
        $rules = array(
              'hospital_program_id'        => 'required',
              'name'                       => 'required',

           );

       $this->validate($request, $rules);

       $transfer = TransferReturn::find($id);
       $transfer->hospital_program_id        = $request->get('hospital_program_id');
       $transfer->name                       = $request->get('name');
       $transfer->updated_at                 = Carbon::now();
       $transfer->save();


       return redirect('merchant/transfer-returns');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transfer = TransferReturn::find($id);
        $transfer->delete();

        return redirect('merchant/transfer-returns');
    }
}
