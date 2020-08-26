<div class="slider">
    <ul class="slides">
        @foreach($slides as $slide)
        <li onclick="window.location='{{ $slide->link }}'">
            <img src="{{ asset($slide->imagem) }}" alt="{{ $slide->titulo }}">
            <div class="caption center-align">
                <h3>{{ $slide->titulo }}</h3>
                <h5>{{ $slide->descricao }}</h5>
                @if($slide->link != null)
                <a href="{{ $slide->link }}" class="btn btn-large blue">mais...</a>
                @endif
            </div>
        </li>
        @endforeach
    </ul>
</div>