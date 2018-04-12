@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.jumbotron')
@endsection

@section('content')
<section>
    <div class="row">
        {{-- Breadcrumb Components Pages --}}
        @include('front.pages.beranda.components.breadcrumb-show_category')
        {{-- End Breadcrumb Components Pages --}}
        <div class="col-md-12 col-12 p-1">
          <div class="clearfix">
            <div class="float-left">
              Filter
            </div>
            <div class="float-right">
              <div class="dropdown">
                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Filter
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
          </div>
          <hr class="bg-light ml-0">
        </div>
        <div class="d-flex justify-content-center">
          <div class="row">
          @forelse($hospital_program as $value)
          <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="col-lg-4 col-md-4 col-12">
                          <img class="card-img-top" src="https://placeholdit.co/i/272x150?bg=eeeeee&fc=577084" alt="Card image cap">
                      </div>
                      <div class="col-lg-8 col-md-8 col-12">
                          <div class="clearfix">
                              <h2 class="float-left">{{$value->name}}</h2>
                              <span class="float-right text-warning">
                                  <h4>${{number_format($value->hospital_programs_price,2,",",".")}}</h4>
                              </span>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <i class="ion-ios-star-outline" style="font-size: 20px;"></i>
                                  <i class="ion-ios-star-outline" style="font-size: 20px;"></i>
                                  <i class="ion-ios-star-outline" style="font-size: 20px;"></i>
                                  <i class="ion-ios-star-outline" style="font-size: 20px;"></i>
                                  <i class="ion-ios-star-outline" style="font-size: 20px;"></i>
                              </div>
                              <div class="col-md-12">
                                  <p class="lead">{{$value->hospital_programs_name}}</p>
                                  <p>{!!$value->hospital_programs_description!!}</p>
                              </div>
                          </div>
                          <div class="clearfix">
                              <div class="float-left">
                                <p>
                                  <i class="ion-ios-location-outline" style="font-size: 20px;"></i> 
                                  <b>Country</b> : {{$value->countries_name}} <br>
                                  <i class="ion-ios-paperplane-outline" style="font-size: 20px;"></i> 
                                  <b>City</b> : {{$value->cities_name}}
                                </p>
                              </div>
                              <a href="{{route('show-detail-category', $value->hospital_programs_id)}}" class="float-right badge badge-warning text-light">See Details</a>
                          </div>
                        </div>
                      </div>
                  </div>
              </div><br>
            </div>
            @empty
            {{-- Not Found Page --}}
                @include('front.partials.components.not-found-page')
            {{-- End Not Found Page --}}
            @endforelse
              
          </div>
            
          </div>
    </div>
</section>
@endsection