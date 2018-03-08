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
                            <div class="caption"><i class="fa fa-globe"></i>Add Hospital</div>
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

                            <form action="{{ url('/admin/hospitals/') }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                 <div class="form-group">
                                     <label for="name">Name</label>
                                     <input type="text" class="form-control" id="name" name="name">
                                 </div>
                                 <div class="form-group">
                                     <label for="merchant_id">Merchant</label>
                                     <select name="merchant_id" class="form-control">
                                         <option> --- Select Merchant --- </option>
                                         @foreach($merchants as $item)
                                             <option value="{{$item->id}}">{{$item->name}}</option>
                                         @endforeach
                                     </select>
                                </div>
                                 <div class="form-group">
                                     <label for="pic">PIC</label>
                                     <input type="text" class="form-control" id="pic" name="pic">
                                 </div>
                                 <div class="form-group">
                                     <label for="address">Address</label>
                                     <textarea class="form-control" name="address" id="address"></textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="phone">Phone</label>
                                     <input type="text" class="form-control" id="phone" name="phone">
                                 </div>
                                 <div class="form-group">
                                     <label for="fax">Fax</label>
                                     <input type="text" class="form-control" id="fax" name="fax">
                                 </div>
                                 <div class="form-group">
                                     <label for="country_id">Country</label>
                                     <select name="country_id" class="form-control">
                                       <option> --- Select Country --- </option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                     </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="city_id">City</label>
                                      <select name="city_id" class="form-control">

                                      </select>
                                   </div>
                                   <div class="form-group">
                                       <label for="map">Map</label>
                                       <input type="text" class="form-control" id="map" name="map">
                                   </div>

                                 <div class="form-group">
                                     <label for="description">Description</label>
                                     <textarea class="form-control" name="description" id="description"></textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="accommodation">Accommodation</label>
                                     <textarea class="form-control" name="accommodation" id="accommodation"></textarea>
                                 </div>

                                 <button type="submit" class="btn btn-primary">Save</button>
                                 <a href="{{ url('/admin/hospitals') }}" class="btn btn-warning">Cancel</a>
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
