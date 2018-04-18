@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.jumbotron')
@endsection

@section('content')
<section>
    <div class="row">
        <div class="d-flex justify-content-center">
          <div class="col-md-12 p-2 mb-2">
              <div class="error-template">
                  <h1>
                      Oops!</h1>
                  <h2>
                      404 Not Found</h2>
                  <div class="error-details">
                      Sorry, an error has occured, Requested data not found!<br>
                      <small class="text-danger font-weight-bold">Sorry your don't have a category, please fill the hospital using third category</small>
                  </div><br>
                  <div class="error-actions">
                    <a href="{{route('beranda')}}" class="btn btn-light btn-sm">
                      <span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                  </div>
              </div>
          </div>
            
        </div>
    </div>
</section>
@endsection