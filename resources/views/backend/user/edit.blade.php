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
                            <div class="caption"><i class="fa fa-globe"></i>Edit User</div>

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

                            <form action="{{ url('/admin/users/'.$user->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">


                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
                                </div>

                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <select class="form-control" name="status" id="status">
                                          <option value="{{$user->status}}">{{$user->status}}</option>
                                          <option value="true">True</option>
                                          <option value="false">False</option>
                                          <option value="banned">Banned</option>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="notices">Notices</label>
                                     <textarea class="form-control" name="notices" id="notes">{!! $user->notices !!}</textarea>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('/admin/users') }}" class="btn btn-warning">Cancel</a>
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
