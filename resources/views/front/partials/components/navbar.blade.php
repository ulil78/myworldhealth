<nav class="navbar navbar-expand-lg navbar-light nav_metallic">
  <a href="#menu-toggle" id="menu-toggle"><i class="ion-ios-keypad" style="font-size: 30px;color: #ffc326"></i></a>
  <a class="navbar-brand ml-3 text-light align-center" href="#">
    <img class="img-fluid" src="{{url('img/myworldhealth-logo.png')}}" width="200px" height="200px" class="rounded float-left" alt="...">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="nav nav-pills nav-fill d-block d-sm-none text-center">
      <li class="nav-item">
        <a class="nav-link text-light font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Treatments</a>
        <div class="dropdown-menu" style="width:100%">
          <div class="px-0 container">
              <div class="row">
                  <div class="col-md-4">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <a class="dropdown-item" href="#">Or a link</a>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                  </div>
                  <div class="col-md-4">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <a class="dropdown-item" href="#">Or a link</a>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                  </div>
                <div class="col-md-4">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <a class="dropdown-item" href="#">Or a link</a>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                  </div>
              </div>
          </div>
        </div>

      </li>
      <li class="nav-item">
        <a class="nav-link text-light font-weight-bold" href="#">Diagnostics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light font-weight-bold" href="#">Rehabilitations </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light font-weight-bold" href="#">Spa & Beauty</a>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 float-left">
      <li class="nav-item active">
        <a class="nav-link text-light" href="#">
            <small>(021) 555 12345</small> <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    @guest
      <div class="btn-group my-2 my-lg-0 float-right" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#login_modal">Login</button>
        <button type="button" class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#register_modal">Register</button>
      </div>
    @else
      <div class="btn-group my-2 my-lg-0 float-right" role="group" aria-label="Basic example">
        <a href="#" class="btn btn-sm btn-outline-light">{{ Auth::user()->email }}</a>
        <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-light"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </div>
     @endguest
  </div>
</nav>
<nav class="d-none d-lg-block d-md-block">
    @php
      $first_category = \App\FirstCategory::all();
    @endphp
    {{-- {{dd($first_category)}} --}}
    <ul class="nav nav-pills nav-fill" style="background-color: #ffc326">
      @foreach ($first_category as $cat)
      <li class="nav-item">
        <a class="nav-link text-light font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
          {{$cat->name}}
        </a>
        <div class="dropdown-menu" style="width:100%">
          <div class="px-0 container">
              <div class="row">
                  <div class="col-md-4">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <a class="dropdown-item" href="#">Or a link</a>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                  </div>
                  <div class="col-md-4">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <a class="dropdown-item" href="#">Or a link</a>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                  </div>
                <div class="col-md-4">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <a class="dropdown-item" href="#">Or a link</a>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                  </div>
              </div>
          </div>
        </div>

      </li>
      @endforeach
    </ul>
</nav>
{{-- Login Modal --}}
@include('front.auth.login')
@include('front.auth.register')