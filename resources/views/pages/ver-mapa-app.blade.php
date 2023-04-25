@extends('layouts.app')

@push("css_custom")
<link href='{{asset('map/leaflet.css')}}' rel='stylesheet' />
<style>
       #map {
        width: 100%;height: 70vh;
    }
</style>
@endpush

@section('content')
    <div class="my-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('icons/icons8-globe-showing-americas-48.png') }}" alt=""
            width="72" height="57">
        <h1 class="display-5 fw-bold">{{ strtoupper($enlace->titulo) }}</h1>
    </div>
    <main class="container">
        <h6 class="border-bottom pb-2 mb-0"> Se encontró {{ count($contenido) }} coordenadas</h6>
        <div id='map'></div>
    </main>
@endsection

@push("js_custom")
    <script src='{{asset('map/leaflet.js')}}'></script>
   <script>
    var map, newMarker, markerLocation;
    var markers = [];
    var latmap = '-12.053637';
    var lngmap = '-77.037586';
    var cartodbAttribution = '&copy; <a target="_blank" href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';
    map = L.map('map').setView([latmap, lngmap], 11);
    var positron = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: cartodbAttribution,
        maxZoom:18,
        minZoom: 10,     
        noWrap: false, 
        opacity: 1
    }).addTo(map);

    @foreach ($contenido as $item)
        var marker = L.marker([{{ $item->latitud }}, {{ $item->longitud }}]).addTo(map);
        var popup = marker.bindPopup(`<h5>Usuario: {{ $item->users_create_id }}</h5><b>{{ $item->latitud }} {{ $item->longitud }}</b><br/>{{ $item->created_at }}. <a href="https://maps.google.com/?q={{ $item->latitud }},{{ $item->longitud }}"
                                            target="_blank">Ver en google maps</a>`);
    @endforeach
  


   </script>
@endpush