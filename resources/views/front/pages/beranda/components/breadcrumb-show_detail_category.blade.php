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
        <a class="text-dark" href="{{ url('hospitals/categories/'.$hospital_detail->second_categories_slug.'') }}">
          {{$hospital_detail->second_categories_name}}
        </a>
      </li>
      <li class="breadcrumb-item" aria-current="page">
        {{$hospital_detail->thrid_categories_name}}
      </li>
    </ol>
  </nav>
</div>