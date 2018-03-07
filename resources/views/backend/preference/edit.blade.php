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
                            <div class="caption"><i class="fa fa-globe"></i>Edit Prefernce</div>
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

                            <form action="{{ url('/admin/preferences/'.$preference->id) }}" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">

                                 <div class="form-group">
                                     <label for="company_name">Company Name</label>
                                     <input type="text" class="form-control" id="company_name" name="company_name" value="{{$preference->company_name}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="address">Address</label>
                                     <textarea name="address" id="address" class="form-control">{!! $preference->address !!}</textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="phone">Phone</label>
                                     <input type="text" class="form-control" id="phone" name="phone" value="{{$preference->phone}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="postcode">Phone</label>
                                     <input type="text" class="form-control" id="postcode" name="postcode" value="{{$preference->postcode}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="country_id">Country</label>
                                     <select name="country_id" class="form-control">
                                        <option value="{{$preference->country_id}}">
                                            @php
                                              $country = \App\Country::where('id', $preference->country_id)->value('name');
                                            @endphp
                                            {{$country}}
                                        </option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                     </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="city_id">City</label>
                                      <select name="city_id" class="form-control">
                                         <option value="{{$preference->city_id}}">
                                             @php
                                               $city = \App\City::where('id', $preference->city_id)->value('name');
                                             @endphp
                                             {{$city}}
                                         </option>

                                      </select>
                                   </div>
                                   <div class="form-group">
                                       <label for="state">State</label>
                                       <input type="text" class="form-control" id="state" name="state" value="{{$preference->state}}">
                                   </div>
                                 <div class="form-group">
                                     <label for="fax">Fax</label>
                                     <input type="text" class="form-control" id="fax" name="fax" value="{{$preference->fax}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="email">Email</label>
                                     <input type="text" class="form-control" id="email" name="email" value="{{$preference->email}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="map">Map</label>
                                     <input type="text" class="form-control" id="map" name="map" value="{{$preference->map}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="facebook">Facebook</label>
                                     <input type="text" class="form-control" id="facebook" name="facebook" value="{{$preference->facebook}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="twitter">Twitter</label>
                                     <input type="text" class="form-control" id="twitter" name="twitter" value="{{$preference->twitter}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="youtube">Youtube</label>
                                     <input type="text" class="form-control" id="youtube" name="youtube" value="{{$preference->youtube}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="picture">Logo</label>
                                     <img height="75" src="{{asset($preference->path.$preference->filename)}}">
                                     <input type="file" class="form-control" name="picture" value="{{$preference->filename}}">
                                 </div>


                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('/admin/preferences') }}" class="btn btn-warning">Cancel</a>
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
