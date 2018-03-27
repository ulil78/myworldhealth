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
                            <div class="caption"><i class="fa fa-globe"></i>Add Transfer Return</div>

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

                            <form action="{{ url('/merchant/transfer-return-types/') }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                <div class="form-group">
                                    <label for="hospital">Hospital</label>
                                    <input type="text" class="form-control" id="hospital" name="hospital" value="{{$hospital->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="hospital_department_id">Department</label>
                                    <select name="hospital_department_id_return" class="form-control">
                                        <option> --- Select Departments --- </option>
                                        @foreach($departments as $department)
                                          <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="hospital_program_id_return">Program</label>
                                    <select name="hospital_program_id_return" class="form-control">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="transfer_return_id">Transfer return</label>
                                    <select name="transfer_return_id" class="form-control">

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price ($)</label>
                                    <input type="number" class="form-control" id="price" name="price" step="any">
                                </div>


                                 <button type="submit" class="btn btn-primary">Add</button>
                                 <a href="{{ url('/merchant/transfer-return-types') }}" class="btn btn-warning">Cancel</a>
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
