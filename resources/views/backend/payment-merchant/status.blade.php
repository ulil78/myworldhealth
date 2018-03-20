@extends('backend/layouts/master')

@section('main-content')
<!-- BEGIN CONTENT -->
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
                            <div class="caption"><i class="fa fa-globe"></i>Payment Merchant</div>
                            <div class="tools"></div>
                        </div>
                        <div class="portlet-body">
            						 <table class="table table-striped table-bordered table-hover" id="sample_2">
            						       <thead>
            							          <tr>
                                      <th>No.</th>
                                      <th>Date</th>
                                      <th>Invoice No.#</th>
                                      <th>Hospital</th>
                                      <th>Program</th>
                                      <th>Total Amount</th>
                      								<th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     {{'', $n=1}}
                    							   @foreach ($payments as $item)
                    							   <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{Carbon\Carbon::parse($item->created_at)->format('m/d/Y')}}</td>
                                        <td>{{$item->invoice_id}}</td>

                                        <td>
                                          @php
                                            $hospital = \DB::table('hospitals')
                                                              ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                                                              ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                                                              ->select('hospitals.name as hospital_name', 'hospital_programs.id as program_id')
                                                              ->where('hospital_programs.id', $item->hospital_program_id)
                                                              ->first();
                                          @endphp
                                          {{$hospital->hospital_name}}
                                        </td>
                                        <td>
                                          @php
                                            $program = \App\HospitalProgram::where('id', $item->hospital_program_id)->value('name');
                                          @endphp
                                          {{$program}}
                                        </td>
                                        <td>{{money_format('%.2n', $item->total_amount) }}</td>

                                        <td>
                                        @if($item->status == 'new')
                                            <label class="label label-primary">New</label>
                                        @elseif($item->status == 'request')
                                            <label class="label label-warning">Request</label>
                                        @else
                                            <label class="label label-success">Paid</label>
                                        @endif
                                        </td>

                                        <td>
                        									  <a href="{{ url('/admin/invoices/'.$item->id.'/edit') }}" class="btn btn-warning">EDIT</a>

                                        </td>

                                      </tr>
                                      @endforeach
                                </tbody>
                          </table>
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
