<?php

namespace App\Http\Controllers\Merchant;
use App\PaymentMerchant;
use Carbon\Carbon;
use DB;
use Mail;
use App\Mail\PaymentRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayableMerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = DB::table('hospitals')
                            ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                            ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                            ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                            ->join('payment_merchants', 'payment_merchants.invoice_id', '=', 'invoices.id')
                            ->select('payment_merchants.*', 'hospitals.merchant_id as merchant_id')
                            ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                            ->orderBy('id', 'desc')
                            ->get();

        return view('merchant/payment-merchant/index')->with('payments', $payments)
                                                     ->with('page_title', 'Payment Merchants | Merchant Center MyWorldhealth.Com');
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
        return view('merchant/payment-merchant/edit')->with('payment', $payment)
                                                    ->with('page_title', 'Edit Payment Merchant | Merchant Center MyWorldhealth.Com');

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

          $hospital = DB::table('hospitals')
                      ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                      ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                      ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                      ->join('payment_merchants', 'payment_merchants.invoice_id', '=', 'invoices.id')
                      ->select('hospitals.name as hospital_name',
                                'hospital_programs.id as program_id',
                                'hospital_departments.name as department_name',
                                'hospital_programs.name as program_name')
                      ->where('hospital_programs.id', $payment->hospital_program_id)
                      ->first();


          $content = [
             'title'              => 'Payment Request',
             'invoice_id'         => $payment->invoice_id,
             'program'            => $hospital->program_name,
             'department'         => $hospital->department_name,
             'hospital'           => $hospital->hospital_name,
             'total_amount'       => $payment->total_maount,


          ];

          // $receiverAddress = $email_hospital;

         $receiverAddress = 'billing@myworldhealth.com';

         Mail::to($receiverAddress)->send(new PaymentRequest($content));

         return redirect('merchant/payables');
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

        $payments = DB::table('hospitals')
                            ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                            ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                            ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                            ->join('payment_merchants', 'payment_merchants.invoice_id', '=', 'invoices.id')
                            ->select('payment_merchants.*', 'hospitals.merchant_id as merchant_id')
                            ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                            ->where('payment_merchants.status', $status)
                            ->orderBy('id', 'desc')
                            ->get();

        return view('merchant/payment-merchant/status')->with('payments', $payments)
                                            ->with('page_title', 'Payment Merchant | Merchant Center MyWorldHealt.Com');



    }
}
