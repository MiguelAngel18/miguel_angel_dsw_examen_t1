<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo mensaje</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <h3>{{session('success')}}</h3>
    @if ($errors->any())
    <div style="color: red;">
        <lo>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </lo>
    </div>
    @endif
    <h1 id="title_form"><strong>Nuevo Mensaje</strong></h1>
    <form id="formulario" action="/messages/save" method="post">
        @csrf <!-- Token de seguridad -->
        <label for="text"><h3>Texto:</h3></label>
        <input type="text" id="text" name="text" placeholder="Introduce un texto">
        <br>
        <br>

        <input type="text" id="img" name="img" alt="img">
        <br>
        <br>
        <button>Mandar formulario</button>
        <br>
    </form>
    <br>
    <button><a href="{{ route('show') }}" id="new">Mensajes</a></button>
    </div>
</body>
</html>