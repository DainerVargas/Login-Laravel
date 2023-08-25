<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        $work = Work::all();
        return view('registro.user', compact('work'));
    }
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view("login.user");
    }

    public function logut(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return view('login.user');
    }

    public function lista()
    {
        $user = User::all();
        return view("listas.user", compact("user"));
    }

    public function session(Request $request)
    {
        $user = User::all();
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->route('lista', compact('user'));
        }

        return back()->withErrors([
            'email' => "Usuario o contraseña incorrecta",
        ]);
    }

    public function registro(UserRequest $request)
    {
        $user = $request->file('foto');
        $nombreFoto = time() . '.' . $user->getClientOriginalExtension();
        $user->move(public_path("images/"), $nombreFoto);

        $user = new User();
        $user->name =  $request->name;
        $user->email = $request->email;
        $user->foto = $nombreFoto;
        $user->password = Hash::make($request->password);
        $user->work_id = $request->work;
        $user->save();

        return redirect()->route('inicioSesion')->with('success', 'Datos guardados correctamente.');
    }

    public function info(User $user)
    {
        return view('informacion.user', compact('user'));
    }

    public function destroy(User $users)
    {
        $users->delete();
        return redirect()->route('lista');
    }

    public function search()
    {
        return view('search.user');
    }

    public function buscar(Request $request)
    {
        $user = $request->input("name");
        if ($user == "") {
            return back()->withErrors([
                'name' => 'Llene los campos por favor'
            ]);

        } else {
            $resultado = User::where('name', 'like', "%$user%")->get();
            return view('search.user', compact("resultado"));
        }
    }

    public function update(User $user)
    {
        $works = Work::all();

        return view('actualizar.user', compact('user','works'));
    }

    public function updateUser(Request $request, $user)
    {
      /* $update = User::find($user); */

      $usuario = User::findOrFail($user);

      $usuario->name = $request->name;
      $usuario->email = $request->email;
      $usuario->password = $request->password;
      $usuario->work_id = $request->work;

      if ($request->hasFile('foto')) {

        $user = $request->file('foto');
        $nombreFoto = time() . '.' . $user->getClientOriginalExtension();
        $user->move(public_path("images/"), $nombreFoto);

        $usuario->foto = $nombreFoto;
      }
      $usuario->save();

      return redirect()->route('lista');
      
    }

    /* public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        $producto->nombre = $request->input('nombre');

        if ($request->hasFile('imagen')) {
            // Manejar la imagen si se proporciona una nueva
            $imagen = $request->file('imagen');
            $ruta = $imagen->store('public/images');
            $producto->imagen = $ruta;
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    } */
}
