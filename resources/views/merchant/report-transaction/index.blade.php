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
                    <div class="portlet box green">
                        {{-- <div class="portlet-title">
                            <div class="caption"><i class="fa fa-globe"></i>Invoice</div>
                            <div class="tools"></div>
                        </div> --}}
                        <div class="portlet-body">
                          <div class="panel">
                            <div class="caption"><b>Report Transaction</b></div>
                          </div>
                          <form method="post" action="{{url('/sales/show')}}">
                              <input type="hidden" name="_token" value="{{csrf_token()}}" />

                              <div class="form-group">
                                <label for="department">Deapartment</label><br />
                                <select name="department" class="form-control">
                                    <option> --- Select Deaprtment --- </option>
                                    @php
                                      $departments = \App\HospitalDepartment::orderBy('name')->get();
                                    @endphp
                                    @foreach ($departments as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                              </div>

                              <div class="form-group">
                                  <label for="start_date">Start Date</label>
                                  <input type="text" class="form-control input-medium date-picker" id="start_date" name="start_date">
                              </div>
                              <div class="form-group">
                                  <label for="end_date">End Date</label>
                                  <input type="text" class="form-control input-medium date-picker" id="end_date" name="end_date">
                              </div>

                              <input type="submit" class="btn btn-success" name="submit" value="Search">
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
@endsection
