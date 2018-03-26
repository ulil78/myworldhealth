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
                            <div class="caption"><b>Additional Service</b></div>
                            <div class="tools"></div>
                          </div>
                          <div class="panel-body">

                           <table class="table table-striped table-hover" id="sample_2">
                                 <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th>Hospital</th>
                                        <th>Department</th>
                                        <th>Program</th>
                                        <th>Name</th>
                                        <th>Price ($)</th>
                                        <th>Notices</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                       {{'', $n=1}}
                                       @foreach ($services as $item)
                                       <tr>
                                          <td>{{$n++}}</td>
                                          <td>
                                            @php
                                                $hospital = \DB::table('hospitals')
                                                                  ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                                                                  ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                                                                  ->select('hospital_departments.id as department_id', 'hospital_programs.id as program_id', 'hospitals.name as hospital_name')
                                                                  ->where('hospital_programs.id', $item->hospital_program_id)
                                                                  ->first();
                                            @endphp
                                            {{$hospital->hospital_name}}
                                          </td>
                                          <td>
                                            @php
                                                $department = \DB::table('hospital_departments')
                                                                  ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                                                                  ->select('hospital_departments.name as department_name', 'hospital_programs.id as program_id')
                                                                  ->where('hospital_programs.id', $item->hospital_program_id)
                                                                  ->first();
                                            @endphp
                                              {{$department->department_name}}
                                          </td>
                                          <td>
                                              @php
                                                $program = \App\HospitalProgram::where('id', $item->hospital_program_id)->value('name');
                                              @endphp
                                              {{$program}}
                                          </td>
                                          <td>{{$item->name}}</td>
                                          <td>{{money_format('%.2n', $item->price) }}</td>
                                          <td>{!! $item->notices !!}</td>
                                          <td>
                                          @if($item->status == 'true')
                                              <label class="label label-success">True</label>
                                          @elseif($item->status == 'false')
                                              <label class="label label-primary">False</label>
                                          @else
                                              <label class="label label-danger">Banned</label>
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
                                                  <a href="{{ url('/admin/additional-services/'.$item->id.'/edit') }}">Edit</a>
                                                </li>
                                                <form id="delete-form-{{$item->id}}" 
                                                    method="post" 
                                                    action="{{url('admin/additional-services/'.$item->id) }}"
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
