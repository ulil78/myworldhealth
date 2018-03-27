@extends('backend/layouts/master')
@section('main-content')
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
                            <div class="caption"><i class="fa fa-globe"></i>Edit Discount</div>
                            <div class="tools"></div>
                        </div>
                        <div class="portlet-body">
                            @if (count($errors) > 0)
                               <div class="alert alert-danger">
                                   <ul>
                                   @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                   @endforeach
                                   </ul>
                               </div>
                            @endif

                            <form action="{{ url('/admin/discounts/'.$discount->id) }}" class="row" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$discount->name}}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="discount">Discount (%)</label>
                                    <input type="number" class="form-control" id="discount" name="discount" step="any" value="{{$discount->discount}}" >
                                </div>
                                @php
                                    $start_date = date('m/d/Y', strtotime($discount->start_date));
                                @endphp
                                <div class="form-group col-md-6">
                                    <label for="start_date">Start Date</label>
                                    <input type="text" class="form-control input-medium date-picker" id="start_date" name="start_date" value="{{$start_date}}">
                                </div>
                                @php
                                    $end_date = date('m/d/Y', strtotime($discount->end_date));
                                @endphp
                                <div class="form-group col-md-6">
                                    <label for="end_date">End Date</label>
                                    <input type="text" class="form-control input-medium date-picker" id="end_date" name="end_date" value="{{$end_date}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control">{!! $discount->description !!}</textarea>
                                </div>

                                 <div class="form-group col-md-12">
                                     <label for="status">Status</label>
                                     <select class="form-control" name="status" id="status">
                                          <option value="{{$discount->status}}">{{$discount->status}}</option>
                                          <option value="true">True</option>
                                          <option value="false">False</option>
                                     </select>
                                 </div>

                                 <br />
                                 <a href="{{url('admin/add-program/' .$discount->id)}}" class="btn btn-success" data-toggle="modal" data-target="#myModal"> <i class="icon-plus"></i> Add Program</a>
                                 <br /><br />

                                 <table class="table table-stiped">

                                   <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Hospital Program</th>
                                        <th>Action</th>
                                      </tr>
                                   </thead>
                                   @php
                                      $program_discounts = \DB::table('hospital_programs')
                                                                ->join('discount_programs', 'discount_programs.hospital_program_id', '=', 'hospital_programs.id')
                                                                ->select('discount_programs.discount_id as discount_id', 'hospital_programs.name as program_name', 'discount_programs.id as discount_program_id')
                                                                ->orderBy('discount_programs.discount_id', 'desc')
                                                                ->where('discount_programs.discount_id', $discount->id)
                                                                ->get();
                                   @endphp
                                   <tbody>
                                     {{'', $n=1}}
                                     @foreach ($program_discounts as $item)
                                        <tr>
                                            <td>{{$n++}}</td>
                                            <td>{{$item->program_name}}</td>
                                            <td>
                                              <a href="{{url('admin/remove-program/' .$item->discount_program_id. '/' .$discount->id)}}" class="btn btn-danger">
                                                delete
                                              </a>
                                            </td>
                                        </tr>

                                     @endforeach
                                   </tbody>
                                 </table>

                                 <div class="form-group col-md-12">
                                   <button type="submit" class="btn btn-primary">Update</button>
                                   <a href="{{ url('/admin/discounts') }}" class="btn btn-warning">Cancel</a>
                                 </div>
                            </form>

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

 <!-- Modal -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">Add Program</h4>
       </div>
       @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
              </ul>
          </div>
       @endif
       <form method="post" action="{{url('admin/add-program')}}" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}" />
           <div class="modal-body">

             <input type="hidden" name="discount_id" value="{{$discount->id}}">

             <div class="form-group">
                 <label for="hospital_program_id">Hospital Program</label>
                 <select name="hospital_program_id" class="form-control">
                    <option> --- Select Hospital Program --- </option>
                    @php
                      $programs = \App\HospitalProgram::orderBy('name')->get();
                    @endphp
                        @foreach ($programs as $program)
                            <option value="{{$program->id}}">{{$program->name}}</option>
                        @endforeach

                 </select>
             </div>

           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <input type="submit" class="btn btn-primary" value="Add">

           </div>
       </form>
     </div>
   </div>
 </div>
 @endsection
