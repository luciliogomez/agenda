<?php

use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\GrupoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource("pessoas",PessoaController::class);
Route::post("/pessoas/search",[PessoaController::class,'search'])->name("pessoas.search");
Route::get("/pessoas/{id}/create-contacto",[PessoaController::class,'createContacto'])->name("pessoas.create-contacto");
Route::post("/pessoas/store-contacto",[PessoaController::class,'storeContacto'])->name("pessoas.store-contacto");
Route::get("/contactos/{id}/edit",[ContactoController::class,'edit'])->name("contactos.edit");
Route::post("/contactos/update",[ContactoController::class,'update'])->name("contactos.update");
Route::get("/contactos/{id}/delete",[ContactoController::class,'delete'])->name("contactos.delete");

Route::get("/grupos",[GrupoController::class,'index'])->name("grupos.index");
Route::get("/grupos/{id}/show",[GrupoController::class,'show'])->name("grupos.show");
Route::get("/grupos/create",[GrupoController::class,'create'])->name("grupos.create");
Route::post("/grupos/search",[GrupoController::class,'search'])->name("grupos.search");
Route::post("/grupos/store",[GrupoController::class,'store'])->name("grupos.store");
Route::get("/grupos/{id}/add-contacto",[GrupoController::class,'addContacto'])->name("grupos.add-contacto");
Route::post("/grupos/{id}/store-contacto",[GrupoController::class,'storeContacto'])->name("grupos.store-contacto");
Route::get("/grupos/{id}/edit",[GrupoController::class,'edit'])->name("grupos.edit");
Route::put("/grupos/{id}/update",[GrupoController::class,'update'])->name("grupos.update");
Route::get("/grupos/{id}/remove-contacto",[GrupoController::class,'removeContacto'])->name("grupos.remove-contacto");
