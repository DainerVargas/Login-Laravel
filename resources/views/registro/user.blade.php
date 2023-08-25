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
        <form class="regis" action="{{route('regiscreate')}}" method="post" enctype="multipart/form-data">
            <h1>REGISTRATE</h1>
            @csrf
            <input type="text" name="name" placeholder="Nombre" value="{{old('name')}}">
            @error('name')
                <small>*{{ $message }}</small>
            @enderror
            <br><br>
            <input type="text" name="email" placeholder="Email" value="{{old('email')}}">
            @error('email')
                <small>*{{ $message }}</small>
            @enderror
            <br><br>
            <input type="file" name="foto" accept="image/*">
            @error('foto')
                <small>*{{ $message }}</small>
            @enderror
            <br><br>
            <select name="work" id="select">
                <option value="" selecte hidden>Elije una opcion</option>
                @foreach ($work as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('work')
                <small>*{{$message}}</small>
            @enderror
            <br><br>
            <input type="password" id="pass" name="password" placeholder="Contraseña" value="{{old('password')}}">
            @error('password')
                <small>*{{ $message }}</small>
            @enderror
            <br><br>
            <div id="btns" class="botones">
                <a href="{{route('index')}}">Atras</a>
            <input type="submit" id="btn" value="Registrarme">
        </div>
        </form>
    </div>
</body>
</html>
