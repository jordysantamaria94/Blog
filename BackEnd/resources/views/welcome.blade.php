@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 mb-4 relative">
        <img src="/images/posts/{{ $last->id }}.jpg" class="w-full h-auto" alt="{{ $last->titulo }}">
        <div class="bg-black bg-opacity-50 absolute inset-x-0 bottom-0">
            <p class="font-black text-base sm:text-5xl md:text-5xl lg:text-6xl xl:text-7xl text-white px-4 pb-4 sm:px-6 sm:pt-6 md:px-8 md:pt-8 lg:px-10 lg:pt-10 xl:px-20 xl:pt-20">
                {{ $last->titulo }}
            </p>
            <div class="flex hidden px-4 py-4 sm:px-6 sm:pb-6 md:px-8 md:pb-8 lg:px-10 lg:pb-10 xl:px-20 xl:pb-20 lg:block lg:inline-flex">
                @foreach(json_decode($last->etiquetas) as $item)
                    <span class="font-black text-sm text-white bg-blue-700 rounded-full p-2 mx-1">{{ $item }}</span>
                @endforeach
            </div>
        </div>
    </div>
    <div class="p-3 md:pl-16 md:pr-16 lg:px-16 xl:px-16">
        <div class="pb-3 pl-3 my-5">
            <h2 class="font-black text-5xl text-gray-900">Cursos</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
            <div class="grid grid-cols-1 col-span-2 sm:grid-cols-2 sm:col-span-1 md:grid-cols-3 md:col-span-2 gap-4 mb-3">
                @foreach($cursos as $item)
                    @include("widgets.card")
                @endforeach
            </div>
            <div class="flex hidden lg:row-end-1 lg:col-end-4 lg:col-span-1 lg:block lg:inline-flex">
                @include('widgets.list-group')
            </div>
        </div>

        <div class="pb-3 pl-3 my-5">
            <h2 class="font-black text-5xl text-gray-900">Videojuegos</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
            <div class="grid grid-cols-1 col-span-2 sm:grid-cols-2 sm:col-span-1 md:grid-cols-3 md:col-span-2 gap-4 mb-3">
                @foreach($gameplays as $item)
                    @include("widgets.card")
                @endforeach
            </div>
        </div>

        <div class="pb-3 pl-3 my-5">
            <h2 class="font-black text-5xl text-gray-900">Vlogs</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
            <div class="grid grid-cols-1 col-span-2 sm:grid-cols-2 sm:col-span-1 md:grid-cols-3 md:col-span-2 gap-4 mb-3">
                @foreach($vlogs as $item)
                    @include("widgets.card")
                @endforeach
            </div>
        </div>
    </div>
@endsection
