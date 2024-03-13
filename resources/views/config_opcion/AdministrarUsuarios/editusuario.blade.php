@extends('layout.tablero')

@section('content')

<div class="lc-botones-header">
    <a href="{{url('configuracion/usuarios')}}" class="btn regresar">Regresar</a>
</div>

<div class="box type-table crud"> 
    <div class="box-header">
        <p>{{$usuario->name}}</p>
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

            <form class="form-candado" action="{{ route('usuario.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="titulo-dato">Nombre:</label><br>
                <input class="campo-dato" required type="text" value="{{$usuario->name}}" name="name">
                <label class="titulo-dato">Correo:</label><br>
                <input class="campo-dato" required type="text" value="{{$usuario->email}}" name="email">
                <label class="titulo-dato">Contraseña:</label><br>
                <input class="campo-dato" required type="text" placeholder="Introduzca contraseña actual o nueva" name="password">
                <label class="titulo-dato">Puesto:</label><br>
                <input class="campo-dato" required type="text" value="{{$usuario->Puesto}}" name="Puesto">
                <label class="titulo-dato">Rol:</label><br>
                <input class="campo-dato" required type="text" value="{{$usuario->Rol}}" name="Rol" list="formu-rol" autocomplete="off">
                <datalist id="formu-rol">
                    <option value="Usuario">
                    <option value="Responsable de reportes">
                    <option value="Responsalbe de candados">
                    <option value="Administrador">
                </datalist>
                <label class="titulo-dato">Oficina:</label><br>
                <input class="campo-dato" required type="text" value="{{$usuario->Oficina}}" name="Oficina">
                <div class="lc-botones-header">
                    <input type="submit" value="Editar" class="btn editar">
                </div>
            </form>  
        </div>         
    </div>
</div>
@endsection 