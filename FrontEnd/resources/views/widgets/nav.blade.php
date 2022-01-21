<ul class="nav mb-4">
    <li class="nav-item">
        <a class="nav-link-item active fBold" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
            Cursos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link-item fBold" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
            Gameplays
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link-item fBold" id="vlogs-tab" data-bs-toggle="tab" data-bs-target="#vlogs" type="button" role="tab" aria-controls="vlogs" aria-selected="false">
            Vlogs
        </a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
            @foreach($cursos as $item)
                @if ($loop->index == 0)
                    <div class="col-12">
                        @include("widgets.card-overlay")
                    </div>
                @else
                    <div class="flex space-x-4">
                        @include("widgets.card")
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
            @foreach($gameplays as $item)
                @if ($loop->index == 0)
                    <div class="col-12">
                        @include("widgets.card-overlay")
                    </div>
                @else
                    <div class="grid grid-cols-3">
                        @include("widgets.card")
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="tab-pane fade" id="vlogs" role="tabpanel" aria-labelledby="vlogs-tab">
        <div class="row">
            @foreach($vlogs as $item)
                @if ($loop->index == 0)
                    <div class="col-12">
                        @include("widgets.card-overlay")
                    </div>
                @else
                    <div class="grid grid-cols-3">
                        @include("widgets.card")
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
