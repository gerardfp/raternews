@foreach ($noticias as $item)
    <p>{{ $item->titulo }}</p>
    <p>{{ var_dump($item->usuario->name) }}
@endforeach