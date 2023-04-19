@extends('layouts.app')

@section('content')


<div class="px-4 py-5 my-5 text-center">
  <img class="d-block mx-auto mb-4" src="{{ asset('icons/icons8-globe-showing-americas-48.png') }}" alt="" width="72" height="57">
  <h1 class="display-5 fw-bold">{{ strtoupper($enlace->titulo) }}</h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">{{  strtoupper($enlace->descripcion) }}</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

      <div class="row align-items-md-stretch">
        <div class="col-md-6">
          <div class="h-100 p-5 text-white bg-dark rounded-3">
            <h2>Rastreo Rapido (no levanta sospechas)</h2>
            <code>
              {{ route('vista') }}
            </code>
          </div>
        </div>
        <div class="col-md-6">
          <div class="h-100 p-5 bg-dark border rounded-3">
            <h2>Rastreo GPS (pide activar GPS)</h2>
            <code>
              {{ route('vista') }}
            </code>
          </div>
        </div>
      </div>

      
    </div>
  </div>
</div>



    <main class="container">
       

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0 text-primary">  Enlaces : {{ count($contenido ) }}</h6>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col">IP/Pais</th>
                      <th scope="col">Dispositivo</th>
                      <th scope="col">Rastreo via</th>
                      <th scope="col">Ver Ubicacion IP</th>
                      <th scope="col">Ver Ubicacion GPS</th>  
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>38.43.129.48 United States</td>
                      <td>
                        SO <br>
                        Dispositivo <br>
                        Operador <br>
                        Marca <br>
                        Modelo
                      </td>
                      <td>CON IP sin permiso o Con GPS con permiso   (Fecha hora)</td>
                      <td><a href="">button</a></td>
                      <td><a href="">button</a></td>
                    
                    </tr>

            @foreach ($contenido as $item)

         
                    <tr>
                      <td>38.43.129.48}</td>
                      <td>{{$item->getTipo->red_social}}</td>
                      <td>
                            <span>Titulo: {{$item->titulo}}</span><br>
                            <span>Descripción: {{$item->descripcion}}</span>
                      </td>
                      <td>
                        <span>Usuario: {{$item->getUserCreate->name}}</span><br>
                        <span>Fecha creación: {{$item->created_at}}</span>
                      </td>
                      <td>
                        <a href="{{route('ver_enlaces',['token' => Crypt::encryptString($item->id)])}}">Gestionar</a>
                      </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
  </div>



        </div>

       
    </main>
@endsection
