<?php

use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

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
Route::get("/pessoas/{id}/create-contacto",[PessoaController::class,'createContacto'])->name("pessoas.create-contacto");
Route::post("/pessoas/store-contacto",[PessoaController::class,'storeContacto'])->name("pessoas.store-contacto");
Route::get("/contactos/{id}/edit",[ContactoController::class,'edit'])->name("contactos.edit");
Route::post("/contactos/update",[ContactoController::class,'update'])->name("contactos.update");
Route::get("/contactos/{id}/delete",[ContactoController::class,'delete'])->name("contactos.delete");
