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
                            <div class="caption"><i class="fa fa-globe"></i>Edit Voucher</div>
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

                            <form action="{{ url('/admin/vouchers/'.$voucher->id) }}" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$voucher->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="code_voucher">Code Voucher</label>
                                    <input type="text" class="form-control" id="code_voucher" name="code_voucher" value="{{$voucher->code_voucher}}">
                                </div>
                                <div class="form-group">
                                    <label for="minimum_transaction">Minimum Trasaction ($)</label>
                                    <input type="number" class="form-control" id="minimum_transaction" name="minimum_transaction" step="any" value="{{$voucher->minimum_transaction}}" >
                                </div>
                                @php
                                    $start_date = date('m/d/Y', strtotime($voucher->start_date));
                                @endphp
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="text" class="form-control input-medium date-picker" id="start_date" name="start_date" value="{{$start_date}}">
                                </div>
                                @php
                                    $end_date = date('m/d/Y', strtotime($voucher->end_date));
                                @endphp
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="text" class="form-control input-medium date-picker" id="end_date" name="end_date" value="{{$end_date}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control">{!! $voucher->description !!}</textarea>
                                </div>

                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <select class="form-control" name="status" id="status">
                                          <option value="{{$voucher->status}}">{{$voucher->status}}</option>
                                          <option value="true">True</option>
                                          <option value="false">False</option>
                                     </select>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('/admin/vouchers') }}" class="btn btn-warning">Cancel</a>
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
