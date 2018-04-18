@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.banner.promo')
@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-md-12 col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background-color: #e9ecef00!important;">
              <li class="breadcrumb-item" aria-current="page">
                <i class="ion-ios-bookmarks-outline"></i>
              </li>
              <li class="breadcrumb-item" aria-current="page">
                <a class="text-dark" href="{{route('beranda')}}">Home</a>
              </li>
              <li class="breadcrumb-item" aria-current="page">
                Detail
              </li>
            </ol>
          </nav>
        </div>
        <div class="col-md-12 col-12">
            <iframe width="100%" height="125" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk/maps?f=q&source=s_q&hl=en&geocode=&q=15+Springfield+Way,+Hythe,+CT21+5SH&aq=t&sll=52.8382,-2.327815&sspn=8.047465,13.666992&ie=UTF8&hq=&hnear=15+Springfield+Way,+Hythe+CT21+5SH,+United+Kingdom&t=m&z=14&ll=51.077429,1.121722&output=embed"></iframe>
        </div>
        <div class="col-md-12 col-12">
            <div class="row p-1">
                <div class="col-md-12 col-12">
                    <div class="row">
                            <div class="col-md-8 col-12">
                                @foreach($hospital_detail->images as $value)
                                <img class="card-img-top w-100" src="{{asset($value->path.$value->filename)}}" alt="{{$value->name}}"/>
                                @endforeach
                                <div class="card-body">
                                    <legend>About</legend>
                                    <hr>
                                    <p>
                                    {!!$hospital_detail->description!!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                              <div class="card border-primary mb-3" id="">
                                <div class="card-body">
                                  <h6>{{$hospital_detail->name}}</h6>
                                  <hr>
                                    <div class="col-12 float-left">
                                        <i class="ion-ios-star text-warning"></i>
                                        <i class="ion-ios-star text-warning"></i>
                                        <i class="ion-ios-star text-warning"></i>
                                        <i class="ion-ios-star text-warning"></i>
                                        <i class="ion-ios-star text-warning"></i>
                                    </div>
                                    <div class="card-body">
                                        <small><b>Address : </b><br>{!!$hospital_detail->address!!}</small>
                                        <div class="clearfix">
                                            <ul class="list-unstyled">
                                              <li><small>Information</small>
                                                <ul>
                                                  <li><small>Amount of Beds Availabel : </small></li>
                                                  <li><small>Inpatient Yearly : </small></li>
                                                  <li><small>Outpatient Yearly : </small></li>
                                                </ul>
                                              </li>
                                            </ul>
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