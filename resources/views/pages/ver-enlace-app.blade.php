@extends('layouts.app')

@section('content')
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('icons/icons8-globe-showing-americas-48.png') }}" alt=""
            width="72" height="57">
        <h1 class="display-5 fw-bold">{{ strtoupper($enlace->titulo) }}</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">{{ strtoupper($enlace->descripcion) }}</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

                <div class="row align-items-md-stretch">
                    <div class="col-md-12">
                        <div class="h-100 p-5 bg-dark border rounded-3">
                            <h2>Copia el siguiente enlace en tu aplicativo ANDROID</h2>
                            <div >
                                <strong style="background-color: aliceblue; padding: 5px;">
                                    <code>
                                        {{ route('login_app', ['token' => base64_encode($enlace->id)]) }}
                                    </code>
                                </strong>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <main class="container">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0 text-primary"> Envio de coordenadas : {{ count($contenido) }}</h6>
                <a class="btn btn-primary" onclick="ExportToExcel('xlsx')" >
                    Descargar en formato Excel
                </a>
                <a href="{{route('mapa_app',['token' => $token])}}" class="btn btn-primary" target="_blank" >
                    Ver en mapa
                </a>
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="tbl_exporttable_to_xls">
                    <thead>
                        <tr>
                            <th scope="col">latitud</th>
                            <th scope="col">longitud</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contenido as $item)
                            <tr>
                                <td>{{ $item->latitud }}</td>
                                <td>{{ $item->longitud }}</td>
                                <td>{{ $item->users_create_id }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @if ($item->latitud || $item->longitud)
                                        <a href="https://maps.google.com/?q={{ $item->latitud }},{{ $item->longitud }}"
                                            target="_blank">Ver en google maps</a>
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

@push('js_custom')
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('tbl_exporttable_to_xls');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
        return dl ?
        XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
        XLSX.writeFile(wb, fn || ('{{ strtoupper($enlace->titulo) }}' + (type || 'xlsx')));
    }
</script>
@endpush

