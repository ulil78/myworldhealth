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
                        {{-- <div class="portlet-title">
                            <div class="caption"><i class="fa fa-globe"></i>Cities</div>
                            <div class="tools"></div>
                        </div> --}}
                        <div class="portlet-body">

                          <div class="panel">
                             <a href="{{url('admin/cities/create')}}" class="btn btn-success">Add City</a> 
                          </div>
                          <div class="panel-body">
                            <table class="table table-striped table-hover" id="sample_2">
                               <thead>
                                    <tr>
                                      <th>No.</th>
                                      <th>Country</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                      <th>Option </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     {{'', $n=1}}
                                     @foreach ($cities as $item)
                                     <tr>
                                        <td>{{$n++}}</td>
                                        <td>
                                          @php
                                            $country = \App\Country::where('id', $item->country_id)->value('name');
                                          @endphp
                                          {{$country}}
                                        </td>
                                        <td>{{$item->name}}</td>

                                        <td>
                                        @if($item->status == 'true')
                                            <label class="label label-success">True</label>
                                        @else
                                            <label class="label label-danger">False</label>
                                        @endif
                                        </td>

                                        <td>
                                            <!-- Action button -->
                                            <div class="btn-group">
                                              <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu">
                                                <li>
                                                  <a href="{{ url('/admin/cities/'.$item->id.'/edit') }}">Edit</a>
                                                </li>
                                                <form id="delete-form-{{$item->id}}" 
                                                    method="post" 
                                                    action="{{url('admin/cities/'.$item->id) }}"
                                                    style="display: none;">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                </form>
                                                <li>
                                                  <a class="dropdown-item" href="" onclick="
                                                    if(confirm('Are You Sure?')) {
                                                      event.preventDefault();
                                                      document.getElementById('delete-form-{{$item->id}}').submit();
                                                    } else {
                                                      event.preventDefault();
                                                    }
                                                  ">
                                                  Delete</a>
                                                </li>
                                              </ul>
                                            </div>
                                        </td>

                                      </tr>
                                      @endforeach
                                </tbody>
                          </table>
                          </div>
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
