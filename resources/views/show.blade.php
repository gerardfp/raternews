@include('topbar')

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

<p>{{ $noticia->cuerpo }}</p>

<br>

<form method=POST action="/comment/{{ $noticia->id }}">
    @csrf
    <textarea name="text" rows="8" cols="80" wrap="virtual"></textarea>
    <br>
    <br>
    <input type="submit" value="añadir comentario" />
</form>


@foreach ($noticia->comentarios as $comentario)
    <p style="font-size: small; color: gray;">&#9650; {{$comentario->user->name}} {{ strtotime($comentario->created_at) }}
    <p style="padding-left: 16px">{{$comentario->text}}
@endforeach