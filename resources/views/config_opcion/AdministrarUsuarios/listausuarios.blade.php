@extends('layout.tablero')

@section('content')

    <div class="lc-botones-header">
        <a href="{{url('configuracion')}}" class="btn regresar">Regresar</a>
        <a href="{{url('configuracion/usuarios/agregar')}}" class="btn agregar">Agregar</a>
    </div>
   
    <div class="box type-table crud"> 
        <div class="box-header">
            <p>Lista de usuarios</p>
        </div>
            
        <div class="box-content">
                @if ($message = Session::get('error'))
                    <div class="box type-status crud error permiso">
                        <div class="box-content">
                            {{ $message }}
                        </div>
                    </div>
                @endif
            <div class="table-view"> 
                <table>
                    <thead>
                    <tr class="border-bottom">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>
                            <a href="{{route('usuario.show',$usuario->id)}}">
                                <button class="btn-seleccionar">
                                    Seleccionar
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
    
@endsection 