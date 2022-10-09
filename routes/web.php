<?php

use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;

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
