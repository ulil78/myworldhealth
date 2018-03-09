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
                            <div class="caption"><i class="fa fa-globe"></i>Edit Hospital Department</div>

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

                            <form action="{{ url('/admin/hospital-departments/'.$department->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="name">Hospital</label>
                                    @php
                                      $hospital = \App\Hospital::where('id', $department->hospital_id)->value('name');
                                    @endphp
                                    <input type="text" class="form-control" id="name" name="name" value="{{$hospital}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$department->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="doctor">Doctor</label>
                                    <input type="text" class="form-control" id="doctor" name="doctor" value="{{$department->doctor}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="doctor_title">Doctor Title</label>
                                    <input type="text" class="form-control" id="doctor_title" name="doctor_title" value="{{$department->doctor_title}}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="picture">Picture</label>
                                    <img src="{{$department->path.$department->filename}}" height="250">
                                </div>

                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <select class="form-control" name="status" id="status">
                                          <option value="{{$department->status}}">{{$department->status}}</option>
                                          <option value="true">True</option>
                                          <option value="false">False</option>
                                          <option value="banned">Banned</option>
                                     </select>
                                 </div>

                                 <div class="form-group">
                                     <label for="notices">Notices</label>
                                     <textarea class="form-control" name="notices" id="notes">{!! $department->notices !!}</textarea>
                                 </div>

                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('/admin/hospital-departments') }}" class="btn btn-warning">Cancel</a>
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
