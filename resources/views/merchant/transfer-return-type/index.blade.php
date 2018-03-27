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
                       {{--  <div class="portlet-title">
                            <div class="caption"><i class="fa fa-globe"></i>Fourth Categories</div>
                            <div class="tools"></div>
                        </div> --}}
                        <div class="portlet-body">
                          <div class="panel">
                            <a href="{{url('merchant/transfer-return-types/create')}}" class="btn btn-success">Transfer Return Type</a>
                          </div>
                          <div class="panel-body">
                						 <table class="table table-hover" id="sample_2">
                						       <thead>
                							          <tr>
                                          <th>No.</th>
                                          <th>Hospital</th>
                                          <th>Department</th>
                                          <th>Program</th>
                                          <th>Transfer Return</th>
                          								<th>Name</th>
                                          <th>Price ($)</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         {{'', $n=1}}
                        							   @foreach ($transfers as $item)
                        							   <tr>
                                            <td>{{$n++}}</td>
                                            <td>{{$hospital->name}}</td>
                                            <td>
                                              @php
                                                  $department = \DB::table('hospital_departments')
                                                                    ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                                                                    ->join('transfer_returns', 'transfer_returns.hospital_program_id', '=', 'hospital_programs.id')
                                                                    ->join('transfer_return_types', 'transfer_return_types.transfer_return_id', '=', 'transfer_returns.id')
                                                                    ->select('hospital_departments.name as department_name', 'hospital_programs.name as program_name', 'transfer_returns.id as transfer_return_id')
                                                                    ->where('transfer_returns.id', $item->transfer_return_id)
                                                                    ->first();
                                              @endphp
                                                {{$department->department_name}}
                                            </td>
                                            <td>{{$department->program_name}}</td>
                                            <td>
                                                @php
                                                  $return = \App\TransferReturn::where('id', $item->transfer_return_id)->value('name');
                                                @endphp
                                                {{$return}}
                                            </td>
                            								<td>{{$item->name}}</td>
                                            <td>{{money_format('%.2n', $item->price) }}</td>
                                            <td>
                                              <!-- Action button -->
                                              <div class="btn-group">
                                                <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Action <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">

                                                    <li>
                                                      <a href="{{ url('/merchant/transfer-return-types/'.$item->id.'/edit') }}">Edit</a>
                                                    </li>

                                                  <form id="delete-form-{{$item->id}}"
                                                      method="post"
                                                      action="{{url('merchant/transfer-return-types/'.$item->id) }}"
                                                      style="display: none;">
                                                      {{csrf_field()}}
                                                      {{method_field('DELETE')}}
                                                  </form>
                                                  <li>
                                                    <a class="dropdown-item" href="" onclick="
                                                      if(confirm('Are You Sure?')) {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$item->id}}').submit();
                                                      } else {
                                                        event.preventDefault();
                                                      }
                                                    ">
                                                    Delete</a>
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
