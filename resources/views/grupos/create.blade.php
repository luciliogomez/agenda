@extends('layouts.app')

@section('title',"Grupos")
@section('top',"Novo Grupo")

@section('content')
<div class="bg-white">
    @if(session('sucess'))
        <p class="text-green-500 ">{{ session('sucess') }}</p>
    @endif
    @if(session('error'))
        <p class="text-red-500 ">{{ session('error') }}</p>
    @endif
    <div class="px-4 py-4 ">
        <form action="{{route('grupos.store')}}" method="post" class="flex flex-wrap items-start" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col w-1/4 mx-2 my-1">
                <label for="nome" class="text-gray-500 mb-2">Nome</label>
                <input type="text" placeholder="Digite o nome" value="{{ old('nome') }}" name="nome" class="px-2 py-2 text-md rounded-md border border-r-gray-400">
                @if($errors->has('nome')) 
                <ul>
                    @foreach($errors->get('nome') as $error)
                            <li class="text-red-500"> {{ $error }}</li>
                    @endforeach
                    </ul>
                @endif
            </div>
            
            <div class="flex flex-col  mx-2 my-1 w-1/3">
                <label for="foto" class="text-gray-500 mb-2">Foto</label>
                <input type="file"  name="foto" class="px-2 py-2 text-sm rounded-md border border-r-gray-400">
            </div>
            <div class="w-1/3">

            </div>
            <div class="flex flex-col items-center mx-2 my-1 mt-4">
                
                <button class="bg-blue-500 rounded-md text-white px-2 py-1 ">Adicionar Grupo</button>
            </div>
        </form>
    </div>
</div>
@endsection