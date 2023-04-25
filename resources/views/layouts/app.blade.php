<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('bootstrap.min.css')}}" rel="stylesheet">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href={{asset('icons/spy.png')}}" sizes="180x180">
    <link rel="icon" href="{{asset('icons/spy.png')}}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{asset('icons/spy.png')}}" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="{{asset('icons/spy.png')}}" color="#7952b3">
    <link rel="icon" href="{{asset('icons/spy.png')}}">
    <style>
        html,
        body {
        overflow-x: hidden; /* Prevent scroll on narrow devices */
        }

        body {
        padding-top: 56px;
        }

        @media (max-width: 991.98px) {
        .offcanvas-collapse {
            position: fixed;
            top: 56px; /* Height of navbar */
            bottom: 0;
            left: 100%;
            width: 100%;
            padding-right: 1rem;
            padding-left: 1rem;
            overflow-y: auto;
            visibility: hidden;
            background-color: #343a40;
            transition: transform .3s ease-in-out, visibility .3s ease-in-out;
        }
        .offcanvas-collapse.open {
            visibility: visible;
            transform: translateX(-100%);
        }
        }

        .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
        }

        .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        color: rgba(255, 255, 255, .75);
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
        }

        .nav-underline .nav-link {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: .875rem;
        color: #6c757d;
        }

        .nav-underline .nav-link:hover {
        color: #007bff;
        }

        .nav-underline .active {
        font-weight: 500;
        color: #343a40;
        }

        .text-white-50 { color: rgba(255, 255, 255, .5); }

        .bg-purple { background-color: #6f42c1; }
    </style>
       @stack("css_custom")
</head>
<body class="text-white bg-dark">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">RASTREADOR</a>
          <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link {{ request()->is('home') ? 'active':'' }}" aria-current="page" href="{{route('home')}}">Inicio</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::routeIs('crear_usuario') ? 'active' : '' }}{{ Request::routeIs('bandeja_usuario') ? 'active' : '' }}" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Gestor de usuarios</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                  <li><a class="dropdown-item" href="{{route('crear_usuario')}}">Crear usuario</a></li>
                  <li><a class="dropdown-item" href="{{route('bandeja_usuario')}}">Bandeja de usuario</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle {{ Request::routeIs('crear_enlaces') ? 'active' : '' }}{{ Request::routeIs('bandeja_enlaces') ? 'active' : '' }}" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">GPS localizador</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                  <li><a class="dropdown-item" href="{{route('crear_enlaces')}}">Crear enlaces</a></li>
                  <li><a class="dropdown-item" href="{{route('bandeja_enlaces')}}">Bandeja de enlaces</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle {{ Request::routeIs('crear_enlaces_app') ? 'active' : '' }}{{ Request::routeIs('bandeja_enlaces_app') ? 'active' : '' }}" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Aplicativo Celular</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                  <li><a class="dropdown-item" href="{{route('crear_enlaces_app')}}">Crear enlaces de app</a></li>
                  <li><a class="dropdown-item" href="{{route('bandeja_enlaces_app')}}">Bandeja de enlaces de app</a></li>
                  <li><a class="dropdown-item" href="{{asset('appAndroid/application-5ca98a54-d2e6-4397-b622-faf0e17dd723.apk')}}">Descargar APP ANDROID</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://github.com/amoroso18/GPS-DETECTOR-CON-REDES-SOCIALES">Github</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://wa.me/51966673099?text=Necesito soporte para el Spy Location Software">Contactar con soporte</a>
              </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
              <button class="btn btn-outline-danger" type="submit">Cerrar sesión</button>
            </form>
          </div>
        </div>
      </nav>
      

      @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Error encontrado..!</h4>
          <hr>
          <p class="mb-0">{{ session()->get('error') }}</p>
        </div>
				@endif
				@if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Correcto..!</h4>
            <hr>
            <p class="mb-0">{{ session()->get('success') }}</p>
          </div>
				@endif
				@if(session()->has('warning'))
          <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Problema..!</h4>
            <hr>
            <p class="mb-0">{{ session()->get('warning') }}</p>
          </div>
				@endif
    
       @yield('content')

       <br>
   
      <footer class="text-center " style="position:fixed;
      left:0px;
      bottom:0px;
      height:30px;
      width:100%;">
        <p>  Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) AECC &copy; 2023</p>
      </footer>

   





    <script src="{{asset('bootstrap.bundle.min.js')}}"></script>
    <script>
        (function () {
            'use strict'
            document.querySelector('#navbarSideCollapse').addEventListener('click', function () {
                document.querySelector('.offcanvas-collapse').classList.toggle('open')
            })
        })()
    </script>
      @stack('js_custom')
</body>
</html>


{{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
      >
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div> --}}
