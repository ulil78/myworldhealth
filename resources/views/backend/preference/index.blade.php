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
                            <div class="caption"><i class="fa fa-globe"></i>Prefernce</div>
                            <div class="tools"></div>
                        </div>
                        <div class="portlet-body">
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
                        									  <a href="{{ url('/admin/preferences/'.$item->id.'/edit') }}" class="btn btn-warning">EDIT</a>
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
