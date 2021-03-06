@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.banner.cover')
@endsection

@section('content')
<section>
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
                    <legend>Acne Diagnostic Treatment</legend>
                    <p>
                        Type of program : <b>Outpatient</b> <br>
                        Expected Duration : <b>3 Days</b> <br>
                        Service Fees : <b>$1.000</b>
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
                        <label for="exampleFormControlSelect1">Select Date :</label>
                          <div class="row">
                            <div class="col">
                              <input type="text" class="form-control" placeholder="Date Start">
                            </div>
                            <div class="col">
                              <input type="text" class="form-control" placeholder="Date Finish">
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">You may also book :</label>
                          <div class="row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                                  <label class="custom-control-label" for="customCheck1">Interpreter / hour $10</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                                  <label class="custom-control-label" for="customCheck1">
                                    Translations of Medical Document / page $ 2
                                  </label>
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Travel :</label>
                          <div class="row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                                  <label class="custom-control-label" for="customCheck1">
                                    Hospital to Airport
                                  </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>
                                    </div>
                                    <div class="col">
                                      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                                  <label class="custom-control-label" for="customCheck1">Airport to Hospital</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>
                                    </div>
                                    <div class="col">
                                      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12"><br>
                                <h3 class="float-right font-weight-bold">Total Cost : $ 1.210</h3><br>
                                <p class="float-right">i : The prices may vary depending on the stage of disease</p>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <button class="btn btn-block btn-lg btn-outline-success">Book Now</button>
                      </div>
                    </from>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection