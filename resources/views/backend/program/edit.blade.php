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
                            <div class="caption"><i class="fa fa-globe"></i>Edit Hospital Program</div>

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

                            <form action="{{ url('/admin/hospital-programs/'.$program->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="hospital">Hospital</label>
                                    @php
                                            $hospital = \DB::table('hospitals')
                                                            ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                                                            ->select('hospital_departments.id as department_id', 'hospitals.name as hospital_name')
                                                            ->where('hospital_departments.id', $program->hospital_department_id)
                                                            ->first();
                                    @endphp
                                    <input type="text" class="form-control" id="hospital" name="hospital" value="{{$hospital->hospital_name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    @php
                                        $department = \App\HospitalDepartment::where('id',$program->hospital_department_id )->value('name');
                                    @endphp
                                    <input type="text" class="form-control" id="department" name="department" value="{{$department}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    @php
                                        $category = \App\FourthCategory::where('id', $program->fourth_category_id)->value('name');
                                    @endphp
                                    <input type="text" class="form-control" id="category" name="category" value="{{$category}}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$program->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price ($)</label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{money_format('%.2n', $program->price) }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="discount">Discount (%)</label>
                                    <input type="text" class="form-control" id="discount" name="discount" value="{{money_format('%.2n', $program->discount) }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="notices">Notices</label>
                                    <textarea class="form-control" name="notices" id="notes">{!! $program->notices !!}</textarea>
                                </div>

                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <select class="form-control" name="status" id="status">
                                          <option value="{{$program->status}}">{{$program->status}}</option>
                                          <option value="true">True</option>
                                          <option value="false">False</option>
                                          <option value="banned">Banned</option>
                                     </select>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('/admin/hospital-programs') }}" class="btn btn-warning">Cancel</a>
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
