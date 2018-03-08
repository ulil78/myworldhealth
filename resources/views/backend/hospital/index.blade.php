@extends('backend/layouts/master')

@section('main-content')
<!-- BEGIN CONTENT -->
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
                            <div class="caption"><i class="fa fa-globe"></i>Hospitals</div>
                            <div class="tools"></div>
                        </div>
                        <div class="portlet-body">
            						 <table class="table table-striped table-bordered table-hover" id="sample_2">
            						       <thead>
            							          <tr>
                                      <th>No.</th>
                                      <th>Country</th>
                                      <th>City</th>
                                      <th>Name</th>
                      								<th>PIC</th>
                                      <th>Phone</th>
                                      <th>Status</th>
                                      <th> <a href="{{url('admin/hospitals/create')}}" class="btn btn-primary">Add Hospital</a> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     {{'', $n=1}}
                    							   @foreach ($hospitals as $item)
                    							   <tr>
                                        <td>{{$n++}}</td>
                                        <td>
                                          @php
                                            $country = \DB::table('countries')
                                                          ->join('cities', 'cities.country_id', '=', 'countries.id')
                                                          ->select('cities.id as city_id', 'countries.name as country_name')
                                                          ->where('cities.id', $item->city_id)
                                                          ->first();
                                          @endphp
                                          {{$country->country_name}}
                                        </td>
                                        <td>
                                          @php
                                            $city = \App\City::where('id', $item->city_id)->value('name');
                                          @endphp
                                          {{$city}}
                                        </td>
                        								<td>{{$item->name}}</td>
                                        <td>{{$item->pic}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>
                                        @if($item->status == 'true')
                                            <label class="label label-success">True</label>
                                        @else
                                            <label class="label label-danger">False</label>
                                        @endif
                                        </td>

                                        <td>
                        									  <a href="{{ url('/admin/hospitals/'.$item->id.'/edit') }}" class="btn btn-warning">EDIT</a>
                                            <form action="{{ url('admin/hospitals/'.$item->id) }}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">DELETE</button>
                                            </form>
                                        </td>

                                      </tr>
                                      @endforeach
                                </tbody>
                          </table>
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
