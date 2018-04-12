@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.jumbotron')
@endsection

@section('content')
<section>
    <div class="row">
      <div class="p-2">
        {{-- Breadcrumb Components Pages --}}
        @include('front.pages.beranda.components.breadcrumb-show_detail_category')
        {{-- End Breadcrumb Components Pages --}}
        <div class="d-flex justify-content-center">
          <div class="row">
            <div class="col-md-12 col-12">
                <div class="row p-4">
                    <div class="col-md-12 col-12">
                        <div class="clearfix">
                          <div class="float-left">
                            <h3 class="float-left">{{$hospital_detail->name}}</h3><br>
                            <h6 class="float-left">{!!$hospital_detail->address!!}</h6>
                          </div>
                          <div class="float-right">
                            <small class="font-weight-bold text-primary">Book Treatment Details</small>
                          </div>
                        </div>
                        <hr class="my-hr">
                    </div>
                    <div class="col-md-3 col-12">
                        <legend>{{$hospital_detail->thrid_categories_name}}</legend>
                        <p>
                            Type of program : <b>{{$hospital_detail->hospital_programs_name}}</b> <br>
                            Expected Duration : <b>{{$hospital_detail->hospital_programs_duration}} Days</b> <br>
                            Service Fees : <b>${{number_format($hospital_detail->hospital_programs_price,2,",",".")}}</b>
                        </p>
                        <legend>Program Include :</legend>
                        <p>
                          {!!$hospital_detail->hospital_programs_description!!}
                        </p>
                    </div>
                    <div class="col-md-5 col-12">
                        <form action="{{route('process-booked')}}" method="POST">
                          {{ csrf_field() }}
                          <div class="form-group">
                              <div class="row">
                                <div class="col">
                                  <small for="exampleFormControlSelect1">Date :</small>
                                  <input type="hidden" name="hospital_program_id" id="hospital_program_id" value="{{$hospital_detail->hospital_programs_id}}">
                                  <input type="date" class="form-control" placeholder="Date Start" name="start_date" id="start_date">
                                  <i class="ion-ios-information-outline"></i> <small>Default counted {{$hospital_detail->hospital_programs_duration}} days</small>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">You may also book :</label><hr>
                              <div class="row">
                                <div class="col-12">
                                <small>Additional services :</small>
                                  <div class="row mt-2">
                                    <div class="col-md-6">
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                             onchange="document.getElementById('interpreter_qty').disabled = !this.checked;"  id="check_in" value="1">
                                        <label class="custom-control-label" for="check_in">Interpreter / hour $10</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <input type="number" class="form-control" min="0" name="interpreter_qty" id="interpreter_qty" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="row mt-2">
                                    <div class="col-md-6">
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                             onchange="document.getElementById('translation_med_document_qty').disabled = !this.checked;"  id="check_doc" value="1">
                                        <label class="custom-control-label" for="check_doc">
                                          Translations of Medical Document / page $ 2
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <input type="number" class="form-control" min="0" name="translation_med_document_qty" id="translation_med_document_qty" disabled>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Transfer :</label><hr>
                              <div class="row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input"
                                             onchange="document.getElementById('transfer_arrival_id').disabled = !this.checked;" 
                                             id="air_hos" value="1">
                                      <label class="custom-control-label" for="air_hos">
                                        Airport to Hospital
                                      </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row mt-2">
                                        <div class="col">
                                          @php
                                              $transfer_arrivals = \DB::table('hospital_programs')
                                              ->join('transfer_arrivals', 'transfer_arrivals.hospital_program_id', '=', 'hospital_programs.id')
                                              ->join('transfer_arrival_types', 'transfer_arrival_types.transfer_arrival_id', '=', 'transfer_arrivals.id')
                                              ->select('hospital_programs.name as program_name', 
                                                        'transfer_arrivals.id as transfer_arrival_id',
                                                        'transfer_arrivals.name as transfer_arrival_name')
                                              ->where('hospital_programs.id', $hospital_detail->hospital_programs_id)
                                              ->get();
                                          @endphp
                                          <select class="custom-select mr-sm-2" name="transfer_arrival_id" id="transfer_arrival_id" disabled>
                                            <option selected disabled>Choose...</option>
                                            @foreach($transfer_arrivals as $value)
                                              <option value="{{$value->transfer_arrival_id}}">{{$value->transfer_arrival_name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <div class="col">
                                          @php
                                              $transfer_arrival_types = \DB::table('hospital_programs')
                                              ->join('transfer_arrivals', 'transfer_arrivals.hospital_program_id', '=', 'hospital_programs.id')
                                              ->join('transfer_arrival_types', 'transfer_arrival_types.transfer_arrival_id', '=', 'transfer_arrivals.id')
                                              ->select('hospital_programs.name as program_name', 
                                                        'transfer_arrival_types.id as transfer_arrival_types_id',
                                                        'transfer_arrival_types.name as transfer_arrival_types_name')
                                              ->where('hospital_programs.id', $hospital_detail->hospital_programs_id)
                                              ->get();
                                          @endphp
                                          <select class="custom-select mr-sm-2" name="transfer_arrival_type_id" 
                                                  id="transfer_arrival_type_id">
                                            <option selected disabled>Choose...</option>
                                            @foreach($transfer_arrival_types as $value)
                                              <option value="{{$value->transfer_arrival_types_id}}">{{$value->transfer_arrival_types_name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="hos_air" value="1">
                                      <label class="custom-control-label" for="hos_air">Hospital to Airport</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row mt-2">
                                        <div class="col">
                                          @php
                                              $transfer_returns = \DB::table('hospital_programs')
                                              ->join('transfer_returns', 'transfer_returns.hospital_program_id', '=', 'hospital_programs.id')
                                              ->join('transfer_return_types', 'transfer_return_types.transfer_return_id', '=', 'transfer_returns.id')
                                              ->select('hospital_programs.name as program_name', 
                                                        'transfer_returns.id as transfer_returns_id',
                                                        'transfer_returns.name as transfer_returns_name')
                                              ->where('hospital_programs.id', $hospital_detail->hospital_programs_id)
                                              ->get();
                                          @endphp
                                          <select class="custom-select mr-sm-2" name="transfer_return_id" id="transfer_return_id" id="inlineFormCustomSelect">
                                            <option selected disabled>Choose...</option>
                                            @foreach($transfer_returns as $value)
                                              <option value="{{$value->transfer_returns_id}}">{{$value->transfer_returns_name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <div class="col">
                                          @php
                                              $transfer_return_types = \DB::table('hospital_programs')
                                              ->join('transfer_returns', 'transfer_returns.hospital_program_id', '=', 'hospital_programs.id')
                                              ->join('transfer_return_types', 'transfer_return_types.transfer_return_id', '=', 'transfer_returns.id')
                                              ->select('hospital_programs.name as program_name', 
                                                        'transfer_return_types.id as transfer_return_types_id',
                                                        'transfer_return_types.name as transfer_return_types_name')
                                              ->where('hospital_programs.id', $hospital_detail->hospital_programs_id)
                                              ->get();
                                          @endphp
                                          <select class="custom-select mr-sm-2" name="transfer_return_type_id" id="transfer_return_type_id" id="inlineFormCustomSelect">
                                            <option selected disabled>Choose...</option>
                                            @foreach($transfer_return_types as $value)
                                              <option value="{{$value->transfer_return_types_id}}">{{$value->transfer_return_types_name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12"><br>
                                  <div class="clearfix">
                                    <p class="float-left">Total Cost :</p>
                                    <h3 class="float-right font-weight-bold">${{number_format($hospital_detail->hospital_programs_price,2,",",".")}}</h3>
                                  </div><br>
                                    <i class="ion-ios-information-outline float-left"></i>
                                    <small class="float-left mt-1">&nbsp;The prices may vary depending on the stage of disease</small>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            @guest
                              <button class="btn btn-block btn-lg btn-outline-primary" data-toggle="modal" data-target="#register_modal">
                                Register now!
                              </button>
                            @else
                              <button type="submit" class="btn btn-block btn-lg btn-outline-success">Book now</button>
                            @endguest
                          </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-12">
                      <div class="card border-primary mb-3">
                        <div class="card-body">
                          <small>All Program : {{$hospital_detail->second_categories_name}}</small>
                          <hr>
                          <h4 class="text-left text-dark">{{$hospital_detail->name}}</h4>
                          <small class="text-right">{!!$hospital_detail->address!!}</small>
                          <div class="list-group border-0">
                            @foreach($hospital_program_all as $value)
                                @if($value->hospital_programs_id != $hospital_detail->hospital_programs_id)
                                <a href="{{route('show-detail-category', $value->hospital_programs_id)}}" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start">
                                  <div class="clearfix">
                                    <h6 class="float-left mb-1">{{$value->hospital_programs_name}}</h6>
                                    <small class="float-right text-warning">${{number_format($value->hospital_programs_price,2,",",".")}}</small><br>
                                  </div>
                                </a>
                                @endif
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
              
          </div>
            
          </div>
      </div>
    </div>
</section>
@endsection

@section('javascript')
<script>
$(document).ready(function(){
  // Transfer_arrivals
  $('#transfer_arrival_id').attr('disabled', true);
  $('#air_hos').click(function(){
    if($(this).is(':checked'))
    { $('#transfer_arrival_id').attr('disabled',false); }
    else
    { $('#transfer_arrival_id').attr('disabled',true); }
  });
});
</script>
@endsection