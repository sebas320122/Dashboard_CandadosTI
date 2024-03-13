@extends('layout.tablero')

@section('content')

<div class="lc-botones-header">
    <a href="{{url('configuracion/usuarios')}}" class="btn regresar">Regresar</a>
</div>

<div class="box type-table crud"> 
    <div class="box-header">
        <p>Usuario #{{$usuario->id}}</p>
    </div>
    <div class="box-content">
        <form class="form-view" action="{{ route('usuario.destroy', $usuario->id) }}" method="POST">
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
                <label class="titulo-dato">Nombre:</label><br>
                <p class="campo-dato">{{$usuario->name}}</p>
                <label class="titulo-dato">Correo:</label><br>
                <p class="campo-dato">{{$usuario->email}}</p>
                <label class="titulo-dato">Puesto:</label><br>
                <p class="campo-dato">{{$usuario->Puesto}}</p>
                <label class="titulo-dato">Rol:</label><br>
                <p class="campo-dato">{{$usuario->Rol}}</p>
                <label class="titulo-dato">Oficina:</label><br>
                <p class="campo-dato">{{$usuario->Oficina}}</p>
                <label class="titulo-dato">Fecha de creacion:</label><br>
                <p class="campo-dato">{{$usuario->created_at}}</p>
                <label class="titulo-dato">Fecha de ultima edicion:</label><br>
                <p class="campo-dato dato">{{$usuario->updated_at}}</p>
                <div class="lc-botones-header">
                    <a class="btn editar" href="{{route('usuario.editar',$usuario->id)}}">Editar</a>
                    <input type="submit" value="Eliminar" class="btn eliminar">  
                </div>
            </div>  
        </form>         
    </div>
</div>
@endsection 