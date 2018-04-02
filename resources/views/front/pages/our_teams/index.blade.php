@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.jumbotron')
@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="row p-4">
                <legend>Our Teams</legend><hr>
                @forelse($ourteam as $value)
                    <div class="col-md-4 col-12 p-1">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img src="{{asset($value['path'].$value['filename'])}}" class="img-fluid" width="150px" height="150px"></p>
                                <h4 class="card-title">{{$value['name']}}</h4>
                                <h6 class="card-title">{{$value['title']}}</h6>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 col-12">
                        <legend>Not Found</legend>
                        <p class="lead text-secondary">Lorem</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection