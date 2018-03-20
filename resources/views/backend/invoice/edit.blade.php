@extends('backend/layouts/master')
@section('main-content')
<div class="page-content-wrapper">
      <!-- BEGIN CONTENT BODY -->
      <div class="page-content">
            <!-- BEGIN PAGE HEAD-->

            <!-- begin content-->
            <div class="row">
                <div class="col-md-12">
                  <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption"><i class="fa fa-globe"></i>Edit Invoice</div>

                        </div>
                        <div class="portlet-body">
                            @if (count($errors) > 0)
                               <div class="alert alert-danger">
                                   <ul>
                                   @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                   @endforeach
                                   </ul>
                               </div>
                            @endif

                            <form action="{{ url('/admin/invoices/'.$invoice->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">


                                <div class="form-group">
                                    <label for="id">Invoice No.#</label>
                                    <input type="text" class="form-control" id="id" name="id" value="{{$invoice->id}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="order_id">Order No.#</label>
                                    <input type="text" class="form-control" id="order_id" name="order_id" value="{{$invoice->order_id}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="hospital">Hospital</label>
                                    @php
                                      $hospital = \DB::table('hospitals')
                                                        ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                                                        ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                                                        ->select('hospitals.name as hospital_name', 'hospital_programs.id as program_id')
                                                        ->where('hospital_programs.id', $invoice->hospital_program_id)
                                                        ->first();
                                    @endphp
                                    <input type="text" class="form-control" id="hospital" name="hospital" value="{{$hospital->hospital_name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="depatment">Hospital Department</label>
                                    @php
                                      $depatment = \DB::table('hospital_departments')
                                                        ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                                                        ->select('hospital_departments.name as department_name', 'hospital_programs.id as program_id')
                                                        ->where('hospital_programs.id', $invoice->hospital_program_id)
                                                        ->first();
                                    @endphp
                                    <input type="text" class="form-control" id="order_id" name="order_id" value="{{$depatment->department_name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="program">Program</label>
                                    @php
                                      $program = \App\HospitalProgram::where('id', $invoice->hospital_program_id)->value('name');
                                    @endphp
                                    <input type="text" class="form-control" id="program" name="program" value="{{$program}}" disabled>
                                </div>
                                @php
                                    $start_date = date('m/d/Y', strtotime($invoice->start_date));
                                @endphp
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="text" class="form-control input-medium date-picker" id="start_date" name="start_date" value="{{$start_date}}" disabled>
                                </div>
                                @php
                                    $end_date = date('m/d/Y', strtotime($invoice->end_date));
                                @endphp
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="text" class="form-control input-medium date-picker" id="end_date" name="end_date" value="{{$end_date}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="interpreter_qty">Interpreter Qty</label>
                                    <input type="text" class="form-control" id="interpreter_qty" name="interpreter_qty" value="{{$invoice->interpreter_qty}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="interpreter_amount">Interpreter Amount ($)</label>
                                    <input type="text" class="form-control" id="interpreter_amount" name="interpreter_amount" value="{{money_format('%.2n', $invoice->interpreter_amount) }}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="translation_med_document_qty">Translation Medical Document Qty</label>
                                    <input type="text" class="form-control" id="translation_med_document_qty" name="translation_med_document_qty" value="{{$invoice->translation_med_document_qty}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="translation_med_document_amount">Translation Medical Document Amount ($)</label>
                                    <input type="text" class="form-control" id="translation_med_document_amount" name="translation_med_document_amount" value="{{money_format('%.2n', $invoice->translation_med_document_amount) }}" disabled>
                                </div>
                                @php
                                  $transfer_arrival = \App\TransferArrival::where('id', $invoice->transfer_arrival_id)->value('name');
                                  $transfer_return = \App\TransferReturn::where('id', $invoice->transfer_return_id)->value('name');
                                  $transfer_arrival_type = \App\TransferArrivalType::where('id', $invoice->transfer_arrival_type_id)->value('name');
                                  $transfer_return_type = \App\TransferReturnType::where('id', $invoice->transfer_return_type_id)->value('name');
                                @endphp

                                <div class="form-group">
                                    <label for="transfer_arrival">Transfer Arrival</label>
                                    <input type="text" class="form-control" id="transfer_arrival" name="transfer_arrival" value="{{$transfer_arrival}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="transfer_arrival_type">Transfer Arrival Type</label>
                                    <input type="text" class="form-control" id="transfer_arrival_type" name="transfer_arrival_type" value="{{$transfer_arrival_type}}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="transfer_return">Transfer Return</label>
                                    <input type="text" class="form-control" id="transfer_return" name="transfer_return" value="{{$transfer_return}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="transfer_return_typ">Transfer Return Type</label>
                                    <input type="text" class="form-control" id="transfer_return_typ" name="transfer_return_typ" value="{{$transfer_return_type}}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="transfer_amount">Transfer Amount ($)</label>
                                    <input type="text" class="form-control" id="transfer_amount" name="transfer_amount" value="{{money_format('%.2n', $invoice->transfer_amount) }}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="total_amount">Total Amount ($)</label>
                                    <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{money_format('%.2n', $invoice->total_amount) }}" disabled>
                                </div>


                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <select class="form-control" name="status" id="status">
                                          <option value="{{$invoice->status}}">{{$invoice->status}}</option>
                                          @if($invoice->status == 'finish')
                                            <option value="cancel">Cancel</option>
                                          @else
                                            <option value="unpaid">UnPaid</option>
                                            <option value="paid">Paid</option>
                                            <option value="confirm">Confirm</option>
                                            <option value="finish">Finish</option>
                                            <option value="cancel">Cancel</option>
                                          @endif


                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="notices">Notices</label>
                                     <textarea class="form-control" name="notices" id="notices">{!! $invoice->notices !!}</textarea>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('/admin/invoices') }}" class="btn btn-warning">Cancel</a>
                            </form>

                        </div>
                       <!-- END EXAMPLE TABLE PORTLET -->
                     </div>
                 </div>
             </div>
           <!-- end content -->
     </div>
     <!-- END CONTENT BODY -->
 </div>
 <!-- END CONTENT -->
 @endsection
