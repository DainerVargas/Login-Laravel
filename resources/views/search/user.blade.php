<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @vite('resources/css/app.css')
     <form class="search" action="{{route('buscar')}}" method="GET">
        @csrf
        <h1>Buscar Registro</h1><a href="{{route('lista')}}"><img height="40px" src="/images/hacia-atras.png" alt=""></a>
        <input class="nombre" type="text" name="name" placeholder="Usuario">
        @error('name')
            <small>*{{$message}}</small>
        @enderror
        <input class="buscar" type="submit" value="Buscar"><br>
     </form>
    
     <table border="1px" width="100%">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Trabajo</th>
        </tr>
       {{--  {{$resultado ?? "no se esta pasando"}} --}}
        @foreach (($resultado ?? []) as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td><img src="{{ asset('images/' . $item->foto) }}" width="180px" height="100px" alt=""></td>
                <td>{{ $item->work->name }}</td>
            </tr>
        @endforeach

    </table>

</body>
</html>