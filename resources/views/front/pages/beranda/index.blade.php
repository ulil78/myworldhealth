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
                    <p class="lead">Our hospital and travel partner all around the world</p>
                    <p>We are partnering with various hospital and medical clinic across the world to give you the best Healty care & Treatment</p>
                </div>
                <div class="col-md-8 col-12">
                    <div class="card-deck p-5">
                      <div class="card">
                        <img class="card-img-top" src="http://www.geg.ox.ac.uk/sites/geg/files/styles/large/public/who_logo_0.gif?itok=7gTTWFf7" alt="Card image cap">
                      </div>
                      <div class="card">
                        <img class="card-img-top" src="http://safelyfed.org/wp-content/uploads/2016/02/H_6d_s_p-300x300.jpg" alt="Card image cap">
                      </div>
                      <div class="card">
                        <img class="card-img-top" src="https://placeholdit.co/i/300x300?bg=eeeeee&fc=577084" alt="Card image cap">
                      </div>
                      <div class="card">
                        <img class="card-img-top" src="https://placeholdit.co/i/300x300?bg=eeeeee&fc=577084" alt="Card image cap">
                      </div>
                      <div class="card">
                        <img class="card-img-top" src="https://placeholdit.co/i/300x300?bg=eeeeee&fc=577084" alt="Card image cap">
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
                <div class="col-md-4 col-12">
                     <img class="img-fluid" src="{{url('img/mwh-01.png')}}" class="rounded float-left" alt="...">
                </div>
                <div class="col-md-8 col-12">
                    <legend class="text-dark">Secure Guaranted</legend>
                    <p class="text-dark">Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid</p>
                </div>
                <div class="col-md-12">
                    <br class="my-br">
                </div>
                <div class="col-md-4 col-12">
                     <img class="img-fluid" src="{{url('img/mwh-02.png')}}" class="rounded float-left" alt="...">
                </div>
                <div class="col-md-8 col-12">
                    <legend class="text-dark">Licensed Hospitals</legend>
                    <p class="text-dark">Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid</p>
                </div>
                <div class="col-md-12">
                    <br class="my-br">
                </div>
                <div class="col-md-4 col-12">
                     <img class="img-fluid" src="{{url('img/mwh-03.png')}}" class="rounded float-left" alt="...">
                </div>
                <div class="col-md-8 col-12">
                    <legend class="text-dark">Licensed Hospitals</legend>
                    <p class="text-dark">Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection