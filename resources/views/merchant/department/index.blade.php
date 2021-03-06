@extends('merchant/layouts/master')

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
                    <div class="portlet box default">
                        {{-- <div class="portlet-title">
                            <div class="caption"><i class="fa fa-globe"></i>Hospital Departments</div>
                            <div class="tools"></div>
                        </div> --}}
                        <div class="portlet-body">

                          <div class="panel">
                             <a href="{{url('merchant/hospital-departments/create')}}" class="btn btn-default">Add Department</a> 
                          </div>
            						 <table class="table table-hover" id="sample_2">
            						       <thead>
            							          <tr>
                                      <th>No.</th>
                                      <th>Hospital</th>
                                      <th>Name</th>
                      								<th>Doctor</th>
                                      <th>Notices</th>
                                      <th>Status</th>
                                      <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     {{'', $n=1}}
                    							   @foreach ($departments as $item)
                    							   <tr>
                                        <td>{{$n++}}</td>
                                        <td>
                                          @php
                                              $hospital = \App\Hospital::where('id', $item->hospital_id)->value('name');
                                          @endphp
                                          {{$hospital}}
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->doctor}}</td>
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
                                            @if($item->status <> 'banned')
                        									       <a href="{{ url('/merchant/hospital-departments/'.$item->id.'/edit') }}" class="btn btn-warning">EDIT</a>
                                            @endif
                                            <form action="{{ url('merchant/hospital-departments/'.$item->id) }}" method="POST">
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
