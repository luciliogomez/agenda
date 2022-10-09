@extends('layouts.app')

@section('title',"Contactos")
@section('top',"Novo Contacto")

@section('content')
<div class="bg-white">
    <div class="px-4 py-4 ">
        <form action="{{route('pessoas.store')}}" method="post" class="flex flex-wrap items-center" enctype="multipart/form-data">
            <div class="flex flex-col w-1/4 mx-2 my-1">
                <label for="nome" class="text-gray-500 mb-2">Nome</label>
                <input type="text" placeholder="Digite o nome" name="nome" class="px-2 py-2 text-md rounded-md border border-r-gray-400">
            </div>
            <div class="flex flex-col  mx-2 my-1 w-1/3">
                <label for="endereco" class="text-gray-500 mb-2">Endereço</label>
                <input type="text" placeholder="Digite o endereço" name="endereco" class="px-2 py-2 text-md rounded-md border border-r-gray-400">
            </div>
            <div class="flex flex-col  mx-2 my-1 w-1/3">
                <label for="foto" class="text-gray-500 mb-2">Foto</label>
                <input type="file"  name="foto" class="px-2 py-2 text-sm rounded-md border border-r-gray-400">
            </div>
            <div class="flex flex-col  mx-2 my-1 w-1/4">
                <label for="telefone" class="text-gray-500 mb-2">Telefone</label>
                <input type="number" placeholder="Digite o telefone" name="telefone" class="px-2 py-2 text-md rounded-md border border-r-gray-400">
            </div>
            <div class="flex flex-col  mx-2 my-1 w-1/3 ">
                <label for="email" class="text-gray-500 mb-2">Email</label>
                <input type="email" placeholder="Digite o email" name="email" class="px-2 py-2 text-md rounded-md border border-r-gray-400">
            </div>
            <div class="w-1/3">

            </div>
            <div class="flex flex-col items-center mx-2 my-1 mt-4">
                
                <button class="bg-blue-500 rounded-md text-white px-2 py-1 ">Adicionar</button>
            </div>
        </form>
    </div>
</div>
@endsection