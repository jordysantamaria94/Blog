<a href="/post/{{ $last->id }}/{{ $last->url }}" style="text-decoration: none !important;">
    <div class="row" style="background-color: white !important; border-radius: 5px;">
        <div class="col-md-6 p-0">
            <img src="https://api.jordysantamaria.com/images/posts/{{ $last->id }}.jpg" class="img-fluid" alt="{{ $last->titulo }}" style="border-radius: 10px 0px 0px 10px !important;">
        </div>
        <div class="col-md-6 p-4">
            <h6 class="mb-3" style="color: #e53935 !important;">{{ __('main.breaking_new') }}</h6>
            <h2 class="rubikFontBold" style="color: #212121 !important;">{{ $last->titulo }}</h2>
        </div>
    </div>
</a>