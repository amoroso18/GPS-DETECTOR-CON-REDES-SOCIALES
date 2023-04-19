@extends('layouts.app')

@section('content')
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('icons/spy.png') }}" alt="" width="72" height="57">
        <h2>Spy Location Software</h2>
        <p class="lead">GPS URL con PHP 8 & Laravel 8 es un proyecto para navegadores web que facilita la gestión de
            rastreo ip y gps de los dispositivos con el cual van a ingresar. Es un proyecto que demuestra el uso de la
            mezcla de tecnologías actuales de codigo de programación, base de datos y uso de extesión de javascript, al
            igual que recursos libres como google maps.</p>
    </div>
    <div class="container">
        <div class="row g-5">
            <div class="col-12">
                <h4 class="mb-3">Bienvenido</h4>
                <form class="needs-validation" novalidate="">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="firstName" class="form-label">Nombre</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Usuario</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                </form>
            </div>
        </div>
    </div>


    <main class="container">
        <div class="d-flex align-items-center p-3 my-3 text-white bg-primary rounded shadow-sm">
            <img class="me-3" src="{{ asset('icons/clock.png') }}" alt="" width="48"
                height="38">
            <div class="lh-1">
                <h1 class="h6 mb-0 text-white lh-1">Novedades hasta la fecha</h1>
                <small>{{ date('d-m-Y')}}</small>
            </div>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Usuarios que ingresaron al sistema ( mostrando 5 últimos )</h6>

            <div class="d-flex text-muted pt-3">
                <img class="me-3" src="{{ asset('icons/spy_user.png') }}" alt="" width="48"
                height="38">

                <p class="pb-3 mb-0 small lh-sm border-bottom">
                    <strong class="d-block text-gray-dark">@username</strong>
                    Some representative placeholder content, with some information about this user. Imagine this being some
                    sort of status update, perhaps?
                </p>
            </div>
          
            <small class="d-block text-end mt-3">
                <a href="#">Ver todos los usuarios</a>
            </small>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Enlaces localizador ( mostrando 5 últimos )</h6>

            <div class="d-flex text-muted pt-3">
                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%"
                        fill="#007bff" dy=".3em">32x32</text>
                </svg>

                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                    <div class="d-flex justify-content-between">
                        <strong class="text-gray-dark">Full Name</strong>
                        <a href="#">Ver enlace</a>
                    </div>
                    <span class="d-block">@username</span>
                </div>
            </div>
          
            <small class="d-block text-end mt-3">
                <a href="#">Ver todos los enlaces</a>
            </small>
        </div>
    </main>
@endsection
