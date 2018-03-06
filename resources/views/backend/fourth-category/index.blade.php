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
                            <div class="caption"><i class="fa fa-globe"></i>Fourth Categories</div>
                            <div class="tools"></div>
                        </div>
                        <div class="portlet-body">
            						 <table class="table table-striped table-bordered table-hover" id="sample_2">
            						       <thead>
            							          <tr>
                                      <th>No.</th>
                                      <th>First Category</th>
                                      <th>Second Category</th>
                                      <th>Thrid Category</th>
                      								<th>Name</th>
                                      <th>Status</th>
                                      <th> <a href="{{url('admin/fourth-categories/create')}}" class="btn btn-primary">Add Category</a> </th>
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
                                          {{$first->first_category_name}}
                                        </td>
                                        <td>
                                          @php
                                            $second = \DB::table('second_categories')
                                                          ->join('thrid_categories', 'thrid_categories.second_category_id', '=', 'second_categories.id')
                                                          ->select('thrid_categories.id as second_category_id', 'second_categories.name as second_category_name')
                                                          ->where('thrid_categories.id', $item->thrid_category_id)
                                                          ->first();
                                          @endphp
                                          {{$second->second_category_name}}
                                        </td>
                                        <td>
                                          @php
                                            $thrid = \App\ThridCategory::where('id', $item->thrid_category_id)->value('name');
                                          @endphp
                                          {{$thrid}}
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
                        									  <a href="{{ url('/admin/fourth-categories/'.$item->id.'/edit') }}" class="btn btn-warning">EDIT</a>
                                            <form action="{{ url('admin/fourth-categories/'.$item->id) }}" method="POST">
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
