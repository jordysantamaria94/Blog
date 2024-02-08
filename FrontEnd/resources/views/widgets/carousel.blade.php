<div id="carouselExampleDark" class="carousel slide mt-4" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($posts as $slide)
            @if ($loop->index == 0)
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $loop->index }}" class="active"></li>
            @else
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $loop->index }}"></li>
            @endif
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($posts as $new)
            @if ($loop->index == 0)
                <div class="carousel-item active" data-bs-interval="2000">
            @else
                <div class="carousel-item" data-bs-interval="2000">
            @endif
                <a href="/post/{{ $new->id }}/{{ $new->url }}">
                    <img src="{{ urlAPI() }}images/posts/{{ $new->id }}.jpg" class="d-block w-100" alt="{{ $new->titulo }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="title fExtraBold">{{ $new->titulo }}</h2>
                        <p class="description fBold">{{ $new->breve_descripcion }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </a>
</div>