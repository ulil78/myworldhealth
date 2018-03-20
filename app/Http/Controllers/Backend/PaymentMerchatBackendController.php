<?php

namespace App\Http\Controllers\Backend;
use App\PaymentMerchant;
use Carbon\Carbon;
use App\Mail\PaymentPaid;
use Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentMerchatBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = PaymentMerchant::orderBy('id', 'desc')->get();
        return view('backend/payment-merchant/index')->with('payments', $payments)
                                                     ->with('page_title', 'Payment Merchants | Admin Center MyWorldhealth.Com');
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
        $payment = PaymentMerchant::find($id);
        return view('backend/payment-merchant/edit')->with('payment', $payment)
                                                    ->with('page_title', 'Edit Payment Merchant | Admin Center MyWorldhealth.Com');

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
          $payment = PaymentMerchant::find($id);
          $payment->status        = $request->get('status');
          $payment->updated_at    = Carbon::now();
          $payment->save();

          $hospital_program = \App\HospitalProgram::where('id', $payment->hospital_program_id)->value('name');
          $email_hospital   = \DB::table('merchants')
                                  ->join('hospitals', 'hospitals.merchant_id', '=', 'merchants.id')
                                  ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                                  ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                                  ->select('hospital_programs.id as program_id', 'merchants.email as hospital_email')
                                  ->where('hospital_programs.id', $payment->hospital_program_id)
                                  ->first();

          $content = [
             'title'              => 'Paid Booking Order',
             'invoice_number'       => $payment->invoice_id,
             'program'            => $hospital_program,
             'total_amount'       => $payment->total_amount

          ];

          // $receiverAddress = $email_hospital;

         $receiverAddress = 'rully.arfan@gmail.com';

         Mail::to($receiverAddress)->send(new PaymentPaid($content));

         return redirect('admin/payment-merchants');
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

    public function getStatus($status)
    {

        $payments = PaymentMerchant::where('status', $status)->orderBy('id', 'desc')->get();
        return view('backend/payment-merchant/status')->with('payments', $payments)
                                            ->with('page_title', 'Payment Merchant | Admin Center MyWorldHealt.Com');



    }
}
