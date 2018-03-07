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
                            <div class="caption"><i class="fa fa-globe"></i>Edit Thrid Category</div>
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

                            <form action="{{ url('/admin/thrid-categories/'.$category->id) }}" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="first_category_id">First Category</label>
                                    <select name="first_category_id" class="form-control">
                                      @php
                                         $first = \DB::table('first_categories')
                                                      ->join('second_categories', 'second_categories.first_category_id', '=', 'first_categories.id')
                                                      ->select('second_categories.id as second_category_id', 'first_categories.name as first_category_name')
                                                      ->where('second_categories.id', $category->second_category_id)
                                                      ->first();
                                      @endphp
                                        <option>
                                          {{$first->first_category_name}}
                                        </option>
                                        @foreach ($firsts as $first)
                                            <option value="{{$first->id}}">{{$first->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="second_category_id">Second Category</label>
                                    <select name="second_category_id" class="form-control">
                                        <option value="{{$category->second_category_id}}">
                                            @php
                                              $second = \App\SecondCategory::where('id', $category->second_category_id)->value('name');
                                            @endphp
                                            {{$second}}
                                        </option>
                                    </select>
                                </div>

                                 <div class="form-group">
                                     <label for="name">Name</label>
                                     <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="description">Description</label>
                                     <textarea class="form-control" name="description" id="description">{!! $category->description !!}</textarea>
                                 </div>

                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <select class="form-control" name="status" id="status">
                                          <option value="{{$category->status}}">{{$category->status}}</option>
                                          <option value="true">True</option>
                                          <option value="false">False</option>
                                     </select>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('/admin/thrid-categories') }}" class="btn btn-warning">Cancel</a>
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
