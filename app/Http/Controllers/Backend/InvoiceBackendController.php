<?php

namespace App\Http\Controllers\Backend;
use App\Invoice;
use App\PaymentMerchant;
use Carbon\Carbon;
use App\Mail\PaymentConfirm;
use Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id', 'desc')->get();
        return view('backend/invoice/index')->with('invoices', $invoices)
                                            ->with('page_title', 'Invoice | Admin Center MyWorldHealt.Com');
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
        $invoice = Invoice::find($id);
        return view('backend/Invoice/edit')->with('invoice', $invoice)
                                          ->with('page_title', 'Edit Invoice | Admin Center MyWorldHealt.Com');
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
          $invoice = Invoice::find($id);
          $invoice->status        = $request->get('status');
          $invoice->notices       = $request->get('notices');
          $invoice->updated_at    = Carbon::now();
          $invoice->save();

          // if($invoice->status == 'confirm')
          // {
          //
          //       $hospital_program = \App\HospitalProgram::where('id', $invoice->hospital_program_id)->value('name');
          //       $email_hospital   = \DB::table('merchants')
          //                               ->join('hospitals', 'hospitals.merchant_id', '=', 'merchants.id')
          //                               ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
          //                               ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
          //                               ->select('hospital_programs.id as program_id', 'merchants.email as hospital_email')
          //                               ->where('hospital_programs.id', $invoice->hospital_program_id)
          //                               ->first();
          //       $content = [
          //          'title'              => 'test email',
          //          'order_number'       => $invoice->order_id,
          //          'program'            => $hospital_program
          //
          //       ];
          //
          //    // $receiverAddress = $email_hospital;
          //     $receiverAddress = 'rully.arfan@gmail.com';
          //
          //    Mail::to($receiverAddress)->send(new PaymentConfirm);
          // }


          if($invoice->status == 'finish')
          {
              $payment = new PaymentMerchant;
              $payment->invoice_id            = $id;
              $payment->hospital_program_id   = $invoice->hospital_program_id;
              $payment->interpreter_amount    = $invoice->interpreter_amount;
              $payment->transfer_amount       = $invoice->transfer_amount;
              $payment->total_amount          = $invoice->total_amount;
              $payment->status               = 'new';
              $payment->save();

          }

          return redirect('admin/invoices');

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

        $invoices = Invoice::where('status', $status)->orderBy('id', 'desc')->get();
        return view('backend/invoice/status')->with('invoices', $invoices)
                                            ->with('page_title', 'Invoice | Admin Center MyWorldHealt.Com');



    }
}
