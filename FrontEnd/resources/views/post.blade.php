@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row" style="background-color: white !important; border-color: white !important;">
        <div class="row d-flex justify-content-center">

            <div class="col-md-8 p-5">
                <h1 class="rubikFontExtrabold display-2 text-center mb-3">{{ $detail->titulo }}</h1>
            </div>

            <div class="col-md-5">
                <img src="https://api.jordysantamaria.com/images/posts/{{ $detail->id }}.jpg" class="img-fluid" alt="{{ $detail->titulo }}" style="border-radius: 15px !important;">
                <p class="mt-4 rubikFontSemibold">Escrita el: {{ date('D, d-M-Y', strtotime($detail->created_at)) }}</p>
                <div class="mt-3" style="font-size: 25px !important;">
                    {!! $detail->descripcion !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <h2 class="rubikFontExtrabold">{{ __('main.tags') }}</h2>
                @foreach(json_decode($detail->etiquetas) as $item)
                <span class="badge bg-primary" style="padding: 10px !important; border-radius: 25px !important; font-size: 14px !important;">{{ $item }}</span>
                @endforeach
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <h2 class="rubikFontExtrabold mb-3">{{ __('main.i_recommend') }}</h2>
                <div class="row">
                    @foreach($recommendationsCategory as $item)
                    <div class="col-md-6 mb-3">
                        @include("widgets.card")
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <h2 class="rubikFontExtrabold mb-3">{{ __('main.maybe_u_are_int') }}</h2>
                <div class="row">
                    @foreach($recommendations as $item)
                    <div class="col-md-4 mb-3">
                        @include("widgets.card")
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection