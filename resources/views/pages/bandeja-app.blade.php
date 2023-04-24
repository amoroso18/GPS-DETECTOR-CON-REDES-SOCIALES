@extends('layouts.app')

@section('content')
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('icons/icons8-globe-showing-americas-48.png') }}" alt="" width="100">
        <h2>Enlaces creados para aplicativo ANDROID</h2>
    </div>

    <main class="container">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0 text-primary">  Enlaces : {{ count($data ) }}</h6>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Titulo</th>
                      <th scope="col">Creación</th>
                      <th scope="col">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
            @foreach ($data as $item)

         
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>
                          {{$item->titulo}}
                      </td>
                      <td>
                        <span>Usuario: {{$item->getUserCreate->name}}</span><br>
                        <span>Fecha creación: {{$item->created_at}}</span>
                      </td>
                      <td>
                        <a href="{{route('ver_enlaces_app',['token' => Crypt::encryptString($item->id)])}}">Gestionar</a>
                      </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
  </div>



        </div>

       
    </main>
@endsection
