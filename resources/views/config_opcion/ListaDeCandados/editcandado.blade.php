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
        <div class="form-view">
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
            <form class="form-candado" action="{{ route('candado.update', $candadomuestra->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="titulo-dato">Columna:</label><br>
                <input class="campo-dato" required name="Columna" type="number" placeholder="Introduce" value="{{$candadomuestra->Columna}}">
                <label class="titulo-dato">Nombre:</label><br>
                <input class="campo-dato" required name="Nombre" type="text" placeholder="Introduce" value="{{$candadomuestra->Nombre}}" autocomplete="off">
                <label class="titulo-dato">Area:</label><br>
                <input class="campo-dato" required name="Area" type="text" placeholder="Introduce" value="{{$candadomuestra->Area}}" list="formu-areas" autocomplete="off">
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
                <input class="campo-dato" required name="Proceso" type="text" placeholder="Introduce" value="{{$candadomuestra->Proceso}}" list="formu-procesos" autocomplete="off">
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
                <input class="campo-dato" required name="Sistema" type="text" placeholder="Introduce" value="{{$candadomuestra->Sistema}}" autocomplete="off">
                <label class="titulo-dato">Descripcion:</label><br>
                <textarea class="campo-dato texto"  required name="Descripcion">{{$candadomuestra->Descripcion}}</textarea>
                <label class="titulo-dato">Consulta:</label><br>
                <textarea class="campo-dato texto txt-lg" required spellcheck="false" name="Consulta">{{$candadomuestra->Consulta}}</textarea>
                <div class="lc-botones-header">
                    <input type="submit" value="Editar" class="btn editar">
                </div>
            </form>  
        </div>         
    </div>
</div>
@endsection 