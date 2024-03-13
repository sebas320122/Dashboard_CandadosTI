@extends('layout.tablero')

@section('title', 'Inicio - ')

@section('content')
    <div class="container">
        <h1>Resumen de reporte</h1>
    </div>
    <div class="cuadricula">
    <!--Recuadro Info-->
        <div class="box type-info" id="box-1">
            <div class="box-header">
                <p>Candados afectados</p>
            </div>
            <div class="box-content">
                <div class="elements-line">
                    <p class="box-i-num">{{$resumenActual->Candados}}</p>
                    <i class="bx bx-lock-open"></i>
                </div>
                <p class="box-i-percent">Incremento: {{$IncrCandados}}%</p>
            </div>
        </div> 
    <!--Recuadro Info-->
        <div class="box type-info" id="box-2">
            <div class="box-header">
                <p>Registros</p>
            </div>
            <div class="box-content">
                <div class="elements-line">
                    <p class="box-i-num">{{$resumenActual->Registros}}</p>
                    <i class="bx bx-search-alt-2"></i>
                </div>
                <p class="box-i-percent">Incremento: {{$IncrRegistros}}%</p>
            </div>
        </div> 
    <!--Recuadro Info-->
        <div class="box type-info time" id="box-3">
            <div class="box-header">
                <p>Subido por</p>
            </div>
            <div class="box-content">
                <div class="elements-line">
                    <p class="box-i-name">{{$resumenActual->Usuario}}</p>
                    <i class="bx bx-time"></i>
                </div>
                <p class="box-i-date">{{$resumenActual->Fecha}}</p>
            </div>
        </div> 
    <!--Recuadro Grafica-->
        <div class="box type-chart" id="box-graf-incidencias">
            <div class="box-header">
                <p>Incremento en candados</p>
            </div>
            <div class="box-content">
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>                   
            </div>
        </div>     
    <!--Recuadro Grafica-->
        <div class="box type-chart" id="box-graf-eventos">
            <div class="box-header">
                <p>Incremento en registros</p>
            </div>
            <div class="box-content">
                <div class="chart-container">
                    <canvas id="myChart2"></canvas>
                </div>                   
            </div>
        </div>      
    <!--Recuadro Grafica-->
        <div class="box type-chart" id="box-graf-areas">
            <div class="box-header">
                <p>Candados afectados en areas</p>
            </div>
            <div class="box-content">
                <div class="chart-container chart3">
                    <canvas id="myChart3"></canvas>
                </div> 
            </div>
        </div>     
    <!--Recuadro Tabla-->
        <div class="box type-table" id="box-6"> 
            <div class="box-header">
                <p>Resumen por areas</p>
            </div>
            <div class="box-content">
                <div class="table-view">
                    <table>
                        <tr>
                        <th>Area</th>
                        <th>Candados</th>
                        <th>Registros</th>
                        </tr>
                        @foreach($porArea as $Area)
                        <tr>
                        <td>{{$Area->Area}}</td>
                        <td>{{$Area->Candados}}</td>
                        <td>{{$Area->Registros}}</td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>  
     
    
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var datosGraficas = <?php echo json_encode($registroReportes); ?>;
            var datosGraficaCirc = <?php echo json_encode($porArea); ?>;
        </script>
        <script src="/js/charts.js"></script>
    @endpush

@endsection