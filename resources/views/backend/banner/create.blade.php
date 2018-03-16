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
                            <div class="caption"><i class="fa fa-globe"></i>Add Banner</div>
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

                            <form action="{{ url('/admin/banners/') }}" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                 <div class="form-group">
                                     <label for="name">Name</label>
                                     <input type="text" class="form-control" id="name" name="name">
                                 </div>
                                 <div class="form-group">
                                     <label for="url">Url</label>
                                     <input type="text" class="form-control" id="url" name="url">
                                 </div>
                                 <div class="form-group">
                                     <label for="position">Position</label>
                                     <input type="position" class="form-control" id="position" name="position">
                                 </div>
                                 <div class="form-group">
                                     <label for="picture">Picture</label>
                                     <input type="file" class="form-control" name="picture">
                                 </div>

                                 <button type="submit" class="btn btn-primary">Save</button>
                                 <a href="{{ url('/admin/banners') }}" class="btn btn-warning">Cancel</a>
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
