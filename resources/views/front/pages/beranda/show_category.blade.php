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
                {{$category->name}}
              </li>
            </ol>
          </nav>
        </div>
        <div class="col-md-12 col-12">
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
                <div class="card" style="width: 70rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <img class="card-img-top" src="https://placeholdit.co/i/272x150?bg=eeeeee&fc=577084" alt="Card image cap">
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="clearfix">
                                          <h2 class="float-left">{{$value->name}}</h2>
                                          {{-- <div class="float-right">
                                            <div class="col-md-12">
                                                {{$value->reviews_star}}
                                                <i class="ion-ios-star-outline text-warning" style="font-size: 20px;"></i>
                                                <i class="ion-ios-star-outline text-warning" style="font-size: 20px;"></i>
                                                <i class="ion-ios-star-outline text-warning" style="font-size: 20px;"></i>
                                                <i class="ion-ios-star-outline text-warning" style="font-size: 20px;"></i>
                                                <i class="ion-ios-star-outline text-warning" style="font-size: 20px;"></i>
                                            </div>
                                          </div> --}}
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                        <small class="text-primary"">{{$category->name}}</small>
                                        <p>{!!$category->description!!}</p>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="clearfix">
                                          <div class="float-left">
                                              <p>
                                                <i class="ion-ios-location-outline" style="font-size: 20px;"></i> 
                                                <b>Country</b> : {{$value->countries_name}} <br>
                                                <i class="ion-ios-paperplane-outline" style="font-size: 20px;"></i> 
                                                <b>City</b> : {{$value->cities_name}}
                                              </p>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="clearfix">
                                        <div class="float-left">
                                          <h3 class="text-warning">
                                            ${{number_format($value->hospital_programs_price,2,",",".")}}
                                          </h3>
                                        </div>
                                        <div class="float-right">
                                          <a href="{{route('show-detail-category', $value->hospitals_slug)}}">
                                            <button class="btn btn-block btn-outline-primary">More</button>
                                          </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                      Not Found<hr>
                      <small class="text-danger">Not found data</small>
                      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo</p>
                    </div>
                </div>
            </div>
            @endforelse
              
          </div>
            
          </div>
      </div>
    </div>
</section>
@endsection