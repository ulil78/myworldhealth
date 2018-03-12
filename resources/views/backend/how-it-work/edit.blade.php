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
                            <div class="caption"><i class="fa fa-globe"></i>How it Work</div>
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

                            @if(Session::has('message'))
                      			<div class="alert alert-danger">
                      				{{Session::get('message')}}
                      			</div>
                      			@endif

                            <form action="{{ url('/admin/how-it-works/'.$work->id) }}" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT">

                                 <div class="form-group">
                                     <label for="title">Title</label>
                                     <input type="text" class="form-control" id="title" name="title" value="{{$work->title}}">
                                 </div>
                                 <div class="form-group">
                                     <label for="description">Description</label>
                                     <textarea name="description" id="description" class="form-control">{!! $work->description !!}</textarea
                                 </div>
                                 <div class="form-group">
                                     <label for="picture">Picture</label>
                                     <img height="75" src="{{asset($work->path.$work->filename)}}">
                                     <input type="file" class="form-control" name="picture" value="{{$work->filename}}">
                                 </div>


                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <a href="{{ url('admin') }}" class="btn btn-warning">Close</a>
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
