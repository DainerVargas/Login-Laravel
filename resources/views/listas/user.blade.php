<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista Usuarios</title>
</head>

<body>
    @vite('resources/css/app.css')

    <div class="tabla">
        <header class="headerlist ">
            <h1>Lista Usuarios</h1>
            <form class="listform" action="{{route('buscar')}}" method="GET">
                @csrf
                <input type="text" name="name" placeholder="Buscar...">
                <input type="submit" class="buscar" value="Buscar">
             </form>
            <div class="botons">
                <a href="{{ route('search') }}">Buscar Registro</a>
                <a href="{{ route('logut') }}">Cerrar sesion</a>
            </div>
        </header>

        <table border="1px" width="100%">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Trabajo</th>
                <th>Informacion</th>
            </tr>
            @foreach ($user as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td><img src="{{ asset('images/' . $item->foto) }}" width="180px" height="100px" alt="">
                    </td>
                    <td>{{ $item->work->name }}</td>
                    <th><a href="{{ route('informacion', $item) }}">Informacion</a></th>
                </tr>
            @endforeach

        </table>
    </div>
</body>

</html>
