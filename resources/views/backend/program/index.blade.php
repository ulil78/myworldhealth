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
                            <div class="caption"><i class="fa fa-globe"></i>Hospital Program</div>
                            <div class="tools"></div>
                        </div>
                        <div class="portlet-body">
            						 <table class="table table-striped table-bordered table-hover" id="sample_2">
            						       <thead>
            							          <tr>
                                      <th>No.</th>
                                      <th>Hospital</th>
                                      <th>Department</th>
                                      <th>Category</th>
                                      <th>Name</th>
                      								<th>Notices</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     {{'', $n=1}}
                    							   @foreach ($programs as $item)
                    							   <tr>
                                        <td>{{$n++}}</td>
                                        <td>
                                          @php
                                              $hospital = \DB::table('hospitals')
                                                                ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                                                                ->select('hospital_departments.id as department_id', 'hospitals.name as hospital_name')
                                                                ->where('hospital_departments.id', $item->hospital_department_id)
                                                                ->first();
                                          @endphp
                                          {{$hospital->hospital_name}}
                                        </td>
                                        <td>
                                          @php
                                              $department = \App\HospitalDepartment::where('id', $item->hospital_department_id)->value('name');
                                          @endphp
                                            {{$department}}
                                        </td>
                                        <td>
                                            @php
                                              $category = \App\FourthCategory::where('id', $item->fourth_category_id)->value('name');
                                            @endphp
                                            {{$category}}
                                        </td>
                                        <td>{{$item->name}}</td>
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
                        									  <a href="{{ url('/admin/hospital-programs/'.$item->id.'/edit') }}" class="btn btn-warning">EDIT</a>
                                            <form action="{{ url('admin/hospital-programs/'.$item->id) }}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">DELETE</button>
                                            </form>
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
