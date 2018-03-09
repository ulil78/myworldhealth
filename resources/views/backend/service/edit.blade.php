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
                            <div class="caption"><i class="fa fa-globe"></i>Edit Additionl Service</div>

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

                            <form action="{{ url('/admin/additional-services/'.$service->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="hospital">Hospital</label>
                                    @php
                                        $hospital = \DB::table('hospitals')
                                                          ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                                                          ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                                                          ->select('hospital_departments.id as department_id', 'hospital_programs.id as program_id', 'hospitals.name as hospital_name')
                                                          ->where('hospital_programs.id', $service->hospital_program_id)
                                                          ->first();
                                    @endphp
                                    <input type="text" class="form-control" id="hospital" name="hospital" value="{{$hospital->hospital_name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    @php
                                        $department = \DB::table('hospital_departments')
                                                          ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                                                          ->select('hospital_departments.name as department_name', 'hospital_programs.id as program_id')
                                                          ->where('hospital_programs.id', $service->hospital_program_id)
                                                          ->first();
                                    @endphp
                                    <input type="text" class="form-control" id="department" name="department" value="{{$department->department_name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="category">Program</label>
                                    @php
                                        $program = \App\HospitalProgram::where('id', $service->hospital_program_id)->value('name');
                                    @endphp
                                    <input type="text" class="form-control" id="category" name="category" value="{{$program}}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$service->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price ($)</label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{money_format('%.2n', $service->price) }}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" disabled>{!! $service->description !!}</textarea>
                                </div>

                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <select class="form-control" name="status" id="status">
                                          <option value="{{$service->status}}">{{$service->status}}</option>
                                          <option value="true">True</option>
                                          <option value="false">False</option>
                                          <option value="banned">Banned</option>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="notices">Notices</label>
                                     <textarea class="form-control" name="notices" id="notes">{!! $service->notices !!}</textarea>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('/admin/additional-services') }}" class="btn btn-warning">Cancel</a>
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
