@extends('layouts.app')

@section('content')
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('icons/spy.png') }}" alt="" width="72" height="57">
        <h2>Creación de usuario</h2>
    </div>
    <div class="container text-center">
        <div class="row g-5">
            <div class="col-12">
                <form method="post" action="{{route('crear_usuario_save')}}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="firstName" class="form-label">Ingresa nombre</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Ingresa el correo electrónico</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="username" class="form-label">Ingresa la contraseña</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
