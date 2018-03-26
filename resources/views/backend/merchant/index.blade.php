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
                            <div class="caption"><i class="fa fa-globe"></i>Hospital Program</div>
                            <div class="tools"></div>
                        </div> --}}
                        <div class="portlet-body">

                          <div class="panel">
                            <div class="caption"><b>Merchant</b></div>
                            <div class="tools"></div>
                          </div>
                          <div class="panel-body">
                            <div class="panel">
                                <a href="{{url('admin/merchants/create')}}" class="btn btn-success">Add Merchant</a> 
                            </div>

                           <table class="table table-striped table-hover" id="sample_2">
                                 <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Notices</th>
                                        <th>Status</th>
                                        <th>Option</th>
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
                                            <!-- Action button -->
                                            <div class="btn-group">
                                              <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu">
                                                <li>
                                                  <a href="{{ url('/admin/merchants/'.$item->id.'/edit') }}">Edit</a>
                                                </li>
                                                <form id="delete-form-{{$item->id}}" 
                                                    method="post" 
                                                    action="{{url('admin/merchants/'.$item->id) }}"
                                                    style="display: none;">
                                                    {{csrf_field()}}
                                                    {{-- <input type="hidden" name="_token" value="{{csrf_token()}}" /> --}}
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
                                              {{-- <a href="{{ url('/admin/merchants/'.$item->id.'/edit') }}" class="btn btn-warning">EDIT</a>
                                              <form action="{{ url('admin/merchants/'.$item->id) }}" method="POST">
                                                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                  <input type="hidden" name="_method" value="DELETE" />
                                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">DELETE</button>
                                              </form> --}}
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
