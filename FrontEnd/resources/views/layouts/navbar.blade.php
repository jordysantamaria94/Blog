<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #000051 !important; padding: 20px;">
    <div class="container">
        <a class="navbar-brand" href="/" style="width: 3% !important;">
            <img class="img-fluid" src="{{asset('/images/logo/JS.png')}}" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link rubikFontSemibold" href="/categoria/cursos" style="color: white !important;">{{ __('navbar.courses') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rubikFontSemibold" href="/categoria/gameplay" style="color: white !important;">{{ __('navbar.gameplay') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rubikFontSemibold" href="/categoria/vlogs" style="color: white !important;">{{ __('navbar.vlogs') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rubikFontSemibold" href="/contactame" style="color: white !important;">{{ __('navbar.about_me') }}</a>
                </li>
            </ul>
            <form class="d-flex" action="{{ route('search') }}">
                <input class="form-control me-2" type="search" name="search" placeholder="{{ __('navbar.search') }}" required style="border-radius: 26px; background: #eeeeee; border: 0px !important;">
                <button class="btn btn-outline-success" type="submit" style="display: none;">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</nav>