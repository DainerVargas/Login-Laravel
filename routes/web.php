<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get("/", [UserController::class, "index"])->name("index");

Route::get("Registrar/usuarios", [UserController::class, "create"])->name("create");

Route::post("Registrar/usuarios", [UserController::class, "registro"])->name("regiscreate");

Route::get("Inicio/de/sesion", [UserController::class, "login"])->name("inicioSesion");

Route::post("Inicio/de/sesion", [UserController::class, "session"])->name("session");

Route::get("Lista/Usuario", [UserController::class, "lista"])->middleware("auth")->name('lista');

Route::get("Inicio/sesion",[UserController::class, "logut"])->name('logut');

Route::get("Informacion/{user}", [UserController::class, 'info'])->name('informacion');

Route::delete("Eliminando/{users}", [UserController::class, 'destroy'])->name('destroy');

Route::get("Buscar/Registr", [UserController::class, "buscar"])->name('buscar');

Route::get("Buscar/Registro", [UserController::class, "search"])->name('search');


Route::get("Actualizar/Registro/{user}", [UserController::class, "update"])->name("actualizar");

Route::put("Actualizar/Registro{user}", [UserController::class, "updateUser"])->name("updateUser");