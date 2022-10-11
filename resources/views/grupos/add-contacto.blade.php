@extends('layouts.app')

@section('title',"$grupo->nome")
@section('top',"Grupo - $grupo->nome")

@section('content')
<div class=" bg-white">
        <div class=" px-4 py-4 flex justify-start items-center border-b-2 border-b-gray-300">
            <div class="flex flex-col justify-center items-center">
                <div class="mr-8">
                    <img src='{{ asset("storage/$grupo->foto") }}' class="w-20 h-20 rounded-md " alt="">
                </div>
            </div>
            <div>
                <h3 class="font-bold text-lg text-gray-600">{{$grupo->nome}}</h3>
                <h4 class="text-gray-400">Adicionar membros</h4>
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
                <form action="{{route('grupos.store-contacto',$grupo->id)}}" method="post" class="">
                    @csrf    
                <div class="max-h-60 overflow-auto">
                    @foreach($pessoas as $dado)
                <div  class="fav ">
                        <div class="mr-8">
                            <input type="checkbox" name="{{$dado->id}}" id="">
                        </div>
                        <div class="mr-8">
                                <img src='{{ asset("storage/$dado->foto") }}' class="pic-circle " alt="">
                        </div>
                        <div class="mr-10">
                            <h3 class="text-sm">{{$dado->nome}}</h3>
                            <h5 class="text-gray-500  text-xs">{{$dado->endereco}}</h5>
                            
                        </div>
                        

                </div>
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
                   <button type="submin" class=" mt-8 px-4 py-2 bg-blue-500 text-white rounded-md">Adicionar Membros</button>
                    
                </form>


            </div>
        </div>

</div>

@endsection