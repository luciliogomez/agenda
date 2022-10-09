@extends('layouts.app')

@section('title',"Home")



@section('content')
    
    <div class="flex justify-start items-center mb-10">
        <div class="w-1/5 mr-4 rounded-md text-white bg-emerald-500 px-4 py-4 flex flex-col justify-start items-start">
            <h3 class="text-4xl mb-1"><i class="fa fa-user"></i></h3>
            <h4 class="text-2xl mb-2">145</h4>
            <h6 class="text-md">Contactos</h6>
        </div>
        <div class="w-1/5 mr-4 rounded-md text-white bg-blue-600 px-4 py-4 flex flex-col justify-start items-start">
            <h3 class="text-4xl mb-1"><i class="fa fa-users"></i></h3>
            <h4 class="text-2xl mb-2">14</h4>
            <h6 class="text-md">Grupos</h6>
        </div>
        
        <div class="w-1/5 mr-4 rounded-md text-white bg-red-500 px-4 py-4 flex flex-col justify-start items-start">
            <h3 class="text-4xl mb-1"><i class="fa fa-heart"></i></h3>
            <h4 class="text-2xl mb-2">5</h4>
            <h6 class="text-md">Favoritos</h6>
        </div>
        
        
        <div class="w-1/5 mr-4 rounded-md text-white  bg-yellow-400 px-4 py-4 flex flex-col justify-start items-start">
            <h3 class="text-4xl mb-1"><i class="fa fa-user"></i></h3>
            <h4 class="text-2xl mb-2">145</h4>
            <h6 class="text-md">Contactos</h6>
        </div>
    </div>
    <div class="  w-1/3 bg-white" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
        <div class="flex justify-between items-center rounded-t-md px-4 py-4 bg-red-400">
            <h3 class="text-white text-lg"><i class="fa fa-heart"></i> Favoritos</h3>
            <a href="#" 
                class="hover:bg-green-600 hover:text-white px-3 py-1 bg-white text-green-600 text-2xl  rounded-full">
                +
            </a>
        </div>
        <div class="px-4 py-4 border-b border-gray-300">
            <p class="text-gray-500 w- text-sm">Você tem 5 contactos favoritos</p>
        </div>
        <div class="flex flex-col justify-start max-h-60 overflow-auto">
            <div class="fav  border-l-2 border-l-green-500">
                <div class="mr-8">
                        <img src="{{asset('img/1.jpg')}}" class="pic-circle " alt="">
                </div>
                <div >
                    <h3 class="text-sm">Isabel José</h3>
                    <h5 class="text-gray-500  text-xs">Administradora</h5>
                </div>
                <div class="ml-20 text-gray-500 text-2xl">
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </div>
            </div>
            <div class="fav border-l-2 border-l-green-500">
                <div class="mr-8">
                        <img src="{{asset('img/1.jpg')}}" class="pic-circle " alt="">
                </div>
                <div>
                    <h3 class="text-sm">Isabel José</h3>
                    <h5 class="text-gray-500 text-xs">Administradora</h5>
                </div><div class="ml-20 text-gray-500 text-2xl">
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </div>
            </div>
            <div class="fav border-l-2 border-l-green-500">
                <div class="mr-8">
                        <img src="{{asset('img/1.jpg')}}" class="pic-circle" alt="">
                </div>
                <div>
                    <h3 class="text-sm">Isabel José</h3>
                    <h5 class="text-gray-500 text-xs">Administradora</h5>
                </div><div class="ml-20 text-gray-500 text-2xl">
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </div>
            </div>
            <div class="fav border-l-2 border-l-green-500">
                <div class="mr-8">
                        <img src="{{asset('img/1.jpg')}}" class="pic-circle" alt="">
                </div>
                <div>
                    <h3 class="text-sm">Isabel José</h3>
                    <h5 class="text-gray-500 text-xs">Administradora</h5>
                </div><div class="ml-20 text-gray-500 text-2xl">
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </div>
            </div>
            <div class="fav border-l-2 border-l-green-500">
                <div class="mr-8">
                        <img src="{{asset('img/1.jpg')}}" class="pic-circle" alt="">
                </div>
                <div>
                    <h3 class="text-sm">Isabel José</h3>
                    <h5 class="text-gray-500 text-xs">Administradora</h5>
                </div><div class="ml-20 text-gray-500 text-2xl">
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection

