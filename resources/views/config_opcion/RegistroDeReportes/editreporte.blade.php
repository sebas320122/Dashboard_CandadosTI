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
            <form class="form-candado" action="{{ route('reporte.update', $reporte->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="titulo-dato">Valido:</label><br>
                <select class="campo-dato" name="Valido">
                    <option value="1">1</option>
                    <option value="0">0</option>
                  </select>
                <div class="lc-botones-header">
                    <input type="submit" value="Editar" class="btn editar">
                </div>
            </form>  
        </div>         
    </div>
</div>
@endsection 