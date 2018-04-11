@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.jumbotron')
@endsection

@section('content')
<section>
    <div class="row">
      <div class="p-2">
        <div class="col-md-12 col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
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
              <li class="breadcrumb-item" aria-current="page">
                Booked
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
                            <h2>Book Process Details</h2>
                        </div>
                        <hr class="my-hr">
                    </div>
                    <div class="col-md-4 col-12">
                        <legend>Programs :</legend>
                        <ul class="list-unstyled">
                          <li>Name : {{$hospital_detail->thrid_categories_name}}
                            <ul>
                              <li>Phasellus iaculis neque</li>
                              <li>Purus sodales ultricies</li>
                              <li>Vestibulum laoreet porttitor sem</li>
                              <li>Ac tristique libero volutpat at</li>
                            </ul>
                          </li>
                          <li>Consectetur adipiscing elit</li>
                          <li>Integer molestie lorem at massa</li>
                          <li>Facilisis in pretium nisl aliquet</li>
                        </ul>
                        <p>
                            Type of program : <b>{{$hospital_detail->hospital_programs_name}}</b> <br>
                            Expected Duration : <b>3 Days</b> <br>
                            Service Fees : <b>${{number_format($hospital_detail->hospital_programs_price,2,",",".")}}</b>
                        </p>
                    </div>
                    <div class="col-md-4 col-12">
                        <legend>User Transcript Data :</legend>
                        <ul class="list-unstyled">
                          <li>Name : {{Auth::user()->name}}</li>
                          <li>Email : {{Auth::user()->email}}</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-12">
                      <div class="card">
                        <div class="card-body">
                          <from>
                            <legend>Form Checkout</legend>
                            <div class="form-group">
                                <div class="row">
                                  <div class="col">
                                    <small for="exampleFormControlSelect1">Date :</small>
                                    <input type="text" class="form-control" placeholder="Card Number" name="" id="">
                                    <i class="ion-ios-information-outline"></i> <small>Default counted 3 days</small>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                  <div class="col">
                                    <small for="exampleFormControlSelect1">CVC :</small>
                                    <input type="text" class="form-control" placeholder="Card Number" name="" id="">
                                  </div>
                                  <div class="col">
                                    <small for="exampleFormControlSelect1">Expired Date :</small>
                                    <input type="text" class="form-control" placeholder="Card Number" name="" id="">
                                  </div>
                                </div>
                            </div>
                          </from>
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

@endsection