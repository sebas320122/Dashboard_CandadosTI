@extends('layout.tablero')

@section('content')

<div class="lc-botones-header">
    <a href="{{url('configuracion/lista-candados')}}" class="btn regresar">Regresar</a>
</div>

<div class="box type-table crud"> 
    <div class="box-header">
        <p>{{$candadomuestra->Nombre}}</p>
    </div>
    <div class="box-content">
        <form class="form-view" action="{{ route('candado.destroy', $candadomuestra->id) }}" method="POST">
            @csrf
            @method('DELETE')
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
                <label class="titulo-dato">Columna:</label><br>
                <p class="campo-dato">{{$candadomuestra->Columna}}</p>
                <label class="titulo-dato">Nombre:</label><br>
                <p class="campo-dato">{{$candadomuestra->Nombre}}</p>
                <label class="titulo-dato">Area:</label><br>
                <p class="campo-dato">{{$candadomuestra->Area}}</p>
                <label class="titulo-dato">Proceso:</label><br>
                <p class="campo-dato">{{$candadomuestra->Proceso}}</p>
                <label class="titulo-dato">Sistema:</label><br>
                <p class="campo-dato">{{$candadomuestra->Sistema}}</p>
                <label class="titulo-dato">Descripcion:</label><br>
                <p class="campo-dato texto">{{$candadomuestra->Descripcion}}</p>
                <label class="titulo-dato">Consulta:</label><br>
                <p class="campo-dato texto txt-lg">{{$candadomuestra->Consulta}}</p>
                <div class="lc-botones-header">
                    <a class="btn editar" href="{{route('candado.editar',$candadomuestra->id)}}">Editar</a>
                    <input type="submit" value="Eliminar" class="btn eliminar">  
                </div>
            </div>  
        </form>         
    </div>
</div>
@endsection 