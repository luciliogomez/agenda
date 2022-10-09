@extends('layouts.app')

@section('title',"Contactos")
@section('top',"Contactos")


@section('content')
    <div class=" bg-white">
        <div class=" px-4 py-4 flex justify-between items-center border-b-2 border-b-gray-300">
            <form action="" method="post"class=" flex ">
                <input type="text" placeholder="Pesquisar" class="m-0 px-3 py-2 border border-gray-400 text-md rounded-l-md text-gray-600">
                <button type="submit" class="bg-blue-500 text-white m-0 px-3 py-2 rounded-r-md border border-gray-400"><i class="fa fa-search"></i></button>
            </form>
            <a href="{{route('pessoas.create')}}" class="bg-blue-500 text-white px-2 py-1 rounded-full center ">+ Adicionar</a>
        </div>
        <div class=" px-4 py-4 ">
        <div class="mt-10 flex flex-col justify-start max-h-60 overflow-auto">
            
            @foreach($pessoas as $pessoa)
                <a href="{{route('pessoas.show',$pessoa->id)}}" class="fav ">
                        <div class="mr-8">
                                <img src='{{ asset("storage/$pessoa->foto") }}' class="pic-circle " alt="">
                        </div>
                        <div >
                            <h3 class="text-sm">{{$pessoa->nome}}</h3>
                            <h5 class="text-gray-500  text-xs">{{$pessoa->endereco}}</h5>
                        </div>

                </a>
            @endforeach
            
        </div>
        </div>
    </div>
@endsection

