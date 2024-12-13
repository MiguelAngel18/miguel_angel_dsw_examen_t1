<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Prueba superada</h1>
        @if($messages->isEmpty())
            <p>No hay mensajes en la base de datos</p>
        @else
            <select multiple>
                @foreach($messages as $message)
                    <option style="border: 1px solid black; padding: 10px; display:flex; flex-direction:row; justify-content:left; align-items: baseline;"><p>{{ $message->text }}</p><img src="/IMG/{{ $message->img }}"></option>
                @endforeach
            </select>
        @endif
    </div>
    <button><a href="{{ route('create') }}" id="new">Nuevo Mensaje</a></button>
    <br>
</body>
</html>