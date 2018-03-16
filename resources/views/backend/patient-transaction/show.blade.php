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
                            <div class="caption"><i class="fa fa-globe"></i>Patient Transaction Detail</div>
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
                                     <label for="patien_name">Patient Name</label>
                                     <input type="text" class="form-control" id="patien_name" name="patien_name" value="{{$patient->patient_name}}" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label for="user_id">User id</label>
                                     @php
                                       $user_name = \App\User::where('id', $patient->user_id)->value('name');
                                     @endphp
                                     <input type="text" class="form-control" id="user_id" name="user_id" value="{{$user_name}}" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label for="order_id">Order id</label>
                                     <input type="text" class="form-control" id="order_id" name="order_id" value="{{$patient->order_id}}" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label for="program">Hospital Program</label>
                                     <input type="text" class="form-control" id="program" name="program" value="{{$patient->program}}" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label for="start_date">Start Date</label>
                                     <input type="text" class="form-control" id="start_date" name="start_date" value="{{Carbon\Carbon::parse($patient->start_date)->format('m-d-Y')}}" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label for="end_date">End Date</label>
                                     <input type="text" class="form-control" id="end_date" name="end_date" value="{{Carbon\Carbon::parse($patient->end_date)->format('m-d-Y')}}" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label for="total_amount">Total Amount</label>
                                     <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{money_format('%.2n', $patient->total_amount) }}" disabled>
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
