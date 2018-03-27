@extends('merchant/layouts/master')
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
                            <div class="caption"><i class="fa fa-globe"></i>Edit Transfer Arrival</div>

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

                            <form action="{{ url('/merchant/transfer-return-types/'.$transfer->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="hospital">Hospital</label>
                                    <input type="text" class="form-control" id="hospital" name="hospital" value="{{$hospital->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="hospital_department_id_return">Department</label>
                                    <select name="hospital_department_id_return" class="form-control">
                                        @php
                                          $department_name = \DB::table('hospital_departments')
                                                            ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                                                            ->join('transfer_returns', 'transfer_returns.hospital_program_id', '=', 'hospital_programs.id')
                                                            ->join('transfer_return_types', 'transfer_return_types.transfer_return_id', '=', 'transfer_returns.id')
                                                            ->select('hospital_departments.name as department_name', 'hospital_programs.name as program_name', 'transfer_returns.id as transfer_return_id')
                                                            ->where('transfer_returns.id', $transfer->transfer_return_id)
                                                            ->first();
                                        @endphp
                                        <option>{{$department_name->department_name}}</option>
                                        @foreach($departments as $department)
                                          <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="hospital_program_id_return">Program</label>
                                    <select name="hospital_program_id_return" class="form-control">
                                      <option>{{$department_name->program_name}}</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="transfer_return_id">Transfer Arrival</label>
                                    <select name="transfer_return_id" class="form-control">
                                      @php
                                        $return = \App\TransferReturn::where('id', $transfer->transfer_return_id)->value('name');
                                      @endphp
                                      <option value="{{$transfer->transfer_return_id}}">{{$return}}</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$transfer->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="price">Price ($)</label>
                                    <input type="number" class="form-control" id="price" name="price" step="any" value="{{$transfer->price}}">
                                </div>


                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('/merchant/transfer-return-types') }}" class="btn btn-warning">Cancel</a>
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
