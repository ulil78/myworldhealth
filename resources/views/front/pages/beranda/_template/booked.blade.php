@extends('front.layouts.app')

@section('content')
<section>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="row p-4">
              <div class="col-md-12 col-12">
                <div class="clearfix">
                  <h4 class="float-left">Treatment Booking</h4>
                  <button class="btn btn-success float-right">Next</button>
                </div>
              </div>
              <div class="col-md-12 col-12"><br>
                <div class="card">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb" style="background-color: transparent;">
                    <li class="breadcrumb-item"><a href="#">Your Profile</a></li>
                    <li class="breadcrumb-item"><a href="#">Payment Info</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Review</li>
                    <li class="breadcrumb-item active" aria-current="page">Process</li>
                    <li class="breadcrumb-item active" aria-current="page">Get Booking Code</li>
                  </ol>
                </nav>
                </div><br>
              </div>
              {{-- Form --}}
              <div class="col-md-12 col-12">
                <form>
                  <div class="row">
                    <div class="col-md-6 col-12">
                      <div class="card">
                        <div class="card-body">
                          <legend class="text-center">Booking Details</legend>
                          <hr>
                          <div class="clearfix">
                            <p class="float-left">Acne Diagnostic Treatment </p>
                            <p class="float-right">$ 1000</p>
                          </div>
                          <div class="clearfix">
                            <p class="float-left">Interpreter </p>
                            <p class="float-right">$ 100</p>
                          </div>
                          <div class="clearfix">
                            <p class="float-left">Translate medical document </p>
                            <p class="float-right">$ 50</p>
                          </div>
                          <div class="clearfix">
                            <p class="float-left">Travel airport to hospital </p>
                            <p class="float-right">$ 30</p>
                          </div>
                          <div class="clearfix">
                            <p class="float-left">travel hospital to airport </p>
                            <p class="float-right">$ 20</p>
                          </div>
                          <div class="clearfix">
                            <p class="float-left">Duration of treatment </p>
                            <p class="float-right">3 Days</p>
                          </div>
                          <div class="clearfix">
                            <p class="float-left">Start date </p>
                            <p class="float-right">April 1st, 2018 </p>
                          </div>
                          <div class="clearfix">
                            <p class="float-left">Finish  date </p>
                            <p class="float-right">April 3st, 2018 </p>
                          </div>
                          <hr>
                          <div class="clearfix">
                            <p class="float-left">Total cost</p>
                            <p class="float-right">$ 1.210</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="inputAddress">Name</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Name">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Email</label>
                          <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="">Phone</label>
                          <input type="text" class="form-control" id="" placeholder="Phone">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="gridCheck">
                          <label class="form-check-label" for="gridCheck">
                            I’m the patient
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">Patient Name</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Name">
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlInput1">Diagnosis *</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                      <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                        <small for="exampleFormControlTextarea1">Brief description of your medical conditions</small>
                      </div>
                    </div>
                  </div>
                  
                </form>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection