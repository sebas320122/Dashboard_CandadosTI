@extends('layout.tablero')

@section('content')

    <div class="lc-botones-header">
        <a href="{{url('configuracion')}}" class="btn regresar">Regresar</a>
    </div>

    <div class="box type-table crud"> 
        <div class="box-header">
            <p>Registro de reportes</p>
        </div>
        <div class="box-content">
                @if ($message = Session::get('success'))
                    <div class="box type-status crud success">
                        <div class="box-content">
                            {{ $message }}
                        </div>
                    </div>
                @endif
            <div class="table-view"> 
                <table>
                    <thead>
                    <tr class="border-bottom">
                        <th>ID</th>
                        <th>Candados</th>
                        <th>Registros</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Valido</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reportes as $reporte)
                    <tr>
                        <td>{{$reporte->id}}</td>
                        <td>{{$reporte->Candados}}</td>
                        <td>{{$reporte->Registros}}</td>
                        <td>{{$reporte->Usuario}}</td>
                        <td>{{$reporte->Fecha}}</td>
                        <td>{{$reporte->Valido}}</td>
                        <td>
                            <a href="{{route('reporte.show',$reporte->id)}}">
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