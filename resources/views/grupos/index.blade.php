@extends('layouts.app')

@section('title',"Grupos")
@section('top',"Meus Grupos")


@section('content')
    <div class=" bg-white">
        <div class=" px-4 py-4 flex justify-between items-center border-b-2 border-b-gray-300">
            <form action="{{ route('grupos.search') }}" method="post" class=" flex ">
                @csrf
                <input type="text" name="search" value="{{$search ?? ''}}"  placeholder="Pesquisar" class="m-0 px-3 py-2 border border-gray-400 text-md rounded-l-md text-gray-600">
                <button type="submit" class="bg-blue-500 text-white m-0 px-3 py-2 rounded-r-md border border-gray-400"><i class="fa fa-search"></i></button>
            </form>
            <a href="{{route('grupos.create')}}" class="bg-blue-500 text-white px-2 py-1 rounded-full center ">+ Adicionar</a>
        </div>
        <div class=" px-4 py-4 ">
        <div class="mt-10 flex flex-col justify-start max-h-60 overflow-auto">
            
            @foreach($grupos as $grupo)
                <a href="{{route('grupos.show',$grupo->id)}}" class="fav ">
                    <div class="">
                        <figure class=""> 
                            @if(empty($grupo->foto))
                                <div class="mr-8 pic-circle  bg-gray-500 flex justify-center items-center">
                                    <span class=" text-white text-2xl "><i class="fa fa-users"></i></span>
                                </div>
                            @else
                                <div class="mr-8">
                                    <img src='{{ asset("storage/$grupo->foto") }}' class="pic-circle" alt="">
                                </div>
                            @endif
                        </figure>
                    </div>
                        <!-- <div class="mr-8">
                                <img src='{{ asset("storage/$grupo->foto") }}' class="pic-circle " alt="">
                        </div> -->
                        <div >
                            <h3 class="text-sm">{{$grupo->nome}}</h3>
                            <h5 class="text-gray-500  text-xs">{{$grupo->created_at}}</h5>
                        </div>
                        
                </a>
            @endforeach
            
        </div>
        </div>
    </div>
@endsection

