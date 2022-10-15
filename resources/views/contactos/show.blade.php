@extends('layouts.app')

@section('title',"Contactos")
@section('top',"$pessoa->nome")

@section('content')
<div class=" bg-white">
        <div class=" px-4 py-4 flex justify-start items-center border-b-2 border-b-gray-300">
            <div class="flex flex-col justify-center items-center">
                <div class="">
                    <figure class=""> 
                        @if(empty($pessoa->foto))
                            <div class="mr-8 w-20 h-20 rounded-md bg-gray-500 flex justify-center items-center">
                                <span class=" text-white text-4xl"><i class="fa fa-user"></i></span>
                            </div>
                        @else
                            <div class="mr-8">
                                <img src='{{ asset("storage/$pessoa->foto") }}' class="w-20 h-20 rounded-md " alt="">
                            </div>
                        @endif
                    </figure>
                </div>
            </div>
            <div>
                <h3 class="font-bold text-lg text-gray-600">{{$pessoa->nome}}</h3>
                <h4 class="text-gray-400">{{$pessoa->endereco}}</h4>
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
                <a href="{{ route('pessoas.create-contacto',$pessoa->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded-md">+</a>
            </div>
            <div class="flex flex-col justify-start ">
                @foreach($contactos as $contacto)
                <div class="px-2 py-2 flex justify-between items-center  mb-4 border border-gray-200 rounded-sm">
                    <div class="flex flex-col justify-start">
                        @if(isset($contacto->telefone))
                        <h4 class="text-gray-400">Phone: <span class="text-gray-700" >{{ $contacto->telefone }}</span></h4>
                        @endif
                        @if(isset($contacto->email))
                        <h4 class="text-gray-400">Email: <span class="text-gray-700">{{ $contacto->email }}</span></h4>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('contactos.edit',$contacto->id)}}" class="mr-1 text-white bg-blue-500 px-2 py-1 rounded-md text-md">
                            <i class="fa fa-pencil"></i></a>
                        <a href="{{ route('contactos.delete',$contacto->id)}}" class=" mr-1 text-white bg-red-500 px-2 py-1 rounded-md text-md">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>
                @endforeach


            </div>
        </div>

</div>

@endsection