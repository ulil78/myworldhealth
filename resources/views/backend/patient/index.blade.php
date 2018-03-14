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
                            <div class="caption"><i class="fa fa-globe"></i>Patient</div>
                            <div class="tools"></div>
                        </div>
                        <div class="portlet-body">
            						 <table class="table table-striped table-bordered table-hover" id="sample_2">
            						       <thead>
            							          <tr>
                                      <th>No.</th>
                      								<th>Name</th>
                                      <th>Age</th>
                                      <th>Gender</th>
                                      <th>Diagnosis</th>
                                      <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     {{'', $n=1}}
                    							   @foreach ($patients as $item)
                    							   <tr>
                                        <td>{{$n++}}</td>
                        								<td>{{$item->name}}</td>
                                        <td>{{$item->age}}</td>
                                        <td>{{$item->gender}}</td>
                                        <td>{{$item->diagnosis}}</td>
                                        <td>
                        									  <a href="{{ route('patients.show',$item->id) }}" class="btn btn-warning">Show</a>

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
