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
                            <div class="caption"><i class="fa fa-globe"></i>Invoice</div>
                            <div class="tools"></div>
                        </div> --}}
                        <div class="portlet-body">
                          <div class="panel">
                            <div class="caption"><b>Invoice Payable Beetween {{$start_date}} and {{$end_date}}
                              {{-- <br />Condition : {{$cek_condition}} --}}

                              @php
                                $department_name = \App\HospitalDepartment::where('id', $department)->value('name');
                              @endphp
                              <br />Departmet : {{$department_name}}</b>
                              <br />Status : {{$status}}
                            </div>
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
                                    </tr>
                                </thead>
                                <tbody>
                                     {{'', $n=1, $total=0}}

                    							   @foreach ($payments as $item)

                    							   <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{Carbon\Carbon::parse($item->created_at)->format('m/d/Y')}}</td>
                                        <td>
                                          <div title="Clik to view Invoice Detail">
                                            <a href="{{url('merchant/payables/' .$item->id. '/edit')}}">{{$item->id}}</a>
                                          </div>
                                        </td>
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
                                        @elseif($item->status == 'paid')
                                            <label class="label label-success">Paid</label>
                                        @else
                                            <label class="label label-danger">Cancel</label>
                                        @endif
                                        </td>


                                      </tr>
                                      @php
                                         $total += $item->total_amount;
                                      @endphp
                                      @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="8" style="text-align:right">Total : $ {{money_format('%.2n', $total) }}</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
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
