<?php

namespace App\Http\Controllers\Merchant;
use App\Invoice;
use Carbon\Carbon;
use DB;
use Mail;
use App\Mail\OrderProcessed;
use App\Mail\OrderFinished;
use App\Mail\OrderCanceled;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceMerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = DB::table('hospitals')
                            ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                            ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                            ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                            ->select('invoices.*', 'hospitals.merchant_id as merchant_id')
                            ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                            ->whereIn('invoices.status', ['confirm', 'process', 'finish', 'cancel'])
                            ->get();

        return view('merchant/invoice/index')->with('invoices', $invoices)
                                            ->with('page_title', 'Invoice | Merchant Center MyWorldHealt.Com');
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
        return view('merchant/invoice/edit')->with('invoice', $invoice)
                                          ->with('page_title', 'Edit Invoice | Merchant Center MyWorldHealt.Com');
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
          $invoice->updated_at    = Carbon::now();
          $invoice->save();


          $customer = \App\User::where('id', $invoice->user_id)->first();
          $hospital = DB::table('hospitals')
                      ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                      ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                      ->select('hospitals.name as hospital_name',
                                'hospital_programs.id as program_id',
                                'hospital_departments.name as department_name',
                                'hospital_programs.name as program_name')
                      ->where('hospital_programs.id', $invoice->hospital_program_id)
                      ->first();
          $content = [
             'title'              => 'Process Order',
             'order_number'       => $invoice->order_id,
             'program'            => $hospital->program_name,
             'department'          => $hospital->department_name,
             'hospital'           => $hospital->hospital_name,
             'customer'           => $customer->name,

          ];

          // $receiverAddress = $email_hospital;
           $receiverAddress = 'rully.arfan@gmail.com';
           $emailCustomer = $customer->email;

          if($invoice->status == 'process')
          {

             Mail::to($emailCustomer)
                      ->cc($receiverAddress)
                      ->send(new OrderProcessed($content));

          }elseif($invoice->status == 'finish'){
              Mail::to($emailCustomer)
                       ->cc($receiverAddress)
                       ->send(new OrderFinished($content));
          }else{
            Mail::to($emailCustomer)
                     ->cc($receiverAddress)
                     ->send(new OrderCanceled($content));
          }


          return redirect('merchant/invoices');

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

        $invoices = DB::table('hospitals')
                            ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                            ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                            ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                            ->select('invoices.*', 'hospitals.merchant_id as merchant_id')
                            ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                            ->where('invoices.status', $status)
                            ->orderBy('id', 'desc')
                            ->get();

        return view('merchant/invoice/status')->with('invoices', $invoices)
                                            ->with('page_title', 'Invoice | Merchant Center MyWorldHealt.Com');


    }
}
