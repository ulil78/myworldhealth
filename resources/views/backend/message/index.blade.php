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
                            <div class="caption"><i class="fa fa-globe"></i>Message</div>
                            <div class="tools"></div>
                        </div>
                        <div class="portlet-body">
            						 <table class="table table-striped table-bordered table-hover" id="sample_2">
            						       <thead>
            							          <tr>
                                      <th>No.</th>
                                      <th>From</th>
                                      <th>Name</th>
                                      <th>Subject</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     {{'', $n=1}}
                    							   @foreach ($messages as $item)
                    							   <tr>
                                        <td>{{$n++}}</td>
                                        <td><a href="mailto:{{$item->from}}">{{$item->from}}</a></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->subject}}</td>
                                        <td>
                                        @if($item->status == 'unread')
                                            <label class="label label-primary">Unread</label>
                                        @else
                                            <label class="label label-success">Read</label>
                                        @endif
                                        </td>

                                        <td>
                        									  <a href="{{ url('/admin/messages/'.$item->id.'/edit') }}" class="btn btn-warning">Show</a>

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
