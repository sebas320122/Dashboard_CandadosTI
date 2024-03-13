@extends('layout.tablero')

@section('title', 'Fallas - ')

@section('content')
    <div class="container">
        <h1>Revisión de irregularidades</h1>
        <div class="table-filters">
            <select class="filter" col-index = 1 onchange="filter_rows()">
                <option value="all" class="option-all"><div>Area - Todo</option>
              </select>
              <select class="filter" col-index = 2 onchange="filter_rows()">
                <option value="all" class="option-all">Proceso - Todo</option>
              </select>
        </div>
    </div>
    <div class="cuadricula">
        <div class="box type-table revision"> 
            <div class="box-header">
                <p>Resumen por area y proceso</p>
            </div>
            <div class="box-content">
                <div class="table-view">
                    <table id="emp-table">
                        <thead>
                        <tr>
                            <th>Area</th>
                            <th>Proceso</th>
                            <th>Candados</th>
                            <th>Registros</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach ($porAreaProceso as $AreaProceso)
                        <tr>
                            <td>{{$AreaProceso->Area}}</td>
                            <td>{{$AreaProceso->Proceso}}</td>
                            <td>{{$AreaProceso->Candados}}</td>
                            <td>{{$AreaProceso->Registros}}</td>
                        </tr>
                        @endforeach 
                        </tbody>
                    </table>   
                    <script>
                        getUniqueValuesFromColumn();
                    </script>
                </div>
            </div>
        </div> 
        <div class="box type-table revision afectados"> 
            <div class="box-header">
                <p>Candados afectados</p>
            </div>
            <div class="box-content">
                <div class="table-view second">
                    <table id="emp-table">
                        <thead>
                        <tr>
                            <th>Candado</th>
                            <th>Registros</th>
                            <th>Descripcion</th>
                            <th>Consulta</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($candados as $candado)
                        <tr>
                            <td>
                                {{$candado->Candado}} <br>
                                <div class="candado-info">
                                    Area: {{$candado->Area}} <br>
                                    Proceso: {{$candado->Proceso}}
                                </div>
                            </td>
                            <td>
                                {{$candado->Registros}}
                                <p class="valor-oculto">{{$candado->Proceso}}</p>
                            </td>
                            <td>{{$candado->Descripcion}}</td>
                            <td>
                                <button class="btn-copy" data-consulta="{{$candado->Consulta}}">
                                    Copiar
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
   
    </div>

    @push('head-scripts')
        <script src="/js/filters.js"></script>
    @endpush

    @push('scripts')
        <script src="/js/copy.js"></script>
    @endpush

@endsection
