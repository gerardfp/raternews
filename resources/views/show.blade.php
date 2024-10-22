@include('topbar')

<form method=POST action="/vote/{{ $noticia->id }}" style="margin: 0; display: inline">
    @csrf
    <a href="" onclick="event.preventDefault(); this.closest('form').submit();" style="width: 16px">&#9650;</a>
</form>
<a href="{{ $noticia->enlace }}">{{ $noticia->titulo }}</a>
<p style="padding-left: 16px">{{ count($noticia->votos) }} votes by {{ $noticia->user->name }} 2 hours ago | 
    <a href="/noticia/{{$noticia->id}}">0 comments</a>
</p>

<p> {{ $noticia->cuerpo }} </p>

<br>
<form method=POST acction="/comment">
<textarea name="text" rows="8" cols="80" wrap="virtual"></textarea>
<br>
<br>
<input type="submit" value="añadir comentario" />
</form>