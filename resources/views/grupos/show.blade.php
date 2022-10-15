@extends('layouts.app')

@section('title',"$grupo->nome")
@section('top',"Grupo - $grupo->nome")

@section('content')
<div class=" bg-white">
        <div class=" px-4 py-4 flex justify-start items-center border-b-2 border-b-gray-300">
            <div class="flex flex-col justify-center items-center">
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
            </div>
            <div>
                <h3 class="font-bold text-lg text-gray-600 mr-20">{{$grupo->nome}}</h3>
                <h4 class="text-gray-400">{{count($pessoas)}} elementos</h4>
            </div>
            <div class="flex justify-center items-center ">
                <a href="{{ route('grupos.edit',$grupo->id) }}" class="bg-blue-500 px-2 hover:bg-blue-800 py-1 mr-3  rounded-md text-white text-lg" title="Editar Grupo"><i class="fa fa-pencil"></i> </a>
                <a href="#" class="bg-red-500 px-2 hover:bg-red-800 py-1 mr-3  rounded-md text-white text-lg" title="Eliminar Grupo"><i class="fa fa-trash"></i> </a>
            
            </div>
        </div>
        <div class="px-4 py-4 mt-12">
            @if(session('sucess'))
                <p class="text-green-500 text-center">{{ session('sucess') }}</p>
            @endif
            @if(session('error'))
                <p class="text-red-500 text-center">{{ session('error') }}</p>
            @endif
            <div class="mb-2">
                <a href="{{ route('grupos.add-contacto',$grupo->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded-md">+</a>
            </div>
            <div class="flex flex-col justify-start ">
                @foreach($pessoas as $dado)
                <a href="{{route('pessoas.show',$dado->id)}}" class="fav ">
                        <div class="mr-8">
                                <img src='{{ asset("storage/$dado->foto") }}' class="pic-circle " alt="">
                        </div>
                        <div >
                            <h3 class="text-sm">{{$dado->nome}}</h3>
                            <h5 class="text-gray-500  text-xs">{{$dado->endereco}}</h5>
                            
                        </div>

                </a>
                <!-- <div class="px-2 py-2 flex justify-between items-center  mb-4 border border-gray-200 rounded-sm">
                    <div class="flex flex-col justify-start">
                        @if(isset($dado->telefone))
                        <h4 class="text-gray-400">Phone: <span class="text-gray-700" >{{ $grupo->id }}</span></h4>
                        @endif
                        @if(isset($contacto->email))
                        <h4 class="text-gray-400">Email: <span class="text-gray-700">{{ $grupo->id }}</span></h4>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('contactos.edit',$grupo->id)}}" class="mr-1 text-white bg-blue-500 px-2 py-1 rounded-md text-md">
                            <i class="fa fa-pencil"></i></a>
                        <a href="{{ route('contactos.delete',$grupo->id)}}" class=" mr-1 text-white bg-red-500 px-2 py-1 rounded-md text-md">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div> -->
                @endforeach


            </div>
        </div>

</div>

@endsection