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
                            <div class="caption"><i class="fa fa-globe"></i>Add Hospital Program</div>

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

                            <form action="{{ url('/merchant/hospital-programs/') }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                <div class="form-group">
                                    <label for="hospital">Hospital</label>
                                    <input type="text" class="form-control" id="hospital" name="hospital" value="{{$hospital->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select name="hospital_department_id" class="form-control">
                                        <option> --- Select Departments --- </option>
                                        @foreach($departments as $department)
                                          <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="fourth_category_id" class="form-control">
                                        <option> --- Select Category --- </option>
                                        @foreach($categories as $category)
                                          <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price ($)</label>
                                    <input type="number" class="form-control" id="price" name="price" step="any" >
                                </div>
                                <div class="form-group">
                                    <label for="discount">Discount (%)</label>
                                    <input type="number" class="form-control" id="discount" name="discount" step="any">
                                </div>
                                <div class="form-group">
                                    <label for="duration">Duration (day)</label>
                                    <input type="number" class="form-control" id="duration" name="duration">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control"></textarea>
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
