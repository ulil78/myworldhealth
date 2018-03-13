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
                            <div class="caption"><i class="fa fa-globe"></i>Admin</div>
                            <div class="tools"></div>
                        </div>
                        <div class="portlet-body">
            						 <table class="table table-striped table-bordered table-hover" id="sample_2">
            						       <thead>
            							          <tr>
                                      <th>No.</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Notices</th>
                                      <th>Status</th>
                                      <th> <a href="{{url('admin/merchants/create')}}" class="btn btn-primary">Add Merchant</a> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     {{'', $n=1}}
                    							   @foreach ($merchants as $item)
                    							   <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{!! $item->notices !!}</td>
                                        <td>
                                        @if($item->status == 'true')
                                            <label class="label label-success">True</label>
                                        @elseif($item->status == 'false')
                                            <label class="label label-primary">False</label>
                                        @else
                                            <label class="label label-danger">Banned</label>
                                        @endif
                                        </td>

                                        <td>
                        									  <a href="{{ url('/admin/merchants/'.$item->id.'/edit') }}" class="btn btn-warning">EDIT</a>
                                            <form action="{{ url('admin/merchants/'.$item->id) }}" method="POST">
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
