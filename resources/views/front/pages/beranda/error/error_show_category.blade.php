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
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo</p>
                  </div>
              </div>
          </div>
            
        </div>
      </div>
    </div>
</section>
@endsection