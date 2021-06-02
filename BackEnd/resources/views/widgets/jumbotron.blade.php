<div class="grid grid-cols-2 mb-4 bg-gray-700 p-10 block sm:hidden">
    <a href="/post/{{ $last->id }}/{{ $last->url }}" class="grid grid-cols-1 col-span-2 bg-gray-600 rounded-xl">
        <img src="https://api.jordysantamaria.com/images/posts/{{ $last->id }}.jpg" class="w-full h-auto rounded-t-xl" alt="{{ $last->titulo }}">
        <div class="p-5">
            <p class="text-white font-black text-base text-gray-700 sm:text-xs md:text-sm lg:text-base">ULTIMA NOTICIA</p>
            <p class="text-white font-black text-3xl pt-2 sm:text-xs md:text-base lg:text-2xl xl:text-4xl 2xl:text-5xl">{{ $last->titulo }}</p>
        </div>
    </a>
</div>
<div class="grid grid-cols-6 mb-4 bg-gray-700 p-10 hidden sm:block">
    <a href="/post/{{ $last->id }}/{{ $last->url }}" class="grid grid-cols-4 bg-gray-600 col-start-2 col-span-4 rounded-xl">
        <img src="https://api.jordysantamaria.com/images/posts/{{ $last->id }}.jpg" class="w-full h-auto rounded-l-xl col-start-1 col-span-3" alt="{{ $last->titulo }}">
        <div class="col-start-4 p-5">
            <p class="text-white font-black text-base text-gray-700 sm:text-xs md:text-sm lg:text-base">ULTIMA NOTICIA</p>
            <p class="text-white font-black text-3xl pt-2 sm:text-xs md:text-base lg:text-2xl xl:text-4xl 2xl:text-5xl">{{ $last->titulo }}</p>
        </div>
    </a>
</div>