<a href="/post/{{ $last->id }}/{{ $last->url }}" style="text-decoration: none !important;">
    <div class="row jumbotron-row" style="background-color: white !important;">
        <div class="col-md-8 p-0 jumbotron-image"
            style="background-image: url('{{ urlAPI() }}images/posts/{{ $last->id }}.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
        </div>
        <div class="col-md-4 p-4">
            <h6 class="mb-3" style="color: #e53935 !important;">{{ __('main.breaking_new') }}</h6>
            <h2 class="rubikFontSemibold" style="color: #212121 !important;">{{ $last->titulo }}</h2>
            <p>{{ formatDateCard($last->created_at) }}</p>
        </div>
    </div>
</a>

<style>
    @media (max-width: 767px) {
        .jumbotron-image {
            height: 350px !important;
            border-radius: 16px 16px 0px 0px !important;
        }

        .jumbotron-row {
            margin-left: 10px !important;
            margin-right: 10px !important;
            border-radius: 0px 0px 16px 16px !important;

        }
    }

    @media (min-width: 768px) {
        .jumbotron-image {
            height: 400px !important;
            border-radius: 16px 0px 0px 16px !important;
        }

        .jumbotron-row {
            border-radius: 0px 16px 16px 0px !important;
        }
    }
</style>
