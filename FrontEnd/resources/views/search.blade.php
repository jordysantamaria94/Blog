@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-8">
            <h2 class="mb-3">
                Resultados de: 
                <span class="rubikFontSemibold">
                    {{ $search }}
                </span>
            </h2>
            <div class="row">
                @foreach($results as $item)
                <div class="col-md-6 mb-3">
                    @include("widgets.card")
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection