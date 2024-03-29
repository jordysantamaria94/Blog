@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-10">
            <h2 class="rubikFontbold mb-3">{{ __('main.last_new') }}</h2>
            @include("widgets.jumbotron")
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-10">
            <h2 class="rubikFontbold mb-3">{{ __('main.articles') }}</h2>
            <div class="row">
                @foreach($posts as $item)
                <div class="col-md-6 mb-3">
                    @include("widgets.card")
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection