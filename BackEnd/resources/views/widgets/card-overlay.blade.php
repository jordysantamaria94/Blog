<div class="card card-overlay bg-dark text-white">
    <a href="/post/{{ $item->id }}/{{ $item->url }}">
        <img src="/images/posts/{{ $item->id }}.jpg" class="card-img" alt="{{ $item->titulo }}">
        <div class="card-img-overlay">
            <h2 class="card-title fExtraBold">{{ $item->titulo }}</h2>
            <p class="card-text fBold">{{ $item->breve_descripcion }}</p>
        </div>
    </a>
</div>