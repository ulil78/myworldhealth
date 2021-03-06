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
                            <div class="caption"><i class="fa fa-globe"></i>Prefernce</div>
                            <div class="tools"></div>
                        </div> --}}
                        <div class="portlet-body">

                          <div class="panel">
                            <div class="caption"><b>Preferences</b></div>
                            <div class="tools"></div>
                          </div>
                          <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                               <thead>
                                    <tr>
                                      <th>Company Name</th>
                                      <th>Address</th>
                                      <th>Phone</th>
                                      <th>Logo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($preferences as $item)
                                     <tr>
                                        <td>{{$item->company_name}}</td>
                                        <td>{!! $item->address !!}</td>
                                        <td>{{$item->phone}}</td>
                                        <td><img height="75" src="{{asset($item->path.$item->filename)}}"></td>
                                        <td>
                                            <!-- Action button -->
                                            <div class="btn-group">
                                              <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu">
                                                <li>
                                                  <a href="{{ url('/admin/preferences/'.$item->id.'/edit') }}">Edit</a>
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
