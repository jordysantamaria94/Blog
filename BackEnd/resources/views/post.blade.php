@extends('layouts.app')

@section('content')
<div class="grid grid-cols-6 md:mt-10 gap-2">
    <div class="bg-white w-full rounded-2xl col-start-1 col-span-6 md:col-start-2 md:col-span-4 lg:col-start-2 lg:col-span-3 p-10">
        <h1 class="font-black text-2xl text-center  md:text-5xl">{{ $detail->titulo }}</h1>
        <div class="mt-8">
            <img src="https://api.jordysantamaria.com/images/posts/{{ $detail->id }}.jpg" class="w-full md:rounded-lg text-center" alt="{{ $detail->titulo }}">
            <p class="mt-4 text-xs">Escrita el: {{ date('D, d-M-Y', strtotime($detail->created_at)) }}</p>
        </div>
        <div class="font-light text-xl mt-8">
            {!! $detail->descripcion !!}
        </div>
    </div>
    <div class="flex hidden col-start-5 col-span-1 md:col-start-5 md:col-span-1 lg:block">
        <div class="bg-white w-full rounded-2xl space-x-1 p-4">
            <h2 class="font-black text-xl mb-3">Temas</h2>
            @foreach(json_decode($detail->etiquetas) as $item)
                <div class="bg-gray-800 rounded-full p-1 m-1 inline-block">
                    <span class="font-black text-xs text-white">{{ $item }}</span>
                </div>
            @endforeach
        </div>
        <div class="bg-white w-full rounded-2xl mt-4 p-4">
            <h2 class="font-black text-xl my-3">Te recomiendo...</h2>
            @foreach($recommendationsCategory as $item)
                <div class="flex hidden grid grid-cols-2 bg-gray-100 rounded mt-4 lg:block">
                    <a href="/post/{{ $item->id }}/{{ $item->url }}">
                        <img src="https://api.jordysantamaria.com/images/posts/{{ $item->id }}.jpg" alt="{{ $item->titulo }}" class="w-full rounded-t-lg" />
                        <div class="p-5">
                            <h2 class="flex-auto text-xl font-bold mb-2">
                                {{ \Illuminate\Support\Str::limit($item->titulo, 25, $end='...') }}
                            </h2>
                            <p class="text-sm text-gray-500">
                                {{ \Illuminate\Support\Str::limit($item->breve_descripcion, 35, $end='...') }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="grid grid-cols-6 mt-3">
    <div class="col-start-2 col-span-4 lg:col-start-2 lg:col-span-3">
        <h2 class="font-black text-3xl my-3">Tenemos más articulos</h2>
        <div class="lg:grid lg:grid-cols-3 lg:gap-4 gap-y-4">
            @foreach($recommendations as $item)
                @include("widgets.card")
            @endforeach
        </div>
    </div>
</div>
@endsection
