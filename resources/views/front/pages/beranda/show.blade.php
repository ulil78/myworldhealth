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
                        <p class="float-left">Your search result in <b>Acne Diagnostic</b></p>
                        <a href="#" class="float-right">Change Search</a>
                    </div>
                    <hr class="my-hr">
                </div>
                <div class="col-md-12 col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="float-left">Filter by :</p>
                        </div>
                        <div class="col-md-2">
                            <p>Sort by: </p>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control col-12" id="exampleFormControlSelect1">
                              <option>Selected</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <br class="my-br"> 
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control form-control-lg float-right" id="exampleFormControlSelect1">
                              <option>Country</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control form-control-lg float-right" id="exampleFormControlSelect1">
                              <option>City</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <br class="my-br"> 
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <img class="card-img-top" src="https://placeholdit.co/i/272x150?bg=eeeeee&fc=577084" alt="Card image cap">
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <div class="clearfix">
                                                <h2 class="float-left">Avenger Hospital</h2>
                                                <span class="float-right badge badge-warning"><h2>$ 1.000-</h2></span>
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
                                                    <p class="lead">Acne Diagnostic Treatment</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo</p>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <h5 class="float-left">
                                                    <i class="ion-ios-location-outline" style="font-size: 20px;"></i>
                                                    Germany, Bonn 
                                                </h5>
                                                <a href="#" class="float-right badge badge-warning">See Details</a>
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
    </div>
</section>
@endsection