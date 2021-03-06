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
                        {{-- <div class="portlet-title">
                            <div class="caption"><i class="fa fa-globe"></i>Hospital Program</div>
                            <div class="tools"></div>
                        </div> --}}
                        <div class="portlet-body">

                          <div class="panel">
                            <div class="caption"><b>Patient Transaction</b></div>
                            <div class="tools"></div>
                          </div>
                          <div class="panel-body">

                           <table class="table table-hover" id="sample_2">
                                 <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Order No.#</th>
                                        <th>Program</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th> Action </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                       {{'', $n=1}}
                                       @foreach ($patients as $item)
                                       <tr>
                                          <td>{{$n++}}</td>
                                          <td>{{$item->patient_name}}</td>
                                          <td>
                                              @php
                                                $invoice = \App\Invoice::where('order_id', $item->order_id)->value('id');
                                              @endphp
                                              <div title="clik to view invoice">
                                                <a href="{{url('admin/invoices/' .$invoice. '/edit')}}" alt="invoice">{{$item->order_id}}</a>
                                              </div>
                                          </td>
                                          <td>{{$item->program}}</td>
                                          <td>{{Carbon\Carbon::parse($item->start_date)->format('m-d-Y')}}</td>
                                          <td>{{Carbon\Carbon::parse($item->end_date)->format('m-d-Y')}}</td>
                                          <td>
                                            <!-- Action button -->
                                            <div class="btn-group">
                                              <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu">
                                                <li>
                                                  <a href="{{ url('patient-transactions.show'.$item->id.'/edit') }}">Show</a>
                                                </li>
                                              </ul>
                                            </div>
                                          </td>
                                        </tr>
                                        @endforeach
                                  </tbody>
                            </table>
                          </div>
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
