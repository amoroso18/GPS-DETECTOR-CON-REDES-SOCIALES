@extends('layouts.app')

@section('content')
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('icons/spy.png') }}" alt="" width="72" height="57">
        <h2>Creación de url falsa</h2>
    </div>
    <div class="container text-center">
        <div class="row g-5">
            <div class="col-12">
                <form method="post" action="{{route('guardar_enlaces')}}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="firstName" class="form-label">Titulo del enlace</label>
                            <textarea name="titulo" cols="30" rows="5" class="form-control" ></textarea>
                        </div>
                        <div class="col-12">
                            <label for="firstName" class="form-label">Descripción del enlace</label>
                            <textarea name="descripcion" cols="30" rows="5" class="form-control" ></textarea>
                        </div>
                        <div class="col-12">
                            <label for="username" class="form-label">Selecciona un tipo de red social para fondo de pantalla</label>
                            <select name="tipo_fondo_pantallas_id" class="form-control">
                                @foreach ($data as $item)
                                    <option value="{{$item->id}}">{{$item->red_social}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                           <p>* Por defecto se registrará con la configuración previa del tipo de red social.</p>
                           <p>* Recuerda que el titulo y descripcion aparecerá al compartir el enlace.</p>
                           <p>* Para compartir por whatsapp o facebbok, se requiere autenticar con la opción de developers en cada entidad.</p>
                           <p>* Para una mejor geolocalización se recomienda indexarlo el dominio con google analitycs.</p>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Crear enlace</button>
                </form>
            </div>
        </div>
    </div>

@endsection
