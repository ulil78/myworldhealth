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
                            <div class="caption"><i class="fa fa-globe"></i>Edit City</div>
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

                            <form action="{{ url('/admin/cities/'.$city->id) }}" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="country_id">First Category</label>
                                    <select name="country_id" class="form-control">
                                        <option value="{{$city->country_id}}">
                                          @php
                                            $country = \App\Country::where('id', $city->country_id)->value('name');
                                          @endphp
                                          {{$country}}
                                        </option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                     <label for="name">Name</label>
                                     <input type="text" class="form-control" id="name" name="name" value="{{$city->name}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="description">Description</label>
                                     <textarea class="form-control" name="description" id="description">{!! $city->description !!}</textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="latitude">Latitude</label>
                                     <input type="text" class="form-control" id="latitude" name="latitude" value="{{$city->latitude}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="longitude">Longitude</label>
                                     <input type="text" class="form-control" id="longitude" name="longitude" value="{{$city->longitude}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <select class="form-control" name="status" id="status">
                                          <option value="{{$city->status}}">{{$city->status}}</option>
                                          <option value="true">True</option>
                                          <option value="false">False</option>
                                     </select>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('/admin/cities') }}" class="btn btn-warning">Cancel</a>
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
