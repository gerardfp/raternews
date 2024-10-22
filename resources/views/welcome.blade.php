@include('topbar')

<ul>
    @foreach ($noticias as $noticia)
        <li style="list-style-type: none">
            <form method=POST action="/vote/{{ $noticia->id }}" style="margin: 0; display: inline">
                @csrf
                <a href="" onclick="event.preventDefault(); this.closest('form').submit();" style="width: 16px">&#9650;</a>
            </form>
            <a href="{{ $noticia->enlace }}">{{ $noticia->titulo }}</a>
            <p style="padding-left: 16px">{{ count($noticia->votos) }} votes by {{ $noticia->user->name }} 2 hours ago | 
                <a href="/noticia/{{$noticia->id}}">0 comments</a>
            </p>
        </li>
    @endforeach

    @if ($noticias->hasMorePages()) 
        <a href="{{ $noticias->nextPageUrl() }}" rel="next">More</a> 
    @endif
</ul>