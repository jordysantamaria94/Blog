@extends('layouts.app')

@section('content')
<div class="container-fluid mb-4">
    <div class="row mt-3">
        <div class="col-4">
            <img src="/images/logo/jordy-santamaria.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-8 p-5 panel-info">
            <h2 class="display-3 mb-5 fExtraBold">¿Quien soy?</h2>
            <p class="text">
                Hola! soy Jordy Santamaria y soy Ingeniero en Sistemas, antes de comenzar esta carrera, aprendía programación en el
                bachillerato y era mi única materia favorita, hasta que mi Padre me comento de que existía la carrera de programación,
                gracias a esto he podido estudiar algo que en el bachillerato era un pequeño hobbie y una pasión.
            </p>

            <p class="text">
                Soy una persona que se divierte haciendo lo que le apasiona y claro, uno de los objetivos de estos proyectos es compartir mis
                conocimientos a pesar de la corta experiencia que tengo.
            </p>

            <h2 class="display-4 mt-5 mb-5 fExtraBold">Mi Trayectoria</h2>

            @include("widgets.accordion-aboutme")

            <h2 class="display-4 mt-5 mb-5 fExtraBold">Mis Proyectos Personales</h2>

            <div class="row">
                <div class="col-3">
                    <h5 class="text fExtraBold">Sitios Web</h5>
                    <ul class="text fBold">
                        <li>
                            <a href="http://jordysantamaria.com/">Jordy Santamaria</a>
                        </li>
                        <li>
                            <a href="http://geekfeel.com/">GeekFeel</a>
                        </li>
                    </ul>
                </div>
                <div class="col-3">
                    <h5 class="text fExtraBold">YouTube</h5>
                    <ul class="text fBold">
                        <li>
                            <a href="https://www.youtube.com/channel/UC_p1gmS5BlOwDnHdcABfQUA">Jordy Santamaria</a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCTsLeaLswGmKzGG4Ps_GHIg">JSGames</a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCgCq9Ke9McGXOqWs38pfVEA">JSCode</a>
                        </li>
                    </ul>
                </div>
                <div class="col-3">
                    <h5 class="text fExtraBold">Twitch</h5>
                    <ul class="text fBold">
                        <li>
                            <a href="https://www.twitch.tv/jsgames18">JSGames</a>
                        </li>
                    </ul>
                </div>
                <div class="col-3">
                    <h5 class="text fExtraBold">Udemy</h5>
                    <ul class="text fBold">
                        <li>
                            <a href="https://www.udemy.com/user/jordy-santamaria/">Jordy Santamaria</a>
                        </li>
                    </ul>
                </div>
            </div>

            <h2 class="display-4 mt-5 mb-5 fExtraBold">Certificados</h2>

            <div class="row">
                <div class="col-4">
                    <ul class="text fBold">
                        <li>
                            Laravel - <a href="https://www.jordysantamaria.com/certificados/Certificado_Laravel.pdf">Certificado</a>
                        </li>
                        <li>
                            Swift XCode- <a href="https://www.jordysantamaria.com/certificados/Certificado_iOS.pdf">Certificado</a>
                        </li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="text fBold">
                        <li>
                            Android - <a href="https://www.jordysantamaria.com/certificados/Certificado_Android.pdf">Certificado</a>
                        </li>
                        <li>
                            Vue JS - <a href="https://www.jordysantamaria.com/certificados/Certificado_VueJS.pdf">Certificado</a>
                        </li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="text fBold">
                        <li>
                            SEO - <a href="https://www.jordysantamaria.com/certificados/Certificado_SEO.pdf">Certificado</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
