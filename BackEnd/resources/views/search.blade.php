@extends('layouts.app')

@section('content')
    <div class="p-3 md:pl-16 md:pr-16 lg:px-16 xl:px-16">
        <div class="pb-3 pl-3 my-5">
            <h2 class="font-black text-5xl text-gray-900">Resultados de: {{ $search }}</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
            <div class="grid grid-cols-1 col-span-2 sm:grid-cols-2 sm:col-span-1 md:grid-cols-3 md:col-span-2 gap-4 mb-3">
                @foreach($results as $item)
                    @include("widgets.card")
                @endforeach
            </div>
        </div>
    </div>
@endsection
