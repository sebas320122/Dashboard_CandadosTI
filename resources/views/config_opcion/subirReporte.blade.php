@extends('layout.tablero')

@section('content')
    <div class="box type-upload">
        <div class="box-header">
            Subir reporte
        </div>
        <div class="box-content">
            <form method="POST" action="{{route('reporte.upload')}}" enctype="multipart/form-data">
                @csrf    
                <input class="fileInput" type="file" name="reporte">
                <div class="opciones">
                    <a href="{{url('configuracion')}}" class="btn regresar">Regresar</a> 
                    <input class="btn subir" type="submit" value="Subir">
                </div>
            </form> 
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="box type-status success">
            <div class="box-content">
                {{ $message }}
            </div>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="box type-status error">
            <div class="box-content">
                {{ $message }}
            </div>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="box type-status error">
            <div class="box-content">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif   


@endsection