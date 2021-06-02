<div class="bg-white w-full rounded-2xl hover:shadow">
    <a href="/post/{{ $item->id }}/{{ $item->url }}">
        <img src="https://api.jordysantamaria.com/images/posts/{{ $item->id }}.jpg" class="max-w-full h-auto rounded-tl-2xl rounded-tr-2xl" alt="{{ $item->titulo }}">
        <div class="p-5">
            <h4 class="text-2xl font-black">{{ \Illuminate\Support\Str::limit($item->titulo, 25, $end='...') }}</h4>
            <p class="text-3x1 leading-snug pt-3">{{ \Illuminate\Support\Str::limit($item->breve_descripcion, 75, $end='...') }}</p>
        </div>
    </a>
</div>
