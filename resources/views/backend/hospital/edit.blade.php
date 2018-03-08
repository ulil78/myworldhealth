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
                            <div class="caption"><i class="fa fa-globe"></i>Edit Hospital</div>
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

                            <form action="{{ url('/admin/hospitals/'.$hospital->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$hospital->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="merchant_id">Merchant</label>
                                    <select name="merchant_id" class="form-control">
                                        @php
                                          $merchant = \App\Merchant::where('id', $hospital->merchant_id)->value('name');
                                        @endphp
                                        <option value="{{$hospital->merchant_id}}">{{$merchant}}</option>
                                        @foreach($merchants as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pic">PIC</label>
                                    <input type="text" class="form-control" id="pic" name="pic" value="{{$hospital->pic}}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="address">{!! $hospital->address !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{$hospital->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" class="form-control" id="fax" name="fax" value="{{$hospital->fax}}">
                                </div>
                                <div class="form-group">
                                    <label for="country_id">Country</label>
                                    <select name="country_id" class="form-control">
                                      <option value="{{$hospital->country_id}}">
                                        @php
                                          $country = \DB::table('countries')
                                                        ->join('cities', 'cities.country_id', '=', 'countries.id')
                                                        ->select('cities.id as city_id', 'countries.name as country_name')
                                                        ->where('cities.id', $hospital->city_id)
                                                        ->first();
                                        @endphp
                                          {{$country->country_name}}
                                      </option>
                                       @foreach ($countries as $country)
                                           <option value="{{$country->id}}">{{$country->name}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="city_id">City</label>
                                     <select name="city_id" class="form-control">
                                        <option value="{{$hospital->city_id}}">
                                          @php
                                            $city = \App\City::where('id', $hospital->city_id)->value('name');
                                          @endphp
                                          {{$city}}
                                        </option>
                                     </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="map">Map</label>
                                      <input type="text" class="form-control" id="map" name="map" value="{{$hospital->map}}">
                                  </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description">{!! $hospital->description !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="accommodation">Accommodation</label>
                                    <textarea class="form-control" name="accommodation" id="accommodation">{!! $hospital->accommodation !!}</textarea>
                                </div>

                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <select class="form-control" name="status" id="status">
                                          <option value="{{$hospital->status}}">{{$hospital->status}}</option>
                                          <option value="true">True</option>
                                          <option value="false">False</option>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="notes">Notes</label>
                                     <textarea class="form-control" name="notes" id="notes">{!! $hospital->notes !!}</textarea>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Update</button>
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
