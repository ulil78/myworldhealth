@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.jumbotron')
@endsection

@section('content')
<section>
    <div class="row">
      <div class="p-2" style="background-color: #e9ecef;">
        <div class="col-md-12 col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" aria-current="page">
                <i class="ion-ios-bookmarks-outline"></i>
              </li>
              <li class="breadcrumb-item" aria-current="page">Home
              </li>
              <li class="breadcrumb-item" aria-current="page">
                {{$category->name}}
              </li>
            </ol>
          </nav>
        </div>
        <div class="d-flex justify-content-center">
          @forelse($hospital_program as $value)
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
                                  <div class="float-right">
                                    <div class="col-md-12">
                                        {{$value->reviews_star}}
                                        <i class="ion-ios-star-outline text-warning" style="font-size: 20px;"></i>
                                        <i class="ion-ios-star-outline text-warning" style="font-size: 20px;"></i>
                                        <i class="ion-ios-star-outline text-warning" style="font-size: 20px;"></i>
                                        <i class="ion-ios-star-outline text-warning" style="font-size: 20px;"></i>
                                        <i class="ion-ios-star-outline text-warning" style="font-size: 20px;"></i>
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <p class="lead">{{$value->hospital_departments_name}}</p>
                                      <p>{{$value->hospital_departments_description}}</p>
                                  </div>
                              </div>
                              <div class="clearfix">
                                  <h5 class="float-left">
                                      <p>Country in : {{$value->countries_name}}</p>
                                      <p>City in : {{$value->cities_name}}</p>
                                  </h5>
                              </div>
                          </div>
                          <div class="col-md-12 col-12">
                              <div class="clearfix">
                                  <div class="float-right">
                                    <button class="btn btn-block btn-light">More</button>
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
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo</p>
                  </div>
              </div>
          </div>
          @endforelse
            
        </div>
      </div>
    </div>
</section>
@endsection