<?php

namespace App\Http\Controllers\Backend;
use App\Voucher;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Voucher::orderBy('id', 'desc')->get();
        return view('backend/voucher/index')->with('vouchers', $vouchers)
                                            ->with('page_title', 'Voucher | Admin Center - MyWorldHealth.Com');
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
          return view('backend/voucher/create')->with('page_title', 'Add Voucher | Admin Center - MyWorldHealth.Com');
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
                  'name'                        => 'required',
                  'code_voucher'                => 'required',
                  'start_date'                  => 'required',
                  'end_date'                    => 'required',
                  'minimum_transaction'         => 'required',
                  'description'                 => 'required'
          );

          $this->validate($request, $rules);

          $start      = $request->get('start_date');
          $start_date = date('Y-m-d', strtotime($start));

          $end        = $request->get('end_date');
          $end_date   = date('Y-m-d', strtotime($end));

          $voucher = new Voucher;
          $voucher->name                 = $request->get('name');
          $voucher->code_voucher         = $request->get('code_voucher');
          $voucher->minimum_transaction  = $request->get('minimum_transaction');
          $voucher->start_date           = $start_date;
          $voucher->end_date             = $end_date;
          $voucher->description          = $request->get('description');
          $voucher->save();

          return redirect('admin/vouchers');

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
          $voucher  = Voucher::find($id);
          return view('backend/voucher/edit')->with('voucher', $voucher)
                                             ->with('page_title', 'Edit Voucher | Admin Center - MyWorldHealth.Com');
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
                'name'                        => 'required',
                'code_voucher'                => 'required',
                'start_date'                  => 'required',
                'end_date'                    => 'required',
                'minimum_transaction'         => 'required',
                'description'                 => 'required'
        );

        $this->validate($request, $rules);

        $start      = $request->get('start_date');
        $start_date = date('Y-m-d', strtotime($start));

        $end        = $request->get('end_date');
        $end_date   = date('Y-m-d', strtotime($end));

        $voucher = Voucher::find($id);
        $voucher->name                 = $request->get('name');
        $voucher->code_voucher         = $request->get('code_voucher');
        $voucher->minimum_transaction  = $request->get('minimum_transaction');
        $voucher->start_date           = $start_date;
        $voucher->end_date             = $end_date;
        $voucher->description          = $request->get('description');
        $voucher->updated_at           = Carbon::now();
        $voucher->status               = $request->get('status');
        $voucher->save();

        return redirect('admin/vouchers');


    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $voucher = Voucher::find($id);
        $voucher->delete();

        return redirect('admin/vouchers');
    }
}
