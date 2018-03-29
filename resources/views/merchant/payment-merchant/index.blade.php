@extends('merchant/layouts/master')

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
                        {{-- <div class="portlet-title">
                            <div class="caption"><i class="fa fa-globe"></i>Payement Merchant</div>
                            <div class="tools"></div>
                        </div> --}}
                        <div class="portlet-body">
                          <div class="panel">
                            <div class="caption"><b>Payement Merchant</b></div>
                            <div class="tools"></div>
                          </div>
            						 <table class="table table-striped table-hover" id="sample_2">
            						       <thead>
            							          <tr>
                                      <th>No.</th>
                                      <th>Date</th>
                                      <th>Invoice No.#</th>
                                      <th>Hospital</th>
                                      <th>Program</th>
                                      <th>Amount($)</th>
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
                                            <!-- Action button -->
                                            <div class="btn-group">
                                              <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu">
                                                <li>
                                                  <a href="{{ url('/merchant/payables/'.$item->id.'/edit') }}">Edit</a>
                                                </li>
                                              </ul>
                                            </div>

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
