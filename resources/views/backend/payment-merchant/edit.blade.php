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
                            <div class="caption"><i class="fa fa-globe"></i>Edit Payemnt Merchant</div>

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

                            <form action="{{ url('/admin/payment-merchants/'.$payment->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">


                                <div class="form-group">
                                    <label for="id">payment No.#</label>
                                    <input type="text" class="form-control" id="id" name="id" value="{{$payment->id}}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="hospital">Hospital</label>
                                    @php
                                      $hospital = \DB::table('hospitals')
                                                        ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                                                        ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                                                        ->select('hospitals.name as hospital_name', 'hospital_programs.id as program_id')
                                                        ->where('hospital_programs.id', $payment->hospital_program_id)
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
                                                        ->where('hospital_programs.id', $payment->hospital_program_id)
                                                        ->first();
                                    @endphp
                                    <input type="text" class="form-control" id="order_id" name="order_id" value="{{$depatment->department_name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="program">Program</label>
                                    @php
                                      $program = \App\HospitalProgram::where('id', $payment->hospital_program_id)->value('name');
                                    @endphp
                                    <input type="text" class="form-control" id="program" name="program" value="{{$program}}" disabled>
                                </div>


                                <div class="form-group">
                                    <label for="interpreter_amount">Interpreter Amount ($)</label>
                                    <input type="text" class="form-control" id="interpreter_amount" name="interpreter_amount" value="{{money_format('%.2n', $payment->interpreter_amount) }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="transfer_amount">Transfer Amount ($)</label>
                                    <input type="text" class="form-control" id="transfer_amount" name="transfer_amount" value="{{money_format('%.2n', $payment->transfer_amount) }}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="total_amount">Total Amount ($)</label>
                                    <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{money_format('%.2n', $payment->total_amount) }}" disabled>
                                </div>
                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <select class="form-control" name="status" id="status">
                                          <option value="{{$payment->status}}">{{$payment->status}}</option>
                                          <option value="paid">Paid</option>
                                     </select>
                                 </div>
                                
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('/admin/payment-merchants') }}" class="btn btn-warning">Cancel</a>
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
