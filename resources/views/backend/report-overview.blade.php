<!-- row 2 -->


  <div class="col-md-6">
      <!-- Begin: life time stats -->
      <div class="portlet light bordered">
          <div class="portlet-title">
              <div class="caption">
                  <i class="icon-share font-blue"></i>
                  <span class="caption-subject font-blue bold uppercase">Overview</span>
                  <span class="caption-helper">report overview...</span>
              </div>

          </div>
          <div class="portlet-body">
              <div class="tabbable-line">
                  <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#overview_1" data-toggle="tab"> New Orders</a>
                    </li>

                      <li>
                          <a href="#overview_2" data-toggle="tab"> Top Program</a>
                      </li>
                      <li>
                          <a href="#overview_3" data-toggle="tab"> Top Program byAmount</a>
                      </li>

                  </ul>
                  <div class="tab-content">

                    <div class="tab-pane active" id="overview_1">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th> Customer Name </th>
                                        <th> Program </th>
                                        <th> Total Amount </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($new_orders as $item)
                                    <tr>
                                        <td>
                                            @php
                                              $fullname = \DB::table('users')->where('id', $item->users_id)->value('fullname');
                                            @endphp
                                            {{$fullname}}
                                        </td>
                                        @php
                                          $program = \App\HospitalProgram::where('id', $item->hospital_program_id)->value('name');
                                        @endphp
                                        <td> {{$program}} </td>
                                        <td> {{$item->total_amount}}</td>
                                        <td>
                                            <a href="{{url('admin/invoice/' .$item->id. '/edit')}}" class="btn btn-sm btn-default">
                                                <i class="fa fa-search"></i> View </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>



                      <div class="tab-pane" id="overview_2">
                          <div class="table-responsive">
                              <table class="table table-striped table-hover table-bordered">
                                  <thead>

                                      <tr>
                                          <th> Program Name </th>
                                          <th> Total Amount </th>
                                          <th> Transaction </th>
                                          <th> </th>
                                      </tr>

                                  </thead>
                                  <tbody>
                                       @foreach ($top_programs as $top_program)
                                      <tr>
                                          <td>
                                            {{$top_program->program_name}}
                                          </td>
                                          <td> {{$top_program->stotal_amount}}</td>
                                          <td> {{$top_program->count_invoice}} </td>
                                          <td>
                                              <a href="{{url('admin/hospital-programs/' .$top_program->program_id. '/edit' )}}" class="btn btn-sm btn-default">
                                                  <i class="fa fa-search"></i> View </a>
                                          </td>
                                      </tr>
                                      @endforeach

                                  </tbody>
                              </table>
                          </div>
                      </div>



                      <div class="tab-pane" id="overview_4">
                          <div class="table-responsive">
                              <table class="table table-striped table-hover table-bordered">
                                <thead>

                                    <tr>
                                        <th> Program Name </th>
                                        <th> Total Amount </th>
                                        <th> Transaction </th>
                                        <th> </th>
                                    </tr>

                                </thead>
                                <tbody>
                                     @foreach ($top_program_amounts as $top_program_amount)
                                    <tr>
                                        <td>
                                          {{$top_program_amount->program_name}}
                                        </td>
                                        <td> {{$top_program_amount->stotal_amount}}</td>
                                        <td> {{$top_program_amount->count_invoice}} </td>
                                        <td>
                                            <a href="{{url('admin/hospital-program/' .$top_program_amount->program_id. '/edit')}}" class="btn btn-sm btn-default">
                                                <i class="fa fa-search"></i> View </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                              </table>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>
      <!-- End: life time stats -->
  </div>
