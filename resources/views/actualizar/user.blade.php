<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Usuario</title>
</head>
<body>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <div class="formu">
        <form class="regis" action="{{route('updateUser',$user)}}" method="post" enctype="multipart/form-data">
            <h1>ACTUALIZAR</h1>
            @csrf
            @method('put')
            <img src="/images/{{$user->foto}}" height="80px" alt="">
            <input type="text" name="name" placeholder="Nombre" value="{{$user->name}}">
            @error('name')
                <small>*{{ $message }}</small>
            @enderror
            <br><br>
            <input type="text" name="email" placeholder="Email" value="{{$user->email}}">
            @error('email')
                <small>*{{ $message }}</small>
            @enderror
            <br><br>
            <input type="file" id="imagen" name="foto" placeholder="hola" accept="image/*" onchange="mostrarRuta()" >
            @error('foto')
                <small>*{{ $message }}</small>
            @enderror
            <br>
            <select name="work" id="select">
                <option value="{{$user->id}}" selecte hidden>Elije una opcion</option>
                @foreach ($works as $item)
                @if ($item->id == $user->work_id)
                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                @else
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endif
                    
                @endforeach
            </select>
            @error('work')
                <small>*{{$message}}</small>
            @enderror
            <br>
            <input type="password" id="pass" name="password" placeholder="Contraseña" value="{{old('password')}}">
            @error('password')
                <small>*{{ $message }}</small>
            @enderror
            <br>
            <div id="btns" class="botones">
                <a href="{{route('index')}}">Atras</a>
            <input type="submit" id="btn" value="Registrarme">
        </div>
        </form>
    </div>
</body>
</html>
