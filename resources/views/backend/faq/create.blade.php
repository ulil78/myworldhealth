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
                            <div class="caption"><i class="fa fa-globe"></i>Add FAQ</div>
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

                            <form action="{{ url('/admin/faqs/') }}" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                 <div class="form-group">
                                     <label for="question">Question</label>
                                     <textarea class="form-control" name="question" id="question"></textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="answer">Answer</label>
                                     <textarea class="form-control" name="answer" id="answer"></textarea>
                                 </div>

                                 <button type="submit" class="btn btn-primary">Save</button>
                                 <a href="{{ url('/admin/faqs') }}" class="btn btn-warning">Cancel</a>
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
