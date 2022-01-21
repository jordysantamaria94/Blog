<a href="/post/{{ $item->id }}/{{ $item->url }}" style="text-decoration: none !important;">
    <div class="card" style="background-color: white !important; border-radius: 5px !important; border-color: white !important;">
        <img src="https://api.jordysantamaria.com/images/posts/{{ $item->id }}.jpg" class="card-img-top" alt="{{ $item->titulo }}">
        <div class="card-body">
            <h5 class="card-title rubikFontBold" style="color: #212121 !important;">{{ \Illuminate\Support\Str::limit($item->titulo, 25, $end='...') }}</h5>
            <p class="card-text">{{ \Illuminate\Support\Str::limit($item->breve_descripcion, 70, $end='...') }}</p>
        </div>
    </div>
</a>