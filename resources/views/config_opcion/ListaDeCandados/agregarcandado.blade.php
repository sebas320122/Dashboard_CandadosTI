@extends('layout.tablero')

@section('content')

<div class="lc-botones-header">
    <a href="{{url('configuracion/lista-candados')}}" class="btn regresar">Regresar</a>
</div>

<div class="box type-table crud"> 
    <div class="box-header">
        <p>Agregar candado</p>
    </div>
    <div class="box-content">
        <div class="form-view">
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
                    
                    @if (count($errors) > 0)
                    <div class="box type-status crud error">
                        <div class="box-content">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            <form class="form-candado" action="{{route('candado.store')}}" method="POST">
                @csrf
                <label class="titulo-dato">Columna:</label><br>
                <input class="campo-dato" type="number" name="Columna" required>
                <label class="titulo-dato">Nombre:</label><br>
                <input class="campo-dato" type="text" id="Nombre" name="Nombre" required autocomplete="off">
                <label class="titulo-dato">Area:</label><br>
                <input class="campo-dato" name="Area" type="text" required list="formu-areas" autocomplete="off">
                <datalist id="formu-areas">
                    <option value="Abasto Ganado">
                    <option value="Maquilas">
                    <option value="Engorda">
                    <option value="Materias Primas">
                    <option value="Planta Alimentos">
                    <option value="Procesos">
                    <option value="Despacho en Linea">
                    <option value="Almacen Gral">
                    <option value="Mantenimiento">
                    <option value="Tesoreria">
                    <option value="Compras Generales">
                    <option value="Comercial Detalle">
                </datalist>
                <label class="titulo-dato">Proceso:</label><br>
                <input class="campo-dato" name="Proceso" type="text" required list="formu-procesos" autocomplete="off">
                <datalist id="formu-procesos">
                    <option value="Accesos">
                    <option value="Compras">
                    <option value="Inventario">
                    <option value="Embarques">
                    <option value="Basculas">
                    <option value="Venta">
                    <option value="Datos Maestros">
                </datalist>
                <label class="titulo-dato">Sistema:</label><br>
                <input class="campo-dato" name="Sistema" type="text" required>
                <label class="titulo-dato">Descripcion:</label><br>
                <textarea class="campo-dato texto" name="Descripcion" required></textarea>
                <label class="titulo-dato">Consulta:</label><br>
                <textarea class="campo-dato texto txt-lg" name="Consulta" required></textarea>
                <div class="lc-botones-header">
                    <input type="submit" value="Listo" class="btn agregar">
                </div>
            </form>  
        </div>         
    </div>
</div>


       
@endsection 