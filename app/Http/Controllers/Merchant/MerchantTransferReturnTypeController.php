<?php

namespace App\Http\Controllers\Merchant;
use App\TransferReturnType;
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerchantTransferReturnTypeController extends Controller
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
                            ->join('transfer_return_types', 'transfer_return_types.transfer_return_id', '=', 'transfer_returns.id')
                            ->select('transfer_return_types.*', 'hospitals.merchant_id as merchant_id')
                            ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                            ->get();

        return view('merchant/transfer-return-type/index')->with('transfers', $transfers)
                                                    ->with('hospital', $hospital)
                                                    ->with('page_title', 'Transfer Return Type | Admin Center MyWorldHealth.Com');
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

        return view('merchant/transfer-return-type/create')->with('hospital', $hospital)
                                              ->with('departments', $departments)
                                              ->with('page_title', 'Add Transfer Return Type| Merchant Center MyWorldHealth.Com');
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
                     'transfer_return_id'        => 'required',
                     'name'                       => 'required',
                     'price'                      => 'required',

             );

         $this->validate($request, $rules);

         $transfer = new TransferReturnType;
         $transfer->transfer_return_id        = $request->get('transfer_return_id');
         $transfer->name                       = $request->get('name');
         $transfer->price                      = $request->get('price');
         $transfer->save();


        return redirect('merchant/transfer-return-types');
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
        $transfer = TransferReturnType::find($id);
        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();
        $departments = \App\HospitalDepartment::where('hospital_id', $hospital->id)->orderBy('name')->get();

        return view('merchant/transfer-return-type/edit')->with('transfer', $transfer)
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
                'transfer_return_id'        => 'required',
                'name'                       => 'required',
                'price'                      => 'required',

           );

       $this->validate($request, $rules);

       $transfer = TransferReturnType::find($id);
       $transfer->transfer_return_id        = $request->get('transfer_return_id');
       $transfer->name                       = $request->get('name');
       $transfer->price                      = $request->get('price');
       $transfer->updated_at                 = Carbon::now();
       $transfer->save();


       return redirect('merchant/transfer-return-types');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transfer = TransferReturnType::find($id);
        $transfer->delete();

        return redirect('merchant/transfer-return-types');
    }
}
