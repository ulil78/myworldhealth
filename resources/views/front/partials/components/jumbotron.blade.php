<header id="header">
  <div class="my-jumbotron p-4">
    <h1 class="display-5 text-center text-light">Book any health treatment’s  you need</h1>
    <p class="lead text-center text-light">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <div class="d-flex justify-content-center">
        <div class="col-md-8 col-12">
            <hr class="my-4">
            <div class="justify-content-center">
              <form action="{{route('search-category')}}" method="GET">
                  {{csrf_field()}}
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text input-group-text-front">
                          <i class="ion-ios-navigate-outline" style="font-size: 30px;"></i>
                        </div>
                      </div>
                      <div class="input-group-prepend">
                        <div class="input-group-text input-group-text-front">
                          <select class="form-control form-control-edit" name="category" required>
                            <option selected disabled>Select</option>
                            <option class="dropdown-item" value="city">City</option>
                            <option class="dropdown-item" value="hospital">Hospital</option>
                            <option class="dropdown-item" value="service">Service</option>
                          </select>
                        </div>
                      </div>
                      <input type="text" class="form-control" name="search" id="search" placeholder="City, hospital, place to go">
                      <div class="input-group-append">
                        <button class="btn btn-light" type="submit">
                          <i class="ion-ios-search-strong" style="font-size: 20px;"></i>
                        </button>
                      </div>
                  </div> 
              </form>
            </div>
            <div class="card" style="background-color: transparent; border: none;">
                <div class="card-body">
                  @php
                    $category = \App\SecondCategory::orderBy('name')->get();
                  @endphp
                  <p class="text-light">Popular Search</p>
                  @foreach ($category as $value)
                    <a href="{{ url('hospitals/categories/'.$value->slug.'') }}"><span class="badge badge-primary">{{$value->name}}</span></a>
                  @endforeach
                </div>
            </div>
        </div>
        
    </div>
  </div>
</header>

@section('javascript')

@endsection