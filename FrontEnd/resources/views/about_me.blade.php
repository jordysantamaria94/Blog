@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <img src="/images/logo/jordy-santamaria.jpg" class="img-fluid" alt="Jordy Santamaria" style="border-radius: 15px !important;">
        </div>
        <div class="col-md-8">
            <h2 class="rubikFontBold">¿Quien soy?</h2>
            <p class="mt-3 mb-4" style="font-size: 20px !important;">
                Hola! soy Jordy Santamaria y soy Ingeniero en Sistemas, antes de comenzar esta carrera, aprendía programación en el
                bachillerato y era mi única materia favorita, hasta que mi Padre me comento de que existía la carrera de programación,
                gracias a esto he podido estudiar algo que en el bachillerato era un pequeño hobbie y una pasión.
            </p>
            <p style="font-size: 20px !important;">
                Soy una persona que se divierte haciendo lo que le apasiona y claro, uno de los objetivos de estos proyectos es compartir mis
                conocimientos a pesar de la corta experiencia que tengo.
            </p>
            <h2 class=" mt-3 rubikFontBold">Mi Trayectoria</h2>
            <div class="row">
                @include("widgets.accordion-aboutme")
            </div>
            <h2 class=" mt-3 rubikFontBold">Mis proyectos personales</h2>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="bg-white" style="border-radius: 5px !important;">
                        <div class="p-5">
                            <h5 class="rubikFontBold">Sitios Web</h5>
                            <ul class="list-disc list-inside">
                                <li>
                                    <a href="http://jordysantamaria.com/" class="text-blue-400">Jordy Santamaria</a>
                                </li>
                                <li>
                                    <a href="http://geekfeel.com/" class="text-blue-400">GeekFeel</a>
                                </li>
                            </ul>
                            <h5 class="rubikFontBold">YouTube</h5>
                            <ul class="list-disc list-inside">
                                <li>
                                    <a href="https://www.youtube.com/channel/UC_p1gmS5BlOwDnHdcABfQUA" class="text-blue-400">Jordy Santamaria</a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCTsLeaLswGmKzGG4Ps_GHIg" class="text-blue-400">Balbarog</a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCgCq9Ke9McGXOqWs38pfVEA" class="text-blue-400">Debuggers</a>
                                </li>
                            </ul>
                            <h5 class="rubikFontBold">Twitch</h5>
                            <ul class="list-disc list-inside">
                                <li>
                                    <a href="https://www.twitch.tv/jsgames18" class="text-blue-400">Balbarog</a>
                                </li>
                            </ul>
                            <h5 class="rubikFontBold">Udemy</h5>
                            <ul class="list-disc list-inside">
                                <li>
                                    <a href="https://www.udemy.com/user/jordy-santamaria/" class="text-blue-400">Jordy Santamaria</a>
                                </li>
                            </ul>
                            <h5 class="rubikFontBold">Certificados</h5>
                            <ul class="text-lg">
                                <li class="font-bold">
                                    Laravel - <a href="https://www.jordysantamaria.com/certificados/Certificado_Laravel.pdf" class="text-blue-400">Certificado</a>
                                </li>
                                <li class="font-bold">
                                    Swift XCode- <a href="https://www.jordysantamaria.com/certificados/Certificado_iOS.pdf" class="text-blue-400">Certificado</a>
                                </li>
                                <li class="font-bold">
                                    Android - <a href="https://www.jordysantamaria.com/certificados/Certificado_Android.pdf" class="text-blue-400">Certificado</a>
                                </li>
                                <li class="font-bold">
                                    Vue JS - <a href="https://www.jordysantamaria.com/certificados/Certificado_VueJS.pdf" class="text-blue-400">Certificado</a>
                                </li>
                                <li class="font-bold">
                                    SEO - <a href="https://www.jordysantamaria.com/certificados/Certificado_SEO.pdf" class="text-blue-400">Certificado</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection