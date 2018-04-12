@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.banner.promo')
@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="row p-4">
                <div class="col-md-12 col-12">
                    <div class="clearfix">
                        <p class="float-left">
                            <i class="ion-ios-search-strong" style="font-size: 20px"></i> 
                            Your search result in :<b>{{$search_result}}</b>
                        </p>
                        <div class="col-md-2 float-right">
                            <select class="form-control form-control-sm col-12" id="exampleFormControlSelect1">
                              <option selected disabled>Sort By</option>
                            </select>
                        </div>
                    </div>
                    <hr class="my-hr">
                </div>
                <div class="col-md-12 col-12">
                    <div class="row">
                        <div class="col-md-2">
                            <p class="float-left font-weight-bold">Filter by</p>
                        </div>
                        <div class="col-md-4">
                            @php
                            $countries = \App\Country::orderBy('name')->get();
                            @endphp
                            <select class="form-control form-control-sm border-primary" id="exampleFormControlSelect1">
                               <option>Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            @php
                            $cities = \App\City::orderBy('name')->get();
                            @endphp
                            <select class="form-control form-control-sm border-primary" id="exampleFormControlSelect1">
                              <option>Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <a href="#" class="btn btn-primary float-right">Change Search</a>
                        </div>
                    </div>
                    <div class="row">
                        <br class="my-br"> 
                    </div>
                    <div class="row">
                        @forelse($query as $value)
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <img class="card-img-top" src="https://placeholdit.co/i/272x150?bg=eeeeee&fc=577084" alt="Card image cap">
                                        </div>
                                        <div class="col-md-8 col-12">
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
        </div>
    </div>
</section>
@endsection