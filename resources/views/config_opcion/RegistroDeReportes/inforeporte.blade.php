@extends('layout.tablero')

@section('content')

<div class="lc-botones-header">
    <a href="{{url('configuracion/reportes')}}" class="btn regresar">Regresar</a>
</div>

<div class="box type-table crud"> 
    <div class="box-header">
        <p>Reporte #{{$reporte->id}}</p>
    </div>
    <div class="box-content">
        <form class="form-view">
                @if ($message = Session::get('success'))
                    <div class="box type-status crud success">
                        <div class="box-content">
                            {{ $message }}
                        </div>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="box type-status crud error">
                        <div class="box-content">
                            {{ $message }}
                        </div>
                    </div>
                @endif
            <div class="form-candado">
                <label class="titulo-dato">Candados:</label><br>
                <p class="campo-dato">{{$reporte->Candados}}</p>
                <label class="titulo-dato">Registros:</label><br>
                <p class="campo-dato">{{$reporte->Registros}}</p>
                <label class="titulo-dato">Usuario:</label><br>
                <p class="campo-dato">{{$reporte->Usuario}}</p>
                <label class="titulo-dato">Fecha:</label><br>
                <p class="campo-dato">{{$reporte->Fecha}}</p>
                <label class="titulo-dato">Valido:</label><br>
                <p class="campo-dato">{{$reporte->Valido}}</p>
                <div class="lc-botones-header">
                    <a class="btn editar" href="{{route('reporte.editar',$reporte->id)}}">Validacion</a>
                </div>
            </div>  
        </form>         
    </div>
</div>
@endsection 