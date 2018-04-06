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

                            <form action="{{ url('/merchant/hospital-programs/'.$program->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="hospital">Hospital</label>
                                    <input type="text" class="form-control" id="hospital" name="hospital" value="{{$hospital->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select name="hospital_department_id" class="form-control">
                                        @php
                                          $department_name = \App\HospitalDepartment::where('id', $program->hospital_department_id)->value('name');
                                        @endphp
                                        <option value="{{$program->hospital_department_id}}">{{$department_name}}</option>
                                        @foreach($departments as $department)
                                          <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="first_category_id">First Category</label>
                                    <select name="first_category_id" class="form-control">
                                      @php
                                      $first1 = \App\FirstCategory::where('id', $program->first_category_id)->first();
                                      @endphp
                                        <option value="{{$first1->id}}">{{$first1->name}}</option>
                                        @foreach ($firsts as $first)
                                            <option value="{{$first->id}}">{{$first->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="second_category_id">Second Category</label>
                                    <select name="second_category_id" class="form-control">
                                        @php
                                          $second = \App\SecondCategory::where('id', $program->second_category_id)->first();
                                        @endphp
                                        <option value="{{$second->id}}">{{$second->name}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="thrid_category_id">Thrid Category</label>
                                    <select name="thrid_category_id" class="form-control">
                                        @php
                                          $thrid = \App\ThridCategory::where('id', $program->thrid_category_id)->value('name');
                                        @endphp
                                        <option value="{{$program->thrid_category_id}}">{{$thrid}}</option>
                                    </select>
                                </div>

                                
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$program->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price ($)</label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{$program->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="discount">Discount (%)</label>
                                    <input type="text" class="form-control" id="discount" name="discount" value="{{$program->discount}}">
                                </div>
                                <div class="form-group">
                                    <label for="duration">Duration (day)</label>
                                    <input type="number" class="form-control" id="duration" name="duration" value="{{$program->duration}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description">{!! $program->description !!}</textarea>
                                </div>

                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <select class="form-control" name="status" id="status">
                                          <option value="{{$program->status}}">{{$program->status}}</option>
                                          <option value="true">True</option>
                                          <option value="false">False</option>
                                     </select>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('/merchant/hospital-programs') }}" class="btn btn-warning">Cancel</a>
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
