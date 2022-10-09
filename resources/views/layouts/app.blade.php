<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
    <title>Agenda - @yield('title')</title>
    <!-- <script src="https://kit.fontawesome.com/6b4ddefc79.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="h-screen ">
    <div class=" h-full w-full">
        <div class="fixed h-full sidebar bg-gray-700  w-1/5 flex flex-col justify-start border-gray-200 border-r-2 shadow-sm shadow-gray-400">
            <div class="px-1 py-2  border-gray-100 border-b-2">
                <a href="/" class=" px-2 py-3 flex justify-center items-center">
                        <span class="mr-3 px-3 py-1 bg-blue-200 text-blue-500 text-3xl font-bold rounded-md">C</span>
                        <span class="text-xl font-bold text-white">Contactos</span>
                </a>
            </div>
            <nav class=" ">
                <ul class="flex flex-col justify-start">
                    <li>
                        <a href="{{route('pessoas.index')}}" class="link "><i class="fa fa-list"></i> Meus Contactos</a>
                    </li>
                    <li>
                        <a href="#" class="link"> <i class="fa fa-users"></i> Grupos</a>
                    </li>
                    <li>
                        <a href="#" class="link"><i class="fa fa-user "></i> Meu Perfil</a>
                    </li>
                    <li>
                        <a href="#" class="link"><i class="fa fa-cog "></i> Definições</a>
                    </li>
                    <li>
                        <a href="#" class="link"><i class="fa fa-sign-out "></i> Sair</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="main w-4/5  bg-gray-50 " style="margin-left: 20%;">
            <div class="top  bg-white w-full border-b border-gray-100  px-4 py-2 flex justify-between items-center">
                <div class="">
                    <h5>@yield('top')</h5>
                </div>
                <div class="flex justify-end items-center">
                    <div class="mr-3">
                        <a href="#"></a>
                    </div>
                    <div class="mr-3 rounded-sm   bg-gray-200 px-3 py-1">
                        <span class=" "><i class="fa fa-user"></i></span>
                    </div>
                    <div class="mr-3">
                        <span>Admin</span>
                    </div>
                </div>
            </div>
            <div class="px-4 py-4 w-full">
                @yield('content')
            </div>
        </div>
    </div>
    
</body>
</html>