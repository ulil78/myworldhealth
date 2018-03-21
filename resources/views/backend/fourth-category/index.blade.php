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
                       {{--  <div class="portlet-title">
                            <div class="caption"><i class="fa fa-globe"></i>Fourth Categories</div>
                            <div class="tools"></div>
                        </div> --}}
                        <div class="portlet-body">
                          
                          <div class="panel-body">
                						 <table class="table table-hover" id="sample_2">
                						       <thead>
                							          <tr>
                                          <th>No.</th>
                                          <th>Category</th>
                          								<th>Name</th>
                                          <th>Commission Fee</th>
                                          <th>Status</th>
                                          <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         {{'', $n=1}}
                        							   @foreach ($categories as $item)
                        							   <tr>
                                            <td>{{$n++}}</td>
                                            <td>
                                              @php
                                                $first = \DB::table('first_categories')
                                                              ->join('second_categories', 'second_categories.first_category_id', '=', 'first_categories.id')
                                                              ->join('thrid_categories', 'thrid_categories.second_category_id', '=', 'second_categories.id')
                                                              ->select('second_categories.id as second_category_id', 'first_categories.name as first_category_name')
                                                              ->where('thrid_categories.id', $item->thrid_category_id)
                                                              ->first();
                                              @endphp
                                              @php
                                                $second = \DB::table('second_categories')
                                                              ->join('thrid_categories', 'thrid_categories.second_category_id', '=', 'second_categories.id')
                                                              ->select('thrid_categories.id as second_category_id', 'second_categories.name as second_category_name')
                                                              ->where('thrid_categories.id', $item->thrid_category_id)
                                                              ->first();
                                              @endphp
                                              @php
                                                $thrid = \App\ThridCategory::where('id', $item->thrid_category_id)->value('name');
                                              @endphp
                                              <b><small>First</small></b> - {{$first->first_category_name}} <br>
                                              <b><small>Second</small></b> - {{$second->second_category_name}} <br>
                                              <b><small>Thrid</small></b> - {{$thrid}}
                                            </td>
                            								<td>{{$item->name}}</td>
                                            <td>{{money_format('%.2n', $item->commission_fee) }}</td>
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
                                                  <a href="{{ url('/admin/fourth-categories/'.$item->id.'/edit') }}">Edit</a>
                                                </li>
                                                <form id="delete-form-{{$item->id}}"
                                                    method="post"
                                                    action="{{url('admin/fourth-categories/'.$item->id) }}"
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
