@extends('layouts.app')

@section('content')

<div class="grid grid-cols-12">
    <div class="col-start-1 col-span-12 lg:col-start-3 lg:col-span-4 p-10">
        <img src="/images/logo/jordy-santamaria.jpg" class="w-full h-auto rounded-2xl" alt="Jordy Santamaria">
    </div>
    <div class="col-start-1 col-span-12 lg:col-start-7 lg:col-span-5 p-10">
        <h2 class="text-4xl font-black pb-6">¿Quien soy?</h2>
        <p class="text-lg">
            Hola! soy Jordy Santamaria y soy Ingeniero en Sistemas, antes de comenzar esta carrera, aprendía programación en el
            bachillerato y era mi única materia favorita, hasta que mi Padre me comento de que existía la carrera de programación,
            gracias a esto he podido estudiar algo que en el bachillerato era un pequeño hobbie y una pasión.
        </p>

        <p class="text-lg">
            Soy una persona que se divierte haciendo lo que le apasiona y claro, uno de los objetivos de estos proyectos es compartir mis
            conocimientos a pesar de la corta experiencia que tengo.
        </p>

        <h2 class="text-4xl font-black pt-6 pb-6">Mi Trayectoria</h2>

        @include("widgets.accordion-aboutme")

        <h2 class="text-4xl font-black pt-6 pb-6">Mis Proyectos Personales</h2>

        <div class="row">
            <div class="col-3">
                <h5 class="text-3xl font-bold pb-6">Sitios Web</h5>
                <ul class="text-lg">
                    <li>
                        <a href="http://jordysantamaria.com/" class="text-blue-400">Jordy Santamaria</a>
                    </li>
                    <li>
                        <a href="http://geekfeel.com/" class="text-blue-400">GeekFeel</a>
                    </li>
                </ul>
            </div>
            <div class="col-3">
                <h5 class="text-3xl font-bold pt-6 pb-6">YouTube</h5>
                <ul class="text-lg">
                    <li>
                        <a href="https://www.youtube.com/channel/UC_p1gmS5BlOwDnHdcABfQUA" class="text-blue-400">Jordy Santamaria</a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCTsLeaLswGmKzGG4Ps_GHIg" class="text-blue-400">JSGames</a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCgCq9Ke9McGXOqWs38pfVEA" class="text-blue-400">JSCode</a>
                    </li>
                </ul>
            </div>
            <div class="col-3">
                <h5 class="text-3xl font-bold pt-6 pb-6">Twitch</h5>
                <ul class="text-lg">
                    <li>
                        <a href="https://www.twitch.tv/jsgames18" class="text-blue-400">JSGames</a>
                    </li>
                </ul>
            </div>
            <div class="col-3">
                <h5 class="text-3xl font-bold pt-6 pb-6">Udemy</h5>
                <ul class="text-lg">
                    <li>
                        <a href="https://www.udemy.com/user/jordy-santamaria/" class="text-blue-400">Jordy Santamaria</a>
                    </li>
                </ul>
            </div>
        </div>

        <h2 class="text-4xl font-black pt-6 pb-6">Certificados</h2>

        <div class="row">
            <div class="col-4">
                <ul class="text-lg">
                    <li class="font-bold">
                        Laravel - <a href="https://www.jordysantamaria.com/certificados/Certificado_Laravel.pdf" class="text-blue-400">Certificado</a>
                    </li>
                    <li class="font-bold">
                        Swift XCode- <a href="https://www.jordysantamaria.com/certificados/Certificado_iOS.pdf" class="text-blue-400">Certificado</a>
                    </li>
                </ul>
            </div>
            <div class="col-4">
                <ul class="text-lg">
                    <li class="font-bold">
                        Android - <a href="https://www.jordysantamaria.com/certificados/Certificado_Android.pdf" class="text-blue-400">Certificado</a>
                    </li>
                    <li class="font-bold">
                        Vue JS - <a href="https://www.jordysantamaria.com/certificados/Certificado_VueJS.pdf" class="text-blue-400">Certificado</a>
                    </li>
                </ul>
            </div>
            <div class="col-4">
                <ul class="text-lg">
                    <li class="font-bold">
                        SEO - <a href="https://www.jordysantamaria.com/certificados/Certificado_SEO.pdf" class="text-blue-400">Certificado</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
