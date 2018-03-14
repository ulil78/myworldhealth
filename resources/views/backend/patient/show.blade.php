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
                            <div class="caption"><i class="fa fa-globe"></i>Patient Detail</div>
                            <div class="tools"></div>
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

                            <form action="#" method="POST"  enctype="multipart/form-data">

                                 <div class="form-group">
                                     <label for="name">Name</label>
                                     <input type="text" class="form-control" id="name" name="name" value="{{$patient->name}}" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label for="age">Age</label>
                                     <input type="text" class="form-control" id="age" name="age" value="{{$patient->age}}" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label for="age">Age</label>
                                     <input type="text" class="form-control" id="age" name="age" value="{{$patient->age}}" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label for="gender">Gender</label>
                                     <input type="text" class="form-control" id="gender" name="gender" value="{{$patient->gender}}" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label for="weight">Weight</label>
                                     <input type="text" class="form-control" id="weight" name="weight" value="{{$patient->weight}}" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label for="height">height</label>
                                     <input type="text" class="form-control" id="height" name="height" value="{{$patient->height}}" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label for="diagnosis">Diagnosis</label>
                                     <div class="jumbotron" style="padding:20px;">
                                       {!! $patient->diagnosis !!}
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="picture">Picture</label>
                                     <img src="{{asset($patient->path.$patient->filename)}}" height="300">
                                 </div>
                                 <a href="{{ url('/admin/patients') }}" class="btn btn-warning">Close</a>
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
