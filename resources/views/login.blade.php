<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/login.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/imagen/logo.ico">
</head>

<body>
   
<div class="main-content">
    <div class="box">
        <div class="box-header">
            Iniciar sesión
        </div>
        <div class="box-content">
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
            <form method="POST" action="{{ route('r.login') }}">
                @csrf
                <input class="dato" type="text"  placeholder="Correo" name="email" autocomplete="off">
                <input class="dato segundo" type="password" placeholder="Contraseña" name="password">
                <input class="boton" type="submit" value="Ingresar">
            </form> 
        </div>
    </div>
</div>

</body>

<!--Scripts-->  


</html>         