@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.jumbotron')
@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="row p-4">
                <div class="col-md-4 col-12">
                    <legend>Our Partners</legend>
                    <p class="lead text-secondary">Our hospital and travel partner all around the world</p>
                    <p>We are partnering with various hospital and medical clinic across the world to give you the best Healty care & Treatment</p>
                </div>
                <div class="col-md-8 col-12">
                    <div class="row p-5">
                    @forelse($partner as $value)
                    <a href="{{$value['url']}}" target="_blank">
                      <div class="col-3">
                        <img class="img-fluid" width="400px" height="400px" src="{{asset($value['path'].$value['filename'])}}" alt="{{$value['name']}}">
                      </div>
                    </a>
                    @empty
                      <div class="col-md-12 col-12">
                          <p>Not Found</p>
                      </div>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="row p-4">
                <div class="col-md-12 col-12">
                    <legend>Client Reviews</legend>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <div class="col-12">
                            <i class="ion-ios-star text-warning"></i>
                            <i class="ion-ios-star text-warning"></i>
                            <i class="ion-ios-star text-warning"></i>
                            <i class="ion-ios-star text-warning"></i>
                            <i class="ion-ios-star text-warning"></i>
                        </div>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <div class="col-12">
                            <i class="ion-ios-star text-warning"></i>
                            <i class="ion-ios-star text-warning"></i>
                            <i class="ion-ios-star text-warning"></i>
                            <i class="ion-ios-star text-warning"></i>
                            <i class="ion-ios-star text-warning"></i>
                        </div>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <div class="col-12">
                            <i class="ion-ios-star text-warning"></i>
                            <i class="ion-ios-star text-warning"></i>
                            <i class="ion-ios-star text-warning"></i>
                            <i class="ion-ios-star text-warning"></i>
                            <i class="ion-ios-star text-warning"></i>
                        </div>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="row" style="background-color: #e6e6e6;">
        <div class="col-md-12 col-12">
            <div class="row p-4">
                <div class="col-md-12 col-12">
                    <h3 class="text-center text-dark">Why book with us?</h3>
                    <hr class="my-hr">
                </div>
                @forelse($why as $value)
                    <div class="col-md-4 col-12">
                         <img class="img-fluid" src="{{asset($value['path'].$value['filename'])}}" class="rounded float-left" alt="...">
                    </div>
                    <div class="col-md-8 col-12">
                        <legend class="text-dark">{{$value['title']}}</legend>
                        <p class="text-dark">{!!$value['description']!!}</p>
                    </div>
                    <div class="col-md-12">
                        <br class="my-br">
                    </div>
                @empty
                    <div class="col-md-12 col-12">
                        <legend class="text-dark">Not Found</legend>
                        <p class="text-dark">Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid</p>
                    </div>
                    <div class="col-md-12">
                        <br class="my-br">
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="row p-4">
                <div class="col-md-12 col-12 text-center">
                    <i class="ion-ios-chatboxes-outline d-flex justify-content-center" style="font-size: 60px;"></i>
                    <h5 class="text-center text-dark">Do you still have questions? Please contact us!</h5>
                    <br class="my-br">
                    <p class="text-center">We will assist you in selecting the best medical treatment to suit your needs. <br>
                    Medical Service Booking Health ™ will choose the appropriate clinic and a specialist according to your medical condition.</p>
                    <h4>+49 228 972 723 20</h4>
                    <br class="my-br">
                    <p>Bonn, Singapore</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection