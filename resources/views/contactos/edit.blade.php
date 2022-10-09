@extends('layouts.app')

@section('title',"Contactos")
@section('top',"Editar Contacto")

@section('content')
<div class="bg-white">
    @if(session('sucess'))
        <p class="text-green-500 ">{{ session('sucess') }}</p>
    @endif
    @if(session('error'))
        <p class="text-red-500 ">{{ session('error') }}</p>
    @endif
    <div class="px-4 py-4 ">
        <form action="{{ route('contactos.update') }}" method="post" class="flex flex-wrap items-start" enctype="multipart/form-data">
            @csrf
           <input type="hidden" name="id" value="{{$contacto->id}}">
            <div class="flex flex-col  mx-2 my-1 w-1/4">
                <label for="telefone" class="text-gray-500 mb-2">Telefone</label>
                <input type="number" placeholder="Digite o telefone" value="{{ $contacto->telefone }}" name="telefone" class="px-2 py-2 text-md rounded-md border border-r-gray-400">
            </div>
            <div class="flex flex-col  mx-2 my-1 w-1/4 ">
                <label for="email" class="text-gray-500 mb-2">Email</label>
                <input type="email" placeholder="Digite o email" value="{{ $contacto->email }}" name="email" class="px-2 py-2 text-md rounded-md border border-r-gray-400">
            </div>
            <div class="w-2/5">

            </div>
            <div class="flex flex-col items-center mx-2 my-1 mt-4">
                <button class="bg-blue-500 rounded-md text-white px-2 py-1 ">Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection