<a href="/post/{{ $item->id }}/{{ $item->url }}" style="text-decoration: none !important;">
    <div class="card"
        style="background-color: white !important; 
        border-radius: 16px !important; 
        border-color: white !important;">
        <img src="{{ urlAPI() }}images/posts/{{ $item->id }}.jpg" class="card-img-top"
            style="border-radius: 16px 16px 0px 0px !important;" alt="{{ $item->titulo }}">
        <div class="card-body" style="padding: 25px 25px 25px 25px !important;">
            <span style="color: #6e6e73 !important;">NUEVO</span>
            <h4 class="card-title rubikFontSemibold"
                style="margin-top: 10px !important; margin-bottom: 10px !important; color: #212121 !important;">
                {{ $item->titulo }}</h4>
            <span style="color: #6e6e73 !important;">{{ formatDateCard($item->created_at) }}</span>
        </div>
    </div>
</a>
