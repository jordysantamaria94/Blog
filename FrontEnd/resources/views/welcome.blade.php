@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-10">
            <h2 class="rubikFontbold mb-3" style="color: #212121 !important;">{{ __('main.last_news') }}</h2>
            @include("widgets.jumbotron")
        </div>
    </div>

    @if(count($vlogs) > 0)
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-10">
            <h2 class="rubikFontbold mb-3">{{ __('main.vlogs') }}</h2>
            <div class="row">
                @foreach($vlogs as $item)
                <div class="col-md-6 mb-3">
                    @include("widgets.card")
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if(count($cursos) > 0)
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-10">
            <h2 class="rubikFontbold mb-3">{{ __('main.courses') }}</h2>
            <div class="row">
                @foreach($cursos as $item)
                <div class="col-md-6 mb-3">
                    @include("widgets.card")
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if(count($gameplays) > 0)
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-10">
            <h2 class="rubikFontbold mb-3">{{ __('main.videogames') }}</h2>
            <div class="row">
                @foreach($gameplays as $item)
                <div class="col-md-6 mb-3">
                    @include("widgets.card")
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
@endsection