@extends('merchant.layouts.master')

@section('main-content')
<div class="mt-content-body">
    <div class="row">
      @include('merchant/map')
      @include('merchant/chart')
    </div>
</div>
@endsection
