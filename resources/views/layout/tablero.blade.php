<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/tablero.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>@yield('title')TableroWeb</title>
    <link rel="icon" type="image/x-icon" href="/imagen/logo.ico">
    @stack('head-scripts')
</head>

<body>
    <div class="sidebar">
       <div class="top">
            <div class="logo">
                <i class="bx bxl-codepen"></i>
                <span>TableroWeb</span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <div class="user">
            <img src="/imagen/user.png" alt="cat" class="user-img">
            <div class="user-data">
                <p class="bold">{{Auth::user()->name}}
                </p>
                <p>{{Auth::user()->Rol}}</p>
            </div>
        </div>
        <ul>
            <li><!--Opcion 1-->
                <a href="{{url('inicio')}}">
                    <i class="bx bx-home-alt-2"></i>
                    <span class="nav-item">Inicio</span>
                </a>
                <span class="tooltip">Inicio</span>
            </li>
            <li><!--Opcion 2-->
                <a href="{{url('fallas')}}">
                    <i class="bx bx-lock-open-alt"></i>
                    <span class="nav-item">Fallas</span>
                </a>
                <span class="tooltip">Fallas</span>
            </li>
            <li><!--Opcion 3-->
                <a href="{{url('configuracion')}}">
                    <i class="bx bx-cog"></i>
                    <span class="nav-item">Configuracion</span>
                </a>
                <span class="tooltip">Configuracion</span>
            </li>
            <li><!--Opcion 4-->
                <a href="{{url('salir')}}">
                    <i class="bx bx-log-out-circle"></i>
                    <span class="nav-item">Salir</span>
                </a>
                <span class="tooltip">Salir</span>
            </li>
        </ul>
    </div>


    <div class="main-content"><!--//Contenido-->
        
        @yield('content')
    </div><!--Contenido//-->

</body>


<!--Scripts-->  
<script src="/js/sidebar.js"></script> 
@stack('scripts')

</html>     