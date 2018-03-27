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
                            <div class="caption"><i class="fa fa-globe"></i>Add Hospital Department</div>

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

                            <form action="{{ url('/merchant/hospital-departments/') }}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                <div class="form-group">
                                    <label for="hospital_name">Hospital</label>
                                    <input type="text" class="form-control" id="hospital_name" name="hospital_name" value="{{$hospital->name}}" disabled>
                                    <input type="hidden" class="form-control" id="hospital_id" name="hospital_id" value="{{$hospital->id}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="doctor">Doctor</label>
                                    <input type="text" class="form-control" id="doctor" name="doctor">
                                </div>
                                <div class="form-group">
                                    <label for="doctor_title">Doctor Title</label>
                                    <input type="text" class="form-control" id="doctor_title" name="doctor_title">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="picture">Picture</label>
                                    <input type="file" class="form-control" name="picture">
                                </div>

                                 <button type="submit" class="btn btn-primary">Add</button>
                                 <a href="{{ url('/merchant/hospital-departments') }}" class="btn btn-warning">Cancel</a>
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
