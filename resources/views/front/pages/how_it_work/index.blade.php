@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.jumbotron')
@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="row p-4">
                @forelse($howitwork as $value)
                    <div class="col-md-12 col-12">
                        <legend>{{$value['title']}}</legend>
                        <p>{!!$value['description']!!}</p>
                    </div>
                @empty
                    <div class="col-md-12 col-12">
                    {{-- Not Found Page --}}
                        @include('front.partials.components.not-found-page')
                    {{-- End Not Found Page --}}
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection