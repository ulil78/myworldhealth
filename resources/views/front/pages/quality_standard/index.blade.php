@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.jumbotron')
@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="row p-4">
                @forelse($quality as $value)
                    <div class="col-md-6 col-12">
                        <img src="{{asset($value['path'].$value['filename'])}}" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-12">
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