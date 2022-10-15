@extends('layouts.app')

@section('title',"Grupos")
@section('top',"Editar Grupo")

@section('content')
<div class="bg-white">
    @if(session('sucess'))
        <p class="text-green-500 ">{{ session('sucess') }}</p>
    @endif
    @if(session('error'))
        <p class="text-red-500 ">{{ session('error') }}</p>
    @endif
    <div class="px-4 py-4 ">
        <div class="">
            <figure class=""> 
                @if(empty($grupo->foto))
                    <div class="mr-8 w-20 h-20 rounded-md bg-gray-500 flex justify-center items-center">
                        <span class=" text-white text-4xl"><i class="fa fa-users"></i></span>
                    </div>
                @else
                    <div class="mr-8">
                        <img src='{{ asset("storage/$grupo->foto") }}' class="w-20 h-20 rounded-md " alt="">
                    </div>
                @endif
            </figure>
        </div>
        <form action="{{route('grupos.update',$grupo->id)}}" method="post" class="flex flex-wrap items-start" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$grupo->id}}">
            <div class="flex flex-col w-1/4 mx-2 my-1">
                <label for="nome" class="text-gray-500 mb-2">Nome</label>
                <input type="text" placeholder="Digite o nome" value="{{ $grupo->nome }}" name="nome" class="px-2 py-2 text-md rounded-md border border-r-gray-400">
                @if($errors->has('nome')) 
                <ul>
                    @foreach($errors->get('nome') as $error)
                            <li class="text-red-500"> {{ $error }}</li>
                    @endforeach
                    </ul>
                @endif
            </div>
            
            <div class="flex flex-col  mx-2 my-1 w-1/3">
                <label for="foto" class="text-gray-500 mb-2">Nova Foto</label>
                <input type="file"  name="foto" class="px-2 py-2 text-sm rounded-md border border-r-gray-400">
            </div>
            <div class="w-1/3">

            </div>
            <div class="flex flex-col items-center mx-2 my-1 mt-4">
                
                <button class="bg-blue-500 rounded-md text-white px-2 py-1 ">Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection