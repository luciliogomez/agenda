@extends('layouts.app')

@section('title',"Contactos")
@section('top',"$pessoa->nome")

@section('content')
<div class=" bg-white">
        <div class=" px-4 py-4 flex justify-start items-center border-b-2 border-b-gray-300">
            <div class="flex flex-col justify-center items-center">
                <div class="mr-8">
                    <img src="{{asset('img/1.jpg')}}" class="w-20 h-20 rounded-md " alt="">
                </div>
            </div>
            <div>
                <h3 class="font-bold text-lg text-gray-600">{{$pessoa->nome}}</h3>
                <h4 class="text-gray-400">{{$pessoa->endereco}}</h4>
            </div>
        </div>
        <div class="px-4 py-4 mt-12">
            <div class="mb-2">
                <a href="#" class="bg-blue-500 text-white px-2 py-1 rounded-md">+</a>
            </div>
            <div class="flex flex-col justify-start ">
                <div class="px-2 py-2 flex justify-between items-center  mb-4 border border-gray-200 rounded-sm">
                    <div class="flex flex-col justify-start">
                        <h4 class="text-gray-400">Phone: <span class="text-gray-700" >943 812 726</span></h4>
                        <h4 class="text-gray-400">Email: <span class="text-gray-700">luciliodetales@gmail.com</span></h4>
                    </div>
                    <div>
                        <a href="#" class="mr-1 text-white bg-blue-500 px-2 py-1 rounded-md text-md">
                            <i class="fa fa-pencil"></i></a>
                        <a href="#" class=" mr-1 text-white bg-red-500 px-2 py-1 rounded-md text-md">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>


            </div>
        </div>

</div>

@endsection