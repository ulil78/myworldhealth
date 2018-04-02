@extends('front.layouts.app')

@section('jumbotron')
    @include('front.partials.components.jumbotron')
@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="row p-4">
                @forelse($faq as $value)
                    <div class="col-md-12 col-12">
                        <div class="media text-muted pt-3">
                          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark">{{$value['question']}}</strong>
                            {{$value['answer']}}
                          </p>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 col-12">
                        <legend>Not Found</legend>
                        <p class="lead text-secondary">Lorem</p>
                        <p>Not Found</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection