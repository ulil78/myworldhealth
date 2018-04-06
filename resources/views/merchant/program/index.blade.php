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
                            <div class="caption"><i class="fa fa-globe"></i>Hospital Program</div>
                            <div class="tools"></div>
                        </div> --}}
                        <div class="portlet-body">

                          <div class="panel">
                             <a href="{{url('merchant/hospital-programs/create')}}" class="btn btn-default">Add Hospital Program</a>
                          </div>
                          <div class="panel-body">

                           <table class="table table-hover" id="sample_2">
                                 <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th>Hospital</th>
                                        <th>Department</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Price ($)</th>
                                        <th>Discount (%)</th>
                                        <th>Notices</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                       {{'', $n=1}}
                                       @foreach ($programs as $item)
                                       <tr>
                                          <td>{{$n++}}</td>
                                          <td>{{$hospital->name}}</td>
                                          <td>
                                            @php
                                                $department = \App\HospitalDepartment::where('id', $item->hospital_department_id)->value('name');
                                            @endphp
                                              {{$department}}
                                          </td>
                                          <td>
                                              @php
                                                $category = \App\ThridCategory::where('id', $item->thrid_category_id)->value('name');
                                              @endphp
                                              {{$category}}
                                          </td>
                                          <td>{{$item->name}}</td>
                                          <td>{{$item->price}}</td>
                                          <td>{{$item->discount}}</td>
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
                                                @if($item->status <> 'banned')
                                                  <li>
                                                    <a href="{{ url('/merchant/hospital-programs/'.$item->id.'/edit') }}">Edit</a>
                                                  </li>
                                                @endif
                                                <form id="delete-form-{{$item->id}}"
                                                    method="post"
                                                    action="{{url('merchant/hospital-programs/'.$item->id) }}"
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
