<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ortoprest') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ortoprest.css') }}" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="../resources//assets/images/logogris-01.png" alt="" style="height: 4vh;"/>
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">                               
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login ') }} <img src="../resources//assets/images/boton_home.png" alt="" style="height: 5vh;"/></a>
                            </li>         
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('beneficiary.alert')}}">Alertas<span class="badge">{{$alertEndCount}}</span></a>
                        </li>
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    &nbsp; AREA ADMINISTRADOR<hr>
                                    <a class="dropdown-item" href="{{ route('user.listadoUser')}}">
                                        Listado Usuarios del Sistema
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.newUser')}}">
                                        Nuevo Usuario
                                    </a>
                                    <a class="dropdown-item" href="{{ route('config')}}">
                                        Actualización Perfil Usuario
                                    </a>  
                                    <a class="dropdown-item" href="{{route('registro.create')}}">
                                        Registro Nuevos Productos
                                    </a><hr>
                                    &nbsp; AREA USUARIO<hr>                                                                     
                                    <a class="dropdown-item" href="{{ route('registrobeneficiario.create')}}">
                                        Area de Gestión Beneficiarios-REGISTRO
                                    </a>
                                    <a class="dropdown-item" href="{{route('beneficiary.listadoBeneficiario')}}">
                                        Listado de Beneficiarios Activos
                                    </a>                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>