@extends('layouts.app')

@section('content')
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('icons/spy.png') }}" alt="" width="72" height="57">
        <h2>Usuarios del sistema</h2>
    </div>
    <main class="container">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0 text-primary">Usuarios : {{ count($usuarios ) }}</h6>

            @foreach ($usuarios as $item)
                <div class="d-flex text-muted pt-3">
                    <img class="me-3" src="{{ asset('icons/spy_user.png') }}" alt="" width="48"
                    height="38">

                    <p class="pb-3 mb-0 small lh-sm border-bottom">
                        <strong class="d-block"> ID-{{$item->id}}</strong>
                        @if($item->estado == 1)
                            Situación: <span class="text-success">Activo</span><br>
                        @else
                            Situación: <span class="text-danger">Suspendido</span><br>
                        @endif
                        Nombre: {{$item->name}}<br>
                        Usuario: {{$item->email}}
                        @if($item->users_create_id)
                            <br>
                            Creo el usuario: {{$item->getUserCreate->name}} <br>
                            Fecha de creación: {{$item->created_at}} <br>
                            Ultima modificación de usuario: {{$item->updated_at}}
                        @endif
                    </p>
                    @if($item->estado == 1)
                        <a href="{{route('modificar_usuario_save',['token' => Crypt::encryptString($item->id) , 'status' => 3 ])}}">Suspender</a>
                    @else
                        <a href="{{route('modificar_usuario_save',['token' => Crypt::encryptString($item->id) , 'status' => 1 ])}}">Activar</a>
                    @endif
                   
                   
                </div>
            @endforeach
        </div>

       
    </main>
@endsection
