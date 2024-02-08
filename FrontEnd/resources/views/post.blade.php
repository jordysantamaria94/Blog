@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row" style="background-color: white !important; border-color: white !important;">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 pt-5 pb-3">
                    <p>Actualización: {{ formatDateCard($detail->created_at) }}</p>
                    <h1 class="rubikFontSemibold text-left">{{ $detail->titulo }}</h1>
                    <p style="font-size: 20px !important;">{{ $detail->breve_descripcion }}</p>
                    <p style="font-size: 18px !important;">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlBase() }}post/{{ $detail->id }}/{{ $detail->url }}"
                            target="_blank" style="margin-right: 10px !important;"><i class="fa-brands fa-facebook"></i></a>
                        <a href="http://twitter.com/share?text={{ $detail->titulo }}&url={{ urlBase() }}post/{{ $detail->id }}/{{ $detail->url }}&hashtags={{ json_decode(str_replace(' ', '', $detail->etiquetas))[0] }}"
                            target="_blank" style="margin-right: 10px !important;"><i class="fa-brands fa-twitter"></i></a>
                        <a href="mailto:?subject={{ $detail->titulo }}&amp;body={{ $detail->breve_descripcion }} {{ urlBase() }}post/{{ $detail->id }}/{{ $detail->url }}"
                            title="{{ $detail->titulo }}" style="margin-right: 10px !important;"><i
                                class="fa-solid fa-envelope"></i></a>
                        <span onclick="copyClipboard()"><i class="fa-solid fa-link"></i></span>
                    </p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <img src="{{ urlBase() }}images/posts/{{ $detail->id }}.jpg"
                        class="img-fluid w-100" alt="{{ $detail->titulo }}" style="border-radius: 16px !important;">
                    <p class="text-center mt-3">{{ $detail->descripcion_foto }}</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="mt-3" style="font-size: 20px !important;">
                        {!! $detail->descripcion !!}
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center mt-4">
                <div class="col-md-5">
                    <h5 class="rubikFontSemibold mb-3">{{ __('main.share_post') }}</h5>
                    <p style="font-size: 18px !important;">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlBase() }}post/{{ $detail->id }}/{{ $detail->url }}"
                            target="_blank" style="margin-right: 10px !important;"><i class="fa-brands fa-facebook"></i></a>
                        <a href="http://twitter.com/share?text={{ $detail->titulo }}&url={{ urlBase() }}post/{{ $detail->id }}/{{ $detail->url }}&hashtags={{ json_decode(str_replace(' ', '', $detail->etiquetas))[0] }}"
                            target="_blank" style="margin-right: 10px !important;"><i class="fa-brands fa-twitter"></i></a>
                        <a href="mailto:?subject={{ $detail->titulo }}&amp;body={{ $detail->breve_descripcion }} {{ urlBase() }}post/{{ $detail->id }}/{{ $detail->url }}"
                            title="{{ $detail->titulo }}" style="margin-right: 10px !important;"><i
                                class="fa-solid fa-envelope"></i></a>
                        <span onclick="copyClipboard()"><i class="fa-solid fa-link"></i></span>
                    </p>
                </div>
            </div>

            @if (count($recommendationsCategory) > 0)
                <div class="row d-flex justify-content-center mt-4 mb-4">
                    <div class="col-md-5">
                        <h4 class="rubikFontSemibold mb-3">{{ __('main.i_recommend') }}</h4>
                        <div class="row">
                            @foreach ($recommendationsCategory as $item)
                                <div class="col-md-3">
                                    <img src="{{ urlBase() }}images/posts/{{ $item->id }}.jpg"
                                        class="img-fluid" alt="{{ $item->titulo }}" style="border-radius: 16px !important;">
                                </div>
                                <div class="col-md-9">
                                    <span style="color: #6e6e73 !important;">NUEVO</span>
                                    <h4 class="card-title rubikFontSemibold"
                                        style="margin-top: 10px !important; margin-bottom: 10px !important;">
                                        {{ $item->titulo }}</h4>
                                    <span style="color: #6e6e73 !important;">{{ formatDateCard($item->created_at) }}</span>
                                </div>
                                <hr class="mt-4 mb-4" />
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function copyClipboard() {
            var link = <?php echo "\"http://blog.jordysantamaria.com/post/$detail->id/$detail->url\""; ?>;
            navigator.clipboard.writeText(link);
            console.log(link);
        }
    </script>
@endsection
