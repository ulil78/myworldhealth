<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color: #e9ecef00!important;">
    <li class="breadcrumb-item" aria-current="page">
      <i class="ion-ios-bookmarks-outline"></i>
    </li>
    <li class="breadcrumb-item" aria-current="page">
      <a class="text-dark" href="{{route('beranda')}}">Home</a>
    </li>
    <li class="breadcrumb-item" aria-current="page">
      {{$category->name}}
    </li>
  </ol>
</nav>