@extends('layouts.app')

@section('content')
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('icons/spy.png') }}" alt="" width="72" height="57">
        <h2>Enlace de geolocalización para aplicativo ANDROID</h2>
    </div>
    <div class="container text-center">
        <div class="row g-5">
            <div class="col-12">
                <form method="post" action="{{route('guardar_enlaces_app')}}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="firstName" class="form-label">Crear Titulo del enlace</label>
                            <textarea name="titulo" cols="30" rows="5" class="form-control" ></textarea>
                        </div>
                        <div class="col-12">
                           <p>* Instala el APK en tu dispositivo ANDROID y comparte el enlace que se creará al presionar "Crear enlace".</p>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Crear enlace</button>
                </form>
            </div>
        </div>
    </div>

@endsection
