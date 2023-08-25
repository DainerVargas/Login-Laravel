<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesion</title>
</head>

<body>
    @vite('resources/css/app.css')
    <div id="login">
        <form class="login" action="{{ route('session') }}" method="post">
            <img class="img__user" src="/images/usuario.png" alt="">
            @csrf
            <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
                <small>*{{ $message }}</small>
            @enderror
            <br><br>
            <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
            @error('password')
                <small>*{{ $message }}</small>
            @enderror
            <br><br>
            <div class="botones">
                <a href="{{ route('regiscreate') }}">Atras</a>
                <input type="submit" id="btn" value="Iniciar Sesion">
            </div>
        </form>
    </div>
</body>

</html>
