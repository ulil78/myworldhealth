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
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-4 col-12">
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
                          <button class="btn btn-block btn-success float-right">Process</button>
                        </div>
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