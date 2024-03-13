@extends('layout.tablero')

@section('content')

<div class="lc-botones-header">
    <a href="{{url('configuracion/usuarios')}}" class="btn regresar">Regresar</a>
</div>

<div class="box type-table crud"> 
    <div class="box-header">
        <p>Agregar usuario</p>
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
            <form class="form-candado" action="{{route('usuario.store')}}" method="POST">
                @csrf
                <label class="titulo-dato">Nombre:</label><br>
                <input class="campo-dato" type="text" name="name" required>
                <label class="titulo-dato">Correo:</label><br>
                <input class="campo-dato" type="email" name="email" required autocomplete="off">
                <label class="titulo-dato">Contraseña:</label><br>
                <input class="campo-dato" name="password" type="text" required>
                <label class="titulo-dato">Puesto:</label><br>
                <input class="campo-dato" name="Puesto" type="text" required>
                <label class="titulo-dato">Rol:</label><br>
                <input class="campo-dato" name="Rol" type="text" required>
                <label class="titulo-dato">Oficina:</label><br>
                <input class="campo-dato" name="Oficina" type="text" required>
                <div class="lc-botones-header">
                    <input type="submit" value="Listo" class="btn agregar">
                </div>
            </form>  
        </div>         
    </div>
</div>


       
@endsection 