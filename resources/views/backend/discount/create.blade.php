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
                            <div class="caption"><i class="fa fa-globe"></i>Add Discount</div>
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

                            <form action="{{ url('/admin/discounts/') }}" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                 <div class="form-group">
                                     <label for="name">Name</label>
                                     <input type="text" class="form-control" id="name" name="name">
                                 </div>
                                 <div class="form-group">
                                     <label for="discount">Discount (%)</label>
                                     <input type="number" class="form-control" id="discount" name="discount" step="any">
                                 </div>
                                 
                                 <div class="form-group">
                                     <label for="start_date">Start Date</label>
                                     <input type="text" class="form-control input-medium date-picker" id="start_date" name="start_date">
                                 </div>
                                 <div class="form-group">
                                     <label for="end_date">End Date</label>
                                     <input type="text" class="form-control input-medium date-picker" id="end_date" name="end_date">
                                 </div>
                                 <div class="form-group">
                                     <label for="description">Description</label>
                                     <textarea name="description" class="form-control"></textarea>
                                 </div>

                                 <button type="submit" class="btn btn-primary">Save</button>
                                 <a href="{{ url('/admin/discounts') }}" class="btn btn-warning">Cancel</a>
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
