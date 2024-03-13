@extends('layout.tablero')

@section('content')

    <div class="lc-botones-header">
        <a href="{{url('configuracion')}}" class="btn regresar">Regresar</a>
        <a href="{{url('configuracion/lista-candados/agregar')}}" class="btn agregar">Agregar</a>
    </div>

    <div class="box type-table crud"> 
        <div class="box-header">
            <p>Lista de candados</p>
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
                        <th>Col</th>
                        <th>Nombre</th>
                        <th>Area</th>
                        <th>Proceso</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($candados as $candado)
                    <tr>
                        <td>{{$candado->Columna}}</td>
                        <td>{{$candado->Nombre}}</td>
                        <td>{{$candado->Area}}</td>
                        <td>{{$candado->Proceso}}</td>
                        <td>
                            <a href="{{route('candado.show',$candado->id)}}">
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