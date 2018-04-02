<header id="header">
  <div class="my-jumbotron p-4">
    <h1 class="display-5 text-center text-light">Book any health treatment’s  you need</h1>
    <p class="lead text-center text-light">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <div class="d-flex justify-content-center">
        <div class="col-md-8 col-12">
            <hr class="my-4">
            <div class="justify-content-center">
                <input class="form-control form-control-lg" type="text" placeholder="Type the service you looking for ...">
            </div>
            <div class="card" style="background-color: transparent; border: none;">
                <div class="card-body">
                  @php
                    $category = \App\SecondCategory::orderBy('name')->get();
                  @endphp
                  <p class="text-light">Popular Search</p>
                  @foreach ($category as $value)
                    <a href="{{ url('hospitals/categories/'.$value->id.'') }}"><span class="badge badge-primary">{{$value->name}}</span></a>
                  @endforeach
                </div>
            </div>
        </div>
        
    </div>
  </div>
</header>