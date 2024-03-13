@extends('layout.tablero')

@section('title', 'Configuracion - ')

@section('content')
    <div class="container container-config">
        <h1>Configuracion</h1>
    </div>
    <div class="cuadricula type-opciones">    
     <!--Opcion--> 
     <div class="box type-option">
        <div class="box-content">
            <p>Subir reporte</p>
            <a href="{{url('configuracion/subir-reporte')}}">
                <button class="op-boton">Subir archivo</button>  
            </a>  
        </div>
    </div> 
    <!--Opcion--> 
        <div class="box type-option">
            <div class="box-content">
                <p>Lista de candados</p> 
                <a href="{{url('configuracion/lista-candados')}}">
                    <button class="op-boton">Ver</button> 
                </a>    
            </div>
        </div> 
    <!--Opcion--> 
        <div class="box type-option">
            <div class="box-content">
                <p>Administrar usuarios</p>
                <a href="{{url('configuracion/usuarios')}}">
                    <button class="op-boton">Ir</button>  
                </a>    
            </div>
        </div> 
    <!--Opcion--> 
        <div class="box type-option">
            <div class="box-content">
                <p>Registro de reportes</p>
                <a href="{{url('configuracion/reportes')}}">
                    <button class="op-boton">Ver</button>  
                </a>  
            </div>
        </div> 
    </div>
@endsection