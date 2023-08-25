<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina principal</title>
</head>

<body>
    <div class="inicio">
    @vite('resources/css/app.css')
    <header>
        <h1>LOGO</h1>
        <input type="text" placeholder="Buscar..." name="search">
        <div class="sing-in">
            <a href="{{ route('create') }}">REGISTRATE</a>
            <a href="{{route('inicioSesion')}}">INICIAR SESION</a>
        </div>
    </header>
</div>
</body>

</html>
