@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.jumbotron')
@endsection

@section('content')
<section>
    <div class="row" style="background-color: #e9ecef;">
      <div class="p-2">
        <div class="col-md-12 col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" aria-current="page">
                <i class="ion-ios-bookmarks-outline"></i>
              </li>
              <li class="breadcrumb-item" aria-current="page">
                <a class="text-dark" href="{{route('beranda')}}">Home</a>
              </li>
              <li class="breadcrumb-item" aria-current="page">
                <a class="text-dark" href="{{ url('hospitals/categories/'.$hospital_detail->second_categories_slug.'') }}">
                  {{$hospital_detail->second_categories_name}}
                </a>
              </li>
              <li class="breadcrumb-item" aria-current="page">
                {{$hospital_detail->thrid_categories_name}}
              </li>
            </ol>
          </nav>
        </div>
        <div class="d-flex justify-content-center">
          <div class="row">
            <div class="col-md-12 col-12">
                <div class="row p-4">
                    <div class="col-md-12 col-12">
                        <div class="text-center">
                            <h2>Book Treatment Details</h2>
                        </div>
                        <hr class="my-hr">
                    </div>
                    <div class="col-md-6 col-12">
                        <legend>{{$hospital_detail->thrid_categories_name}}</legend>
                        <p>
                            Type of program : <b>{{$hospital_detail->hospital_programs_name}}</b> <br>
                            Expected Duration : <b>3 Days</b> <br>
                            Service Fees : <b>${{number_format($hospital_detail->hospital_programs_price,2,",",".")}}</b>
                        </p>
                        <legend>Program Include :</legend>
                        <ul class="list-unstyled">
                          <li>Lorem ipsum dolor sit amet</li>
                          <li>Consectetur adipiscing elit</li>
                          <li>Integer molestie lorem at massa</li>
                          <li>Facilisis in pretium nisl aliquet</li>
                          <li>Nulla volutpat aliquam velit
                            <ul>
                              <li>Phasellus iaculis neque</li>
                              <li>Purus sodales ultricies</li>
                              <li>Vestibulum laoreet porttitor sem</li>
                              <li>Ac tristique libero volutpat at</li>
                            </ul>
                          </li>
                          <li>Faucibus porta lacus fringilla vel</li>
                          <li>Aenean sit amet erat nunc</li>
                          <li>Eget porttitor lorem</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <from>
                          <div class="form-group">
                              <div class="row">
                                <div class="col">
                                  <small for="exampleFormControlSelect1">Date Form :</small>
                                  <input type="date" class="form-control" placeholder="Date Start">
                                </div>
                                <div class="col">
                                  <small for="exampleFormControlSelect1">To :</small>
                                  <input type="date" class="form-control" placeholder="Date Finish">
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
                                        <input type="checkbox" class="custom-control-input" id="check_in" value="1">
                                        <label class="custom-control-label" for="check_in">Interpreter / hour $10</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <input type="number" class="form-control" min="0" name="interpreter_qty" id="interpreter_qty">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="row mt-2">
                                    <div class="col-md-6">
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="check_doc" value="1">
                                        <label class="custom-control-label" for="check_doc">
                                          Translations of Medical Document / page $ 2
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <input type="number" class="form-control" min="0" name="translation_med_document_qty" id="translation_med_document_qty">
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
                                      <input type="checkbox" class="custom-control-input" id="hos_air" value="1">
                                      <label class="custom-control-label" for="hos_air">
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
                                          <select class="custom-select mr-sm-2" name="transfer_arrival_id" id="transfer_arrival_id" id="inlineFormCustomSelect">
                                            <option selected>Choose...</option>
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
                                          <select class="custom-select mr-sm-2" name="transfer_arrival_type_id" id="transfer_arrival_type_id" id="inlineFormCustomSelect">
                                            <option selected>Choose...</option>
                                            @foreach($transfer_arrival_types as $value)
                                              <option value="{{$value->transfer_arrival_types_id}}">{{$value->transfer_arrival_types_name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="air_hos" value="1">
                                      <label class="custom-control-label" for="air_hos">Hospital to Airport</label>
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
                                            <option selected>Choose...</option>
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
                                            <option selected>Choose...</option>
                                            @foreach($transfer_return_types as $value)
                                              <option value="{{$value->transfer_return_types_id}}">{{$value->transfer_return_types_name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12"><br>
                                    <h3 class="float-left font-weight-bold">Total Cost : ${{number_format($hospital_detail->hospital_programs_price,2,",",".")}}</h3><br>
                                    <p class="float-left">i : The prices may vary depending on the stage of disease</p>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            @guest
                              <button class="btn btn-block btn-lg btn-outline-primary" data-toggle="modal" data-target="#register_modal">
                                Register Now!
                              </button>
                            @else
                              <button type="submit" class="btn btn-block btn-lg btn-outline-success">Book Now</button>
                            @endguest
                          </div>
                        </from>
                    </div>
                </div>
            </div>
              
          </div>
            
          </div>
      </div>
    </div>
</section>
@endsection