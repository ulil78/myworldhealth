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
                Error
              </li>
            </ol>
          </nav>
        </div>
        <div class="d-flex justify-content-center">
          <div class="col-md-12 col-12">
              <div class="card">
                  <div class="card-body">
                    Not Found<hr>
                    <small class="text-danger">Sorry your don't have a category 3 please fill the hospital using category id 3</small>
                    <h2 class="text-center text-secondary">Not Found :(</h2>
                  </div>
              </div>
          </div>
            
        </div>
      </div>
    </div>
</section>
@endsection