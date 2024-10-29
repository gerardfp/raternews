@include('topbar')

<ul>
    @foreach ($noticias as $noticia)
        <li style="list-style-type: none">
            <form method=POST action="/vote/{{ $noticia->id }}" style="margin: 0; display: inline">
                @csrf
                <a href="" onclick="event.preventDefault(); this.closest('form').submit();" style="width: 16px">&#9650;</a>
            </form>
            
            <a href="{{ $noticia->enlace }}">{{ $noticia->titulo }}</a>
            
            <p style="padding-left: 16px; font-size: small; color: gray">
                {{ count($noticia->votos) }} votes 
                by {{ $noticia->user->name }} {{ $noticia->created_at }} 
                | <a href="/noticia/{{$noticia->id}}">{{ count($noticia->comentarios) }} comments</a>
            </p>
        </li>
    @endforeach

    @if ($noticias->hasMorePages()) 
        <a href="{{ $noticias->nextPageUrl() }}" rel="next">More</a> 
    @endif
</ul>