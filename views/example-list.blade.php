<h1>Listado</h1>

<ul>
    @foreach ($examples as $example)
    <li>{{$example->todo}}</li>
    @endforeach
</ul>
