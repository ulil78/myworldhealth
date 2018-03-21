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
                       {{--  <div class="portlet-title">
                            <div class="caption"><i class="fa fa-globe"></i>Fourth Categories</div>
                            <div class="tools"></div>
                        </div> --}}
                        <div class="portlet-body">
                          <div class="panel">
                            <a href="#" class="btn btn-success">Transfer Return Type</a>
                          </div>
                          <div class="panel-body">
                						 <table class="table table-hover" id="sample_2">
                						       <thead>
                							          <tr>
                                          <th>No.</th>
                                          <th>Transfer Arrival</th>
                          								<th>Name</th>
                                          <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         {{'', $n=1}}
                        							   @foreach ($transfers as $item)
                        							   <tr>
                                            <td>{{$n++}}</td>
                                            <td>
                                                @php
                                                  $arrival = \App\TransferReturn::where('id', $item->transfer_return_id)->value('name');
                                                @endphp
                                                {{$arrival}}
                                            </td>
                            								<td>{{$item->name}}</td>
                                            <td>{{money_format('%.2n', $item->price) }}</td>
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
