<ul>
@foreach ($noticias as $item)
    <li>
        <a href="{{ $item->enlace }}">{{ $item->titulo }}</a>
        <p>{{ $item->cuerpo }}</p>
        <p>{{ $item->user->name }}</p>
    </li>
@endforeach
</ul>