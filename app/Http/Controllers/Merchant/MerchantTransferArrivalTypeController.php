<?php

namespace App\Http\Controllers\Merchant;
use App\TransferArrivalType;
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerchantTransferArrivalTypeController extends Controller
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
                            ->join('transfer_arrivals', 'transfer_arrivals.hospital_program_id', '=', 'hospital_programs.id')
                            ->join('transfer_arrival_types', 'transfer_arrival_types.transfer_arrival_id', '=', 'transfer_arrivals.id')
                            ->select('transfer_arrival_types.*', 'hospitals.merchant_id as merchant_id')
                            ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                            ->get();

        return view('merchant/transfer-arrival-type/index')->with('transfers', $transfers)
                                                    ->with('hospital', $hospital)
                                                    ->with('page_title', 'Transfer Arrival Type | Admin Center MyWorldHealth.Com');
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

        return view('merchant/transfer-arrival-type/create')->with('hospital', $hospital)
                                              ->with('departments', $departments)
                                              ->with('page_title', 'Add Transfer Arrival Type| Merchant Center MyWorldHealth.Com');
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
                     'transfer_arrival_id'        => 'required',
                     'name'                       => 'required',
                     'price'                      => 'required',

             );

         $this->validate($request, $rules);

         $transfer = new TransferArrivalType;
         $transfer->transfer_arrival_id        = $request->get('transfer_arrival_id');
         $transfer->name                       = $request->get('name');
         $transfer->price                      = $request->get('price');
         $transfer->save();


        return redirect('merchant/transfer-arrival-types');
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
        $transfer = TransferArrivalType::find($id);
        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();
        $departments = \App\HospitalDepartment::where('hospital_id', $hospital->id)->orderBy('name')->get();

        return view('merchant/transfer-arrival-type/edit')->with('transfer', $transfer)
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
                'transfer_arrival_id'        => 'required',
                'name'                       => 'required',
                'price'                      => 'required',

           );

       $this->validate($request, $rules);

       $transfer = TransferArrivalType::find($id);
       $transfer->transfer_arrival_id        = $request->get('transfer_arrival_id');
       $transfer->name                       = $request->get('name');
       $transfer->price                      = $request->get('price');
       $transfer->updated_at                 = Carbon::now();
       $transfer->save();


       return redirect('merchant/transfer-arrival-types');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transfer = TransferArrivalType::find($id);
        $transfer->delete();

        return redirect('merchant/transfer-arrival-types');
    }
}
