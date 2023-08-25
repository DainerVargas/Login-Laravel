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

    <header id="info" class="headerlist">
        <div class="user-cerrar">
            <div class="user">
                <h2>{{$user->name}}</h2>
                <img src="{{asset('images/'. $user->foto)}}" height="60px" width="60px" alt="">
            </div>
        </div>
        <div class="atras-logo">
            <form class="eliminar" action="{{route('destroy', $user)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Eliminar registro">
            </form> 
            <a class="upadate" href="{{route('actualizar', $user)}}">Actualizar</a>
            <a href="{{ route('logut') }}">Cerrar sesion</a> 
        </div>
    </header>
    <section class="section">
        <div class="nombre">
            <h1>Nombre</h1>
            <h2>{{$user->name}}</h2>
        </div>
        <div class="email">
            <h1>Email</h1>
            <h2>{{$user->email}}</h2>
        </div>
        <div class="foto">
            <h1>Imagen</h1>
            <img src="{{asset('images/'. $user->foto)}}" height="120px" alt="">
        </div>
        <div class="work">
            <h1>Trabajo</h1>
            <h2>{{$user->work->name}}</h2>
        </div>
    </section>

</body>
</html>